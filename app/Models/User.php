<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Hobbies;
use App\Models\Location;
use App\Models\FamilyDetails;
use App\Models\UserDocuments;
use App\Models\ProfileBasicDetail;
use Laravel\Passport\HasApiTokens;
use App\Traits\HasPermissionsTrait;
use App\Models\ReligiousInformation;
use App\Models\ProfessionalInformation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'gender',
        'img'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function getProfileBasicDetails()
    {
        return $this->hasOne(ProfileBasicDetail::class, 'user_id');
    }

    public function getFamilyDetails()
    {
        return $this->hasOne(FamilyDetails::class, 'user_id');
    }

    public function getReligiousInformation()
    {
        return $this->hasOne(ReligiousInformation::class, 'user_id');
    }

    public function getProfessionalInformation()
    {
        return $this->hasOne(ProfessionalInformation::class, 'user_id');
    }

    public function getLocation()
    {
        return $this->hasOne(Location::class, 'user_id');
    }

    public function getHobbies()
    {
        return $this->hasOne(Hobbies::class, 'user_id');
    }
    public function getDocuments()
    {
        return $this->hasOne(UserDocuments::class, 'user_id');
    }
    public function getUserPreference()
    {
        return $this->hasOne(UserPreference::class, 'user_id');
    }
    public function getUserImage()
    {
        return $this->hasMany(UserImage::class, 'user_id');
    }
    public function getUserFavourite()
    {
        return $this->hasMany(UserFavourite::class, 'user_id');
    }
    public function otpVerify()
    {
        return $this->hasMany(OtpVerify::class, 'user_id');
    }
}
