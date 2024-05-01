<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NilaiSubKompetensiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'id'=>$this->id,
            'sub_kompetensi_id' => $this->sub_kompetensi_id,
             'mahasiswa_id' => $this->mahasiswa_id,
             'dosen_id'=>$this->dosen_id,
             'nilai'=>$this->nilai,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
