<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\City;
use App\Models\Plan;
use App\Models\Role;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\OtpVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use App\Contracts\Auth\AuthContract;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Auth\OtpResources;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\User\UserResources;
use App\Http\Resources\Api\Auth\LoginApiCollection;

class AuthController extends BaseController
{
    private $AuthContract;
    private $AdminModel;

    public function __construct(AuthContract $AuthContract, User $AdminModel)
    {
        $this->AuthContract = $AuthContract;
        $this->AdminModel = $AdminModel;
    }
    protected $status = false;
    protected $message;

    // use HasApiTokens;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return $this->apiResponseJson(false, 422, $validator->errors()->first(), (object) []);
        }
        DB::beginTransaction();
        try {
            $findEmail = $this->AuthContract->findEmail($request->all());

            if (isset($findEmail) && !empty($findEmail)) {
                $data = $this->AuthContract->otpSend(['user_id' => $findEmail->id]);
                $message = $data ? "Otp send successfully" : "Something went wrong";
            } else {
                $data = $this->AuthContract->registration($request->all());
                $data = $this->AuthContract->otpSend(['user_id' => $data->id]);
                $message = $data ? "User record saved && Otp send successfully" : "Something went wrong";
            }
            if ($data) {
                DB::commit();
                return $this->apiResponseJson(true, 200, $message, $data);
            }
        } catch (\Throwable $e) {
            DB::rollback();
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return $this->apiResponseJson(false, 500, 'Something went wrong', (object) []);
        }
    }


    public function otpVerify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'otp' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->apiResponseJson(false, 422, $validator->errors()->first(), (object) []);
        }
        DB::beginTransaction();
        try {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                $otpVerify = OtpVerify::where([
                    'user_id' => $user->id,
                    'otp' => $request->otp
                ])->first();

                if ($otpVerify) {
                    $otpVerify->forceDelete();
                    return $this->apiResponseJson(true, 200, 'Successfully logged in', new LoginApiCollection($user));
                } else {
                    return $this->apiResponseJson(false, 422, "Otp doesn't match", (object) []);
                }
            } else {
                return $this->apiResponseJson(false, 404, 'User not found', (object) []);
            }
        } catch (\Throwable $e) {
            DB::rollback();
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return $this->apiResponseJson(false, 500, 'Something went wrong', (object) []);
        }
    }

    public function userProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'gender' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->apiResponseJson(false, 422, $validator->errors()->first(), (object) []);
        }
        DB::beginTransaction();
        try {
            $user = User::where('id', $request->user_id)->first();
            if (isset($user) && !empty($user)) {
                $data = User::where('id', $request->user_id)->update([
                    "name" => $request->name,
                    "gender" => $request->gender
                ]);
                $message = $data ? "User Profile Update successfully" : "Something went wrong";
            }
            if (isset($data)) {
                DB::commit();
                return $this->apiResponseJson(true, 200, $message, $data);
            }
        } catch (\Throwable $e) {
            DB::rollback();
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return $this->apiResponseJson(false, 500, 'Something went wrong', (object) []);
        }
    }

    public function logout()
    {
        $token = auth()->user()->token();
        $token->revoke();
        return $this->apiResponseJson(true, 200, 'You have been successfully logged out', (object) []);
    }
}
