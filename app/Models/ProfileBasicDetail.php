<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileBasicDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id' ,
        'height' ,
        'weight',
        'marital_status',
        'mother_tongue' ,
        'physical_status',
        'body_type' ,
        'gender',
        'eating_habits',
        'profile_created_by' ,
        'smoking_habits',
        'drinking_habits'  ,
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
