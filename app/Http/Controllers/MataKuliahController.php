<?php

namespace App\Http\Controllers;

use App\Http\Resources\MataKuliahResource;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MataKuliahController extends MainController
{
    public $model = MataKuliah::class;

    public function index(){
        return MataKuliahResource::collection($this->getRecord()->get());
    }
}
