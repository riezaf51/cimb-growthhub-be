<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'nama_trainer' => $this->nama_trainer,
            'kapasitas' => $this->kapasitas,
            'tipe' => $this->tipe,
            'deskripsi' => $this->deskripsi,
            'tanggal' => $this->tanggal,
            'durasi' => $this->durasi,
            'status' => $this->status,
        ];
    }
}
