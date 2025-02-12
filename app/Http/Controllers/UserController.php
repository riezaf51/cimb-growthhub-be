<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Role;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->role;
            $user->profile;
        }

        if ($users->isEmpty()) {
            return ApiFormatter::createApi(false, 'No users found', null, 404);
        }

        return ApiFormatter::createApi(true, 'Users found', $users, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required|min:8',
                'nama' => 'required',
                'tgl_lahir' => 'required|date',
                'pekerjaan' => 'required',
                'perusahaan' => 'required',
                'no_telepon' => 'required',
                'email' => 'required|email',
                'role_id' => 'required',
            ]);

            $user = new User();
            $user->id = Str::uuid();

            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user->role_id = $request->input('role_id');

            $username_exists = User::where('username', $user->username)->exists();

            if ($username_exists) {
                return ApiFormatter::createApi(false, 'Username already exists', null, 409);
            }

            $role_exists = Role::where('id', $user->role_id)->exists();

            if (!$role_exists) {
                return ApiFormatter::createApi(false, 'Role not found', null, 404);
            }

            $profile = new Profile();
            $profile->id = Str::uuid();
            $profile->user_id = $user->id;
            $profile->nama = $request->input('nama');
            $profile->tgl_lahir = $request->input('tgl_lahir');
            $profile->pekerjaan = $request->input('pekerjaan');
            $profile->perusahaan = $request->input('perusahaan');
            $profile->no_telepon = $request->input('no_telepon');
            $profile->email = $request->input('email');

            $user->save();
            $profile->save();

            return ApiFormatter::createApi(true, 'User created', ['id' => $user->id], 201);
        } catch (\Throwable $e) {
            return ApiFormatter::createApi(false, 'Failed to create user', null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Str::isUuid($id)) {
            return ApiFormatter::createApi(false, 'Invalid user ID', null, 400);
        }

        $user = User::find($id);

        if (!$user) {
            return ApiFormatter::createApi(false, 'User not found', null, 404);
        }

        $user->role;
        $user->profile;

        return ApiFormatter::createApi(true, 'User found', $user, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            if (!Str::isUuid($id)) {
                return ApiFormatter::createApi(false, 'Invalid user ID', null, 400);
            }

            $request->validate([
                'username' => 'required',
                'password' => 'required|min:8',
                'nama' => 'required',
                'tgl_lahir' => 'required|date',
                'pekerjaan' => 'required',
                'perusahaan' => 'required',
                'no_telepon' => 'required',
                'email' => 'required|email',
                'role_id' => 'required',
            ]);

            $user = User::find($id);

            if (!$user) {
                return ApiFormatter::createApi(false, 'User not found', null, 404);
            }

            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user->role_id = $request->input('role_id');

            $username_exists = User::where('username', $user->username)
                ->where('id', '!=', $id)
                ->exists();

            if ($username_exists) {
                return ApiFormatter::createApi(false, 'Username already exists', null, 409);
            }

            $role_exists = Role::where('id', $user->role_id)->exists();

            if (!$role_exists) {
                return ApiFormatter::createApi(false, 'Role not found', null, 404);
            }

            $profile = Profile::where('user_id', $id)->first();
            if (!$profile) {
                $profile = new Profile();
                $profile->id = Str::uuid();
                $profile->user_id = $user->id;
            }
            $profile->nama = $request->input('nama');
            $profile->tgl_lahir = $request->input('tgl_lahir');
            $profile->pekerjaan = $request->input('pekerjaan');
            $profile->perusahaan = $request->input('perusahaan');
            $profile->no_telepon = $request->input('no_telepon');
            $profile->email = $request->input('email');

            $user->save();
            $profile->save();

            return ApiFormatter::createApi(true, 'User updated', ['id' => $user->id], 200);
        } catch (\Throwable $e) {
            return ApiFormatter::createApi(false, 'Failed to update user', null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            if (!Str::isUuid($id)) {
                return ApiFormatter::createApi(false, 'Invalid user ID', null, 400);
            }

            $user = User::find($id);

            if (!$user) {
                return ApiFormatter::createApi(false, 'User not found', null, 404);
            }

            $user->delete();

            return ApiFormatter::createApi(true, 'User deleted', null, 200);
        } catch (\Throwable $e) {
            return ApiFormatter::createApi(false, 'Failed to delete user', null, 500);
        }
    }
}
