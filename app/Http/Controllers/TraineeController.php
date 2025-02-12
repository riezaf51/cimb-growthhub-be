<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

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

        return response()->json([
            'message' => 'Register Success',
            'data' => $trainee
        ]);

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
            ],);
        }

        return response()->json([
            'message' => 'Login Success',
            'data' =>  $user
        ]);
    }




}
