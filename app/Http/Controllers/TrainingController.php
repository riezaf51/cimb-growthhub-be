<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainingResource;
use App\Models\Pendaftaran;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Helpers\ApiFormatter;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::get();

        if ($trainings->count() > 0) {
            return ApiFormatter::createApi(true, 'Data retrieved successfully', TrainingResource::collection($trainings));
        } else {
            return ApiFormatter::createApi(false, 'No Training Found', null, 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nama_trainer' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'tipe' => 'required|in:private,public',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date_format:Y-m-d H:i:s',
            'durasi' => 'required|integer|min:1',
            'status' => 'required|in:on progress,done'
        ]);

        if ($validator->fails()) {
            return ApiFormatter::createApi(false, $validator->messages(), null, 400);
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

        return ApiFormatter::createApi(true, 'Training created successfully', ['id' => $training->id], 201);
    }

    public function show(Training $training)
    {
        return ApiFormatter::createApi(true, 'Data retrieved successfully', new TrainingResource($training));
    }

    public function update(Request $request, Training $training)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nama_trainer' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'tipe' => 'required|in:private,public',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date_format:Y-m-d H:i:s',
            'durasi' => 'required|integer|min:1',
            'status' => 'required|in:on progress,done'
        ]);

        if ($validator->fails()) {
            return ApiFormatter::createApi(false, $validator->messages(), null, 400);
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

        return ApiFormatter::createApi(true, 'Training updated successfully', ['id' => $training->id], 200);
    }

    public function destroy(Training $training)
    {
        $training->delete();

        return ApiFormatter::createApi(true, 'Training deleted successfully', null);
    }

    public function enroll(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'training_id' => 'required|exists:trainings,id',
        ]);

        if ($validator->fails()) {
            return ApiFormatter::createApi(false, $validator->messages(), null, 400);
        }

        $training = Training::find($request->training_id);

        if ($training->approvedAttendees()->count() >= $training->kapasitas) {
            return ApiFormatter::createApi(false, 'This training is already full.', null, 409);
        }

        $user = auth()->user();

        $existingEnrollment = Pendaftaran::where('user_id', $user->id)
            ->where('training_id', $request->training_id)
            ->first();

        if ($existingEnrollment) {
            return ApiFormatter::createApi(false, 'You have already enrolled in this training.', null, 409);
        }

        $newEnrollment = new Pendaftaran();
        $newEnrollment->user_id = $user->id;
        $newEnrollment->training_id = $request->training_id;
        $newEnrollment->status = 'pending';
        $newEnrollment->tgl_daftar = now();
        $newEnrollment->save();

        return ApiFormatter::createApi(true, 'Enrollment request submitted successfully!', ['enrollment' => $newEnrollment], 201);
    }

    public function cancelEnrollment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'training_id' => 'required|exists:trainings,id',
        ]);

        if ($validator->fails()) {
            return ApiFormatter::createApi(false, $validator->messages(), null, 400);
        }

        $user = auth()->user();

        $existingEnrollment = Pendaftaran::where('user_id', $user->id)
            ->where('training_id', $request->training_id)
            ->first();

        if (!$existingEnrollment) {
            return ApiFormatter::createApi(false, 'You are not enrolled in this training.', null, 404);
        }

        $existingEnrollment->delete();

        return ApiFormatter::createApi(true, 'Enrollment canceled successfully!', null);
    }

    public function enrollmentRequests(string $id)
    {
        $training = Training::with('attendees.user.profile', 'attendees.user.role')->find($id);

        if (!$training) {
            return ApiFormatter::createApi(false, 'Training not found.', null, 404);
        }

        if ($training->attendees->isEmpty()) {
            return ApiFormatter::createApi(false, 'No enrollment requests found.', null, 404);
        }

        return ApiFormatter::createApi(true, 'Data retrieved successfully', $training);
    }

    public function enrollmentRequestDetail(string $trainingId, string $id)
    {
        $training = Training::find($trainingId);

        if (!$training) {
            return ApiFormatter::createApi(false, 'Training not found.', null, 404);
        }

        $enrollment = Pendaftaran::with(['user.profile', 'user.role', 'training'])->find($id);

        if (!$enrollment) {
            return ApiFormatter::createApi(false, 'Enrollment request not found.', null, 404);
        }

        return ApiFormatter::createApi(true, 'Data retrieved successfully', $enrollment);
    }

    public function enrollmentRequestApproval(Request $request, string $trainingId, string $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:approved,rejected,pending',
        ]);

        if ($validator->fails()) {
            return ApiFormatter::createApi(false, $validator->messages(), null, 400);
        }

        $training = Training::find($trainingId);
        if (!$training) {
            return ApiFormatter::createApi(false, 'Training not found.', null, 404);
        }

        $enrollment = Pendaftaran::find($id);
        if (!$enrollment) {
            return ApiFormatter::createApi(false, 'Enrollment request not found.', null, 404);
        }

        $enrollment->status = $request->status;
        $enrollment->save();

        return ApiFormatter::createApi(true, 'Enrollment request status updated successfully!', ['id' => $enrollment->id]);
    }

    public function enrollmentRequestsBulkReject(string $trainingId)
    {
        $training = Training::find($trainingId);

        if (!$training) {
            return ApiFormatter::createApi(false, 'Training not found.', null, 404);
        }

        $pendingEnrollments = Pendaftaran::where('training_id', $trainingId)
            ->where('status', 'pending')
            ->get();

        if ($pendingEnrollments->count() == 0) {
            return ApiFormatter::createApi(false, 'No pending enrollment requests found.', null, 404);
        }

        foreach ($pendingEnrollments as $enrollment) {
            $enrollment->status = 'rejected';
            $enrollment->save();
        }

        return ApiFormatter::createApi(true, 'All pending enrollment requests have been rejected.', null);
    }

    public function enrollmentRequestByUser(Request $request)
    {
        $enrollments = Pendaftaran::where('user_id', $request->user()->id)
            ->whereIn('status', ['pending', 'approved'])
            ->get();

        foreach ($enrollments as $enrollment) {
            $enrollment->training;
        }

        if ($enrollments->count() > 0) {
            return ApiFormatter::createApi(true, 'Data retrieved successfully', $enrollments);
        } else {
            return ApiFormatter::createApi(false, 'No enrollment requests found.', null, 404);
        }
    }
}
