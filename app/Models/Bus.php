<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bus extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function getRoute(): BelongsTo
    {
        return $this->belongsTo(Route::class, 'route_id');
    }
}
