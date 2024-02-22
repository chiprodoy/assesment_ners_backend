<?php

namespace App\Http\Controllers;

use App\Http\Resources\MahasiswaResource;
use App\Http\Resources\MataKuliahResource;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MahasiswaController extends MainController
{
    public $model = Mahasiswa::class;

    /**
     * Mata Kuliah
     *
     * Get Mata Kuliah data
     * @authenticated
     */
    public function index(){
        $this->setRecord();
        return MahasiswaResource::collection($this->record->get());
    }
}
