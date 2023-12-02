<?php

namespace App\Contracts\Admin\Route;

interface RouteContract
{
    public function allRoutes();
    public function storeRoute(array $data);
    public function findRoute($id);
    public function updateRoute(array $data, $id);
    public function destroyRoute($id);
}
