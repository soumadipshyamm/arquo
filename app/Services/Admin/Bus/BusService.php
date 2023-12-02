<?php

namespace App\Services\Admin\Bus;

use App\Contracts\Admin\Bus\BusContract;
use App\Models\Bus;
use App\Models\BusStop as SELF_MODEL;
use App\Models\Route;
use Illuminate\Support\Str;

class BusService implements BusContract
{

    public function allBuss()
    {
        return SELF_MODEL::latest()->paginate(10);
    }
    public function availableBus($data)
    {
        $query = Route::with('getBusStop', 'getBus')->where('id', $data['route_id'])->get();
        return $query;
    }
    public function timeWiswavailableBus($data)
    {
        $query = Bus::with('getRoute')->where('from_time', '<=', $data['time'])->get();
        return $query;
    }
    public function availableBusDetails($data)
    {
        $query = Bus::with('getRoute')->where('id', $data['bus_id'])->where('from_time', '<=', $data['time'])->get();
        return $query;
    }

    public function storeBus($data)
    {
        $data['slug'] = Str::slug($data['name']);
        return SELF_MODEL::create($data);
    }

    public function findBus($id)
    {
        return SELF_MODEL::find($id);
    }

    public function updateBus($data, $id)
    {
        $bus = SELF_MODEL::where('id', $id)->first();
        $bus->name = $data['name'];
        $bus->save();
    }

    public function destroyBus($id)
    {
        $clients = SELF_MODEL::find($id);
        $clients->delete();
    }
}
