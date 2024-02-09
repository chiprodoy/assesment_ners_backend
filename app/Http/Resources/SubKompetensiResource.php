<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubKompetensiResource extends JsonResource
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
            'uuid'=>$this->uuid,
            'nama_sub_kompetensi'=>$this->nama_sub_kompetensi,
            'skor_penilaian'=>$this->skor_penilaian,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            'kompetensi'=>$this->kompetensi,
        ];
    }
}
