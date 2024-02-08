<?php

namespace App\Http\Controllers;

use App\Http\Resources\KompetensiResource;
use App\Models\Asesmen;
use App\Models\Kompetensi;
use Illuminate\Http\Request;

class KompetensiController extends MainController
{
    public $model = Kompetensi::class;

     /**
     * Kompetensi
     *
     * Get Kompetensi data
     * @authenticated
     */
    public function index($asesmen_uuid){

        $asesmen = Asesmen::where('uuid',$asesmen_uuid)->first();

        $this->setRecord();
        $this->record->where('asesmen_id',$asesmen->id);
        return KompetensiResource::collection($this->record->get());
    }
}
