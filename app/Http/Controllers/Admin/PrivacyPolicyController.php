<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;

class PrivacyPolicyController extends BaseController
{
    public function index()
    {
        $privacypolicies = PrivacyPolicy::get();
        return view('admin.pages.privacy_policy.list' , compact('privacypolicies'));
    }


    public function addPrivacyPolicyFormShow()
    {
        return view('admin.pages.privacy_policy.add_privacy_policy');
    }
    public function storePrivacyPolicy(Request $request)
    {
        if ($request->isMethod('post')) {
            $index = $request->all();
            $validator = Validator::make($index, [
                'title' => 'required',
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                return ['status' => false, 'message' => 'field missing'];
            }

            try {
                $privacypolicy = [
                    'title' => $request->title,
                    'description' => $request->description,
                ];
                $privacypolicies = PrivacyPolicy::create($privacypolicy);
                if ($privacypolicies->id > 0) {

                    return $this->responseJson(true, 200, 'Privacy Policy Added Successfully' , '', route('admin.user.privacy.policy'));
                } else {
                    return $this->responseJson(false, 200, 'Unable to save record', '', '');
                }
            } catch (\Throwable $th) {
                return ['status' => false, 'message' => $th->getMessage()];
            }
        } else {
            return ['status' => false, 'message' => 'No record found'];
        }
    }

    public function editPrivacyPolicy(Request $request , $id)
    {
        $editprivacyPolicies = PrivacyPolicy::find($id);
        return view('admin.pages.privacy_policy.edit_privacy_policy' , compact('editprivacyPolicies'));
    }

    public function updatePrivacyPolicy(Request $request)
    {
        if ($request->isMethod('post')) {
            $index = $request->all();
            $validator = Validator::make($index, [
                'title' => 'required',
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                return ['status' => false, 'message' => 'field missing'];
            }

            try {
                $updatePrivacyPolicy = [
                    'title' => $request->title,
                    'description' => $request->description,
                ];
                $updatePrivacyPolicies = PrivacyPolicy::where('id', $request->privacy_policy__id)->update($updatePrivacyPolicy);

                if ($updatePrivacyPolicies) {
                    return $this->responseJson(true, 200, 'Privacy and Policy updated successfully', '', route('admin.user.privacy.policy'));
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

    public function destroy($id)
    {
        $deleteprivacyPolicy = PrivacyPolicy::find($id);
        if (empty($deleteprivacyPolicy)) {
            return redirect()->back()->with([
                'error' => 'No record found',
            ]);
        }
        $deleteprivacyPolicy->delete();
        return $this->responseJson(true, 200, 'Privacy Policy deleted successfully', '', route('admin.user.privacy.policy'));
    }
}
