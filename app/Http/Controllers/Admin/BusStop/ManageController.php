<?php

namespace App\Http\Controllers\Admin\BusStop;

use App\Contracts\Admin\BusStop\BusStopContract;
use App\Http\Controllers\BaseController;
use App\Models\BusStop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ManageController extends BaseController
{
    private $BusStopContract;
    private $BusStopModel;

    protected  $rules = [
        'name' => 'required|string',
        'route_id' => 'required|numeric',
        'longitude' => 'required|numeric',
        'latitude' => 'required|numeric',
    ];

    public function __construct(BusStopContract $BusStopContract, BusStop $BusStopModel)
    {
        $this->BusStopContract = $BusStopContract;
        $this->BusStopModel = $BusStopModel;
    }
    public function index()
    {
        $busStops = $this->BusStopContract->allBusStops();
        return view('admin.pages.busStop.list', compact('busStops'));
    }

    public function addStoreBusStop(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), $this->rules);

            if ($validator->fails()) {
                return $this->responseJson(false, 400, $validator->errors()->first());
            }
            DB::beginTransaction();
            try {
                $insert_arry = $request->except(['_token', '_method', 'id']);
                $addRoute = $this->BusStopContract->storeBusStop($insert_arry);
                DB::commit();
                return response()->json(
                    [
                        'status'    => true,
                        'message'   => 'Bus Stop added Successfully!',
                        'redirect'  => route('admin.bus.stop.list')
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
                    200
                );
            }
        }
        return view('admin.pages.busStop.add');
    }

    public function editUpdateBusStop(Request $request, $routeId)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), $this->rules);

            if ($validator->fails()) {
                return $this->responseJson(false, 400, $validator->errors()->first());
            }
            DB::beginTransaction();
            try {
                $update_arry = request()->except(['_token', '_method', 'id']);

                $updateRoute = $this->BusStopContract->updateBusStop($update_arry, $routeId);
                DB::commit();
                return response()->json(
                    [
                        'status'    => true,
                        'message'   => 'Bus Stop updated Successfully!',
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
        $route = $this->BusStopContract->findBusStop($routeId);
        return view('admin.pages.busStop.edit', compact('route'));
    }

    public function deleteBusStop(Request $request, $id)
    {
        $packageId = Crypt::decrypt($request->id);
        try {
        } catch (\Throwable $th) {
            return ['status' => false, 'message' => 'something went wrong'];
        }
    }
}
