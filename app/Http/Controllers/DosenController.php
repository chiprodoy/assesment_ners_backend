<?php

namespace App\Http\Controllers;

use App\Http\Resources\DosenResource;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends MainController
{
    public $model = Dosen::class;

    /**
     * Asesmen
     *
     * Get Asesmen data
     * @authenticated
     */
    public function index(){
        $this->setRecord();
        return DosenResource::collection($this->record->get());
    }
}
