<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainingResource;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::get();

        if($trainings->count() > 0) {
            return TrainingResource::collection($trainings);
        }else {
            return response()->json(['message' => 'No training found'], 200);
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

        $product = Training::create([

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
            'message' => 'Product created successfully',
            'data' => new TrainingResource($product)
        ], 200);
    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
