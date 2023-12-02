<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Admin\Bus\BusContract;
use App\Contracts\Admin\BusStop\BusStopContract;
use App\Contracts\Admin\Route\RouteContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RouteController extends BaseController
{
    private $RouteContract;
    private $BusContract;
    private $BusStopContract;

    public function __construct(RouteContract $RouteContract, BusContract $BusContract, BusStopContract $BusStopContract)
    {
        $this->RouteContract = $RouteContract;
        $this->BusContract = $BusContract;
        $this->BusStopContract = $BusStopContract;
    }
    protected $status = false;
    protected $message;

    public function routeList(Request $request)
    {
        $data['routes'] = $this->RouteContract->allRoutes();
        $data['bus'] = $this->BusContract->allBuss();
        $data['busStop'] = $this->BusStopContract->allBusStops();
        $message = $data ? "Route Fetch successfully" : "Something went wrong";
        if ($data) {
            return $this->apiResponseJson(true, 200, $message, $data);
        }
    }

    public function availableBus(Request $request)
    {
        $data = $this->BusContract->availableBus($request->all());
        $message = $data ? "Bus  Fetch successfully" : "Something went wrong";
        if ($data) {
            return $this->apiResponseJson(true, 200, $message, $data);
        }
    }
    public function timeWiseAvailableBus(Request $request)
    {
        $data = $this->BusContract->timeWiswavailableBus($request->all());
        $message = $data ? "Time Wise Bus Fetch successfully" : "Something went wrong";
        if ($data) {
            return $this->apiResponseJson(true, 200, $message, $data);
        }
    }
    public function BusDetails(Request $request)
    {
        $data = $this->BusContract->availableBusDetails($request->all());
        $message = $data ? "Bus Details Fetch successfully" : "Something went wrong";
        if ($data) {
            return $this->apiResponseJson(true, 200, $message, $data);
        }
    }
}
