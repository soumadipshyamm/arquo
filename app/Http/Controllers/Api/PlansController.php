<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Admin\Bus\BusContract;
use App\Contracts\Admin\BusStop\BusStopContract;
use App\Contracts\Admin\Package\PackageContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlansController extends BaseController
{
    private $BusContract;
    private $BusStopContract;
    private $PackageContract;

    public function __construct(PackageContract $PackageContract, BusContract $BusContract, BusStopContract $BusStopContract)
    {
        $this->BusContract = $BusContract;
        $this->PackageContract = $PackageContract;
        $this->BusStopContract = $BusStopContract;
    }
    protected $status = false;
    protected $message;

    public function plansList(Request $request)
    {
        $data = $this->PackageContract->getList();
        $message = $data ? "Plans Fetch successfully" : "Something went wrong";
        if ($data) {
            return $this->apiResponseJson(true, 200, $message, $data);
        }
    }
    public function plansDetails(Request $request)
    {
        $data = $this->PackageContract->getDetails($request->all());
        $message = $data ? "Plans Details Fetch successfully" : "Something went wrong";
        if ($data) {
            return $this->apiResponseJson(true, 200, $message, $data);
        }
    }
}
