<?php

namespace App\Http\Controllers;

use App\Http\Resources\AsesmenResource;
use App\Models\Asesmen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class AsesmenController extends MainController
{
    public $model = Asesmen::class;

    /**
     * Asesmen
     *
     * Get Asesmen data
     * @authenticated
     */
    public function index($mata_kuliah_uuid){

        $mataKuliah = MataKuliah::where('uuid',$mata_kuliah_uuid)->first();

        $this->setRecord();
        $this->record->where('mata_kuliah_id',$mataKuliah->id);
        return AsesmenResource::collection($this->record->get());
    }
}
