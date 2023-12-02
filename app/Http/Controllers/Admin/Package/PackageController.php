<?php

namespace App\Http\Controllers\Admin\Package;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Admin\Package\PackageContract;

class PackageController extends BaseController
{
    private $PackageContract;
    private $PlanModel;

    public function __construct(PackageContract $PackageContract, Plan $PlanModel)
    {
        $this->PackageContract = $PackageContract;
        $this->PlanModel = $PlanModel;
    }
    public function index()
    {
        $plans = Plan::get();
        return view('admin.pages.package.list' , compact('plans'));
    }
    public function addPlanFormView()
    {
        return view('admin.pages.package.add');
    }
    public function addPlan(Request $request)
    {
        // $request->validate([
        //     'block_title' => 'required'
        // ]);
        DB::beginTransaction();
        // try {
            $isAddPlan = Plan::create([
                'title' => $request->title,
                'description' => $request->description,
                'payment_mode' => $request->payment_mode,
                // 'duration' => $request->duration,
                'price' =>$request->price,
                'discount_price' => $request->discount_price,
            ]);
            if ($isAddPlan) {
                DB::commit();
                return $this->responseJson(true, 200, 'Plan Added Successfully' , '', url('admin/package/package-list'));
            }
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
        //     return $this->responseJson(false, 500, "Something Went Wrong");
        // }
    }

    public function editPlanFormView(Request $request , $id){
    $packageId = Crypt::decrypt($request->id);
    // return $packageId;
    $plans = Plan::find($packageId);
    // dd($plans);
    return view('admin.pages.package.edit' , compact('packageId','plans'));
    }

    public function updatePlan(Request $request)
    {
        if ($request->isMethod('post')) {
            $index = $request->all();
            $validator = Validator::make($index, [
                'title' => 'required',
                'description' => 'required',
                'payment_mode' => 'required',
                // 'duration' => 'required',
                'price' => 'required',
                'discount_price' => 'required',
            ]);
            if ($validator->fails()) {
                return ['status' => false, 'message' => 'field missing'];
            }

            try {
                $updatePlan = [
                'title' => $request->title,
                'description' => $request->description,
                'payment_mode' => $request->payment_mode,
                // 'duration' => $request->duration,
                'price' =>$request->price,
                'discount_price' => $request->discount_price,
                ];
                $updatePlans = Plan::where('id', $request->plan_id)->update($updatePlan);

                if ($updatePlans) {
                    return $this->responseJson(true, 200, 'Record updated', '', route('admin.package.package-list'));
                    // return ['status' => true, 'message' => 'Record updated', 'data' =>  url('admin/package/package-list')];
                } else {
                    // return ['status' => false, 'message' => 'Unable to update record'];
                    return $this->responseJson(false, 200, 'Unable to update record', '', '');
                }
            } catch (\Throwable $th) {

                return ['status' => false, 'message' => $th->getMessage()];
            }
        } else {
            return ['status' => false, 'message' => 'No data post'];
        }
    }

    public function destroy(Request $request , $id)
    {
        $packageId = Crypt::decrypt($request->id);
        try {
            $isAssigned = Plan::find($packageId);
            if (empty($isAssigned)) {
                return $this->responseJson(false, 200, 'Unable to delete record', '', '');
            } else {
                Plan::where('id', $packageId )->delete();
                return $this->responseJson(true, 200, 'Record deleted', '', route('admin.package.package-list'));
            }
        } catch (\Throwable $th) {
            return ['status' => false, 'message' => 'something went wrong'];
        }
    }
}
