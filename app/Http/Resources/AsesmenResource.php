<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AsesmenResource extends JsonResource
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
            'nama_asesmen'=>$this->nama_asesmen,
            'sumber_nilai1'=>$this->sumber_nilai1,
            'sumber_nilai2'=>$this->sumber_nilai2,
            'mata_kuliah'=>$this->mata_kuliah,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
