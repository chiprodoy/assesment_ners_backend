<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\NilaiSubKompetensiRequest;
use App\Http\Resources\SubKompetensiResource;
use App\Models\Kompetensi;
use App\Models\NilaiSubKompetensi;
use App\Models\SubKompetensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiSubKompetensiController extends MainController
{
    public $model = NilaiSubKompetensi::class;

     /**
     * Sub Kompetensi
     *
     * Get Sub Kompetensi data
     * @authenticated
     */
    public function index($subkompetensi_uuid){
        return response('not implement',500);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NilaiSubKompetensiRequest $request)
    {
        dd($request->user()->id);
            // Retrieve the validated input data...
            $validated = $request->validated();
            $this->saveRecord($validated)
        //
    }

}
