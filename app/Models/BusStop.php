<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusStop extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function route()
    {
        return $this->hasOne(Route::class, 'id', 'route_id');
    }
}
