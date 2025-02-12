<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use stdClass;

class TraineeController extends Controller
{
    public function register(Request $request)
    {
       $validator = FacadesValidator::make($request->all(), [
            'password' => 'required',
            'roleId' => 'required',
            'username' => 'required',
            'nama' =>'required',
            'tgl_lahir`' => 'required',
            'pekerjaan' => 'required',
            'perusahaan' => 'required',
            'no_telepon' => 'required',
            'email' => 'required'
       ]);

       $getRoleTrainee = Role::whereLike('name', 'Trainee')->first();


       $user = User::create([
            'username' => $request->username,
            'roleId' => $getRoleTrainee->id,
            'password' => bcrypt($request->password),
       ]);

        $trainee = Profile::create([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'pekerjaan' => $request->pekerjaan,
            'perusahaan' => $request->perusahaan,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'userId' => $user->id
        ]);

        return ApiFormatter::createApi(true, 'Register Success', $trainee, 200);

    }

    public function login(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ],404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Password not match'
            ],500);
        }

        $getRoleTrainee = Role::where('id', $user->roleId)->first();

        $dataUser = new stdClass;
        $dataUser->id = $user->id;
        $dataUser->username = $user->username;
        $dataUser->role = $getRoleTrainee->name;

        return ApiFormatter::createApi(true,'Login Succes', $dataUser, 200);
    }




}
