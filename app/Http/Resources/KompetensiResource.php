<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KompetensiResource extends JsonResource
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
            'nama_kompetensi'=>$this->nama_kompetensi,
            'persentase'=>$this->persentase,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            'asesmen'=>$this->asesmen,
        ];
    }
}
