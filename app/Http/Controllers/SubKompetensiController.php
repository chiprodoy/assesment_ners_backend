<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubKompetensiResource;
use App\Models\Kompetensi;
use App\Models\SubKompetensi;
use Illuminate\Http\Request;

class SubKompetensiController extends MainController
{
    public $model = SubKompetensi::class;

     /**
     * Sub Kompetensi
     *
     * Get Sub Kompetensi data
     * @authenticated
     */
    public function index($kompetensi_uuid){

        $kompetensi = Kompetensi::where('uuid',$kompetensi_uuid)->first();

        $this->setRecord();
        $this->record->where('kompetensi_id',$kompetensi->id);
        return SubKompetensiResource::collection($this->record->get());
    }
}
