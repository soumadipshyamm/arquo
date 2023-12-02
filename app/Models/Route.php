<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function getBus()
    {
        return $this->hasMany(Bus::class, 'route_id');
    }
    public function getBusStop()
    {
        return $this->hasMany(BusStop::class, 'route_id');
    }
}
