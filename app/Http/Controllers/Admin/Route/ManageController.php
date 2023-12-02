<?php

namespace App\Http\Controllers\Admin\Route;

use App\Contracts\Admin\Route\RouteContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Route;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ManageController extends BaseController
{
    private $RouteContract;
    private $RouteModel;

    protected  $rules = [
        'name' => 'required|string'
    ];

    public function __construct(RouteContract $RouteContract, Route $RouteModel)
    {
        $this->RouteContract = $RouteContract;
        $this->RouteModel = $RouteModel;
    }
    public function index()
    {
        $routes = $this->RouteContract->allRoutes();
        return view('admin.pages.route.list', compact('routes'));
    }

    public function addStoreRoute(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), $this->rules);

            if ($validator->fails()) {
                return $this->responseJson(false, 400, $validator->errors()->first());
            }
            DB::beginTransaction();
            try {
                $insert_arry = request()->except(['_token', '_method', 'id']);
                $addRoute = $this->RouteContract->storeRoute($insert_arry);
                DB::commit();
                return response()->json(
                    [
                        'status'    => true,
                        'message'   => 'Route added Successfully!',
                        'redirect'  => route('admin.route.list')
                    ],
                    200
                );
            } catch (Exception $e) {
                DB::rollback();
                logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
                return response()->json(
                    [
                        'status'    => false,
                        'message'   =>  'Something went wrong!!',
                        'redirect'  => ''
                    ],
                    500
                );
            }
        }
        return view('admin.pages.route.add');
    }

    public function editUpdateRoute(Request $request, $routeId)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), $this->rules);

            if ($validator->fails()) {
                return $this->responseJson(false, 400, $validator->errors()->first());
            }
            DB::beginTransaction();
            try {
                $update_arry = request()->except(['_token', '_method', 'id']);

                $updateRoute = $this->RouteContract->updateRoute($update_arry, $routeId);
                DB::commit();
                return response()->json(
                    [
                        'status'    => true,
                        'message'   => 'Route updated Successfully!',
                        'redirect'  => route('admin.route.list')
                    ],
                    200
                );
            } catch (Exception $e) {
                DB::rollback();
                logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
                return response()->json(
                    [
                        'status'    => false,
                        'message'   =>  'Something went wrong!!',
                        'redirect'  => ''
                    ],
                    500
                );
            }
        }
        $routeId = Crypt::decrypt($request->id);
        $route = $this->RouteContract->findRoute($routeId);
        return view('admin.pages.route.edit', compact('route'));
    }

    public function deleteRoute(Request $request, $id)
    {
        $packageId = Crypt::decrypt($request->id);
        try {
        } catch (\Throwable $th) {
            return ['status' => false, 'message' => 'something went wrong'];
        }
    }
}
