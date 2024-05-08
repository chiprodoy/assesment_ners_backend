<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubKompetensiResource;
use App\Models\Asesmen;
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
    // public function index($kompetensi_uuid){

    //     $kompetensi = Kompetensi::where('uuid',$kompetensi_uuid)->first();

    //     $this->setRecord();
    //     $this->record->where('kompetensi_id',$kompetensi->id);
    //     return SubKompetensiResource::collection($this->record->get());
    // }
    /**
     * Sub Kompetensi
     *
     * Get Sub Kompetensi data
     * @authenticated
     */
    public function index($asesmen_uuid){

        $asesmen = Asesmen::where('uuid',$asesmen_uuid)->first();

        $kompetensi = Kompetensi::where('asesmen_id',$asesmen->id)->get();

        $this->setRecord();
        $this->record->orderBy('kompetensi_id')->whereBelongsTo($kompetensi);
        return SubKompetensiResource::collection($this->record->get());
    }

}
