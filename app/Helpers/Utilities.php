<?php

use App\Models\Plan;
use App\Models\Route;
use App\Models\User;

if (!function_exists('getUserList')) {
    function getUserList()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        return $users;
    }
}

if (!function_exists('getPackageList')) {
    function getPackageList()
    {
        $plans = Plan::limit(3)->get();

        return $plans;
    }
}

if (!function_exists('getRoute')) {
    function getRoute($type)
    {
        $data = Route::get();

        echo "<option value='' selected> Select Route</option>";

        foreach ($data as $key => $value) {
            if ($type == $value->id) {

                echo "<option value='" . $value->id . "' selected>" . $value->name . "</option>";
            } else {
                echo "<option value='" . $value->id . "'>" . $value->name . "</option>";
            }
        }
    }
}
