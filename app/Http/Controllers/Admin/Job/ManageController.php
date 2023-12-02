<?php

namespace App\Http\Controllers\Admin\Job;

use App\Contracts\Admin\Bus\BusContract;
use App\Http\Controllers\Controller;
use App\Models\Bus;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    private $BusContract;
    private $BusModel;

    protected  $rules = [
        'route_id' => 'required|numeric',
        'name' => 'required|string',
        'longitude' => 'required|numeric',
        'latitude' => 'required|numeric',
    ];

    public function __construct(BusContract $BusContract, Bus $BusModel)
    {
        $this->BusContract = $BusContract;
        $this->BusModel = $BusModel;
    }
    public function index()
    {
        $routes = $this->BusContract->allBuss();
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
                $addRoute = $this->BusContract->storeBus($insert_arry);
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

                $updateRoute = $this->BusContract->updateBus($update_arry, $routeId);
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
        $route = $this->BusContract->findBus($routeId);
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
