<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Models\Hobbies;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\FamilyDetails;
use App\Models\ProfileBasicDetail;
use App\Models\ReligiousInformation;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfessionalInformation;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Auth\AuthContract;

class UserController extends BaseController
{
    public function index()
    {
        $data = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();
        return view('admin.pages.user.list', compact("data"));
    }

    public function userDetails(Request $request,$id)
    {
        $users_details = User::where('id' , $request->id)->first();
        // dd($users_details->first_name);
        $profile_basic_details = ProfileBasicDetail::where('user_id', $request->id)->first();
        $religious_informations = ReligiousInformation::where('user_id', $request->id)->first();
        $locations = Location::where('user_id', $request->id)->first();
        $professional_informations = ProfessionalInformation::where('user_id', $request->id)->first();
        $family_details = FamilyDetails::where('user_id', $request->id)->first();
        $hobbies = Hobbies::where('user_id', $request->id)->first();
        // $data = User::findOrFail($id);
        // dd($data);
        return view('admin.pages.user.user-details' , compact('users_details','profile_basic_details','religious_informations','locations','professional_informations','family_details','hobbies'));
    }
}
