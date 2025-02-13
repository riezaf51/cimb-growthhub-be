<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class TraineeController extends Controller
{
    public function register(Request $request)
    {

        try {
            Validator::make($request->all(), [
                'password' => 'required|min:8',
                'username' => 'required',
                'nama' => 'required',
                'tgl_lahir' => 'required|date',
                'pekerjaan' => 'required',
                'perusahaan' => 'required',
                'no_telepon' => 'required',
                'email' => 'required'
            ])->validate();
        } catch (ValidationException $e) {
            return ApiFormatter::createApi(false, $e->errors(), null, 400);
        }

        $username_exists = User::where('username', $request->username)->exists();

        if ($username_exists) {
            return ApiFormatter::createApi(false, 'Username already exists', null, 409);
        }

        $getRoleTrainee = Role::whereLike('name', 'trainee', false)->first();

        $user = User::create([
            'id' => Str::uuid(),
            'username' => $request->username,
            'role_id' => $getRoleTrainee->id,
            'password' => bcrypt($request->password),
        ]);

        Profile::create([
            'id' => Str::uuid(),
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'pekerjaan' => $request->pekerjaan,
            'perusahaan' => $request->perusahaan,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'user_id' => $user->id
        ]);

        return ApiFormatter::createApi(true, 'Register Success', ['id' => $user->id], 201);
    }
}
