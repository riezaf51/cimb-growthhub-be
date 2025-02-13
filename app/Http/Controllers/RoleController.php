<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        try {
            $getRoles = Role::get();
            return ApiFormatter::createApi(true, 'berhasil mendapat role', $getRoles, 200);

        } catch (\Throwable $th) {
            return ApiFormatter::createApi(false, 'gagal mendapat role', null, 404);
        }

    }
}
