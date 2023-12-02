<?php

namespace App\Services\Admin\BusStop;

use App\Contracts\Admin\BusStop\BusStopContract;
use App\Models\BusStop as SELF_MODEL;
use Illuminate\Support\Str;

class BusStopService implements BusStopContract
{

    public function allBusStops()
    {
        return SELF_MODEL::with('route')->latest()->paginate(10);
    }

    public function storeBusStop($data)
    {
        $data['slug'] = Str::slug($data['name']);
        return SELF_MODEL::create($data);
    }

    public function findBusStop($id)
    {
        return SELF_MODEL::find($id);
    }

    public function updateBusStop($data, $id)
    {
        $busStops = SELF_MODEL::where('id', $id)->first();
        $busStops->name = $data['name'];
        $busStops->save();
    }

    public function destroyBusStop($id)
    {
        $clients = SELF_MODEL::find($id);
        $clients->delete();
    }
}
