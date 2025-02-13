<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainingResource;
use App\Models\Pendaftaran;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::get();

        if($trainings->count() > 0) {
            return TrainingResource::collection($trainings);
        }else {
            return response()->json(['message' => 'No Training Found'], 200);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nama_trainer' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'tipe' => 'required|in:private,public',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date_format:Y-m-d H:i:s',
            'durasi' => 'required|integer',
            'status' => 'required|in:on progress,done'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'message' => 'All fields are required',
                'errors' => $validator->messages(),
            ], 422);
        }

        $training = Training::create([
            'id' => Str::uuid(),
            'nama' => $request->nama,
            'nama_trainer' => $request->nama_trainer,
            'kapasitas' => $request->kapasitas,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'durasi' => $request->durasi,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Training created successfully',
            'data' => new TrainingResource($training)
        ], 200);
    }

    public function show(Training $training)
    {
        return new TrainingResource($training);
    }

    public function update(Request $request, Training $training)
    {
         $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nama_trainer' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'tipe' => 'required|in:private,public',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date_format:Y-m-d H:i:s',
            'durasi' => 'required|integer',
            'status' => 'required|in:on progress,done'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'message' => 'All fields are required',
                'errors' => $validator->messages(),
            ], 422);
        }

        $training->update([
            'nama' => $request->nama,
            'nama_trainer' => $request->nama_trainer,
            'kapasitas' => $request->kapasitas,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'durasi' => $request->durasi,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Training Updated successfully',
            'data' => new TrainingResource($training)
        ], 200);
    }

    public function destroy(Training $training)
    {
        $training->delete([
            'message' => 'Training Deleted Successfully',
        ], 200);
    }

    public function enroll(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'training_id' => 'required|exists:trainings,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid data provided',
                'errors' => $validator->messages(),
            ], 422);
        }

        $user = auth()->user();

        $existingEnrollment = Pendaftaran::where('user_id', $user->id)
            ->where('training_id', $request->training_id)
            ->first();

        if ($existingEnrollment) {
            return response()->json([
                'message' => 'You have already enrolled in this training.',
            ], 409);
        }

        $newEnrollment = new Pendaftaran();
        $newEnrollment->user_id = $user->id;
        $newEnrollment->training_id = $request->training_id;
        $newEnrollment->status = 'pending';
        $newEnrollment->tgl_daftar = now();
        $newEnrollment->save();

        return response()->json([
            'message' => 'Enrollment request submitted successfully!',
            'enrollment' => $newEnrollment,
        ], 201);
    }

    public function cancelEnrollment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'training_id' => 'required|exists:trainings,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid data provided',
                'errors' => $validator->messages(),
            ], 422);
        }

        $user = auth()->user();

        $existingEnrollment = Pendaftaran::where('user_id', $user->id)
            ->where('training_id', $request->training_id)
            ->first();

        if (!$existingEnrollment) {
            return response()->json([
                'message' => 'You are not enrolled in this training.',
            ], 404); 
        }

        $existingEnrollment->delete();

        return response()->json([
            'message' => 'Enrollment canceled successfully!',
        ], 200);
    }
}
