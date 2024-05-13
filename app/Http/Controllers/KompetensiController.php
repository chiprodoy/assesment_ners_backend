<?php

namespace App\Http\Controllers;

use App\Http\Requests\KompetensiRequest;
use App\Http\Resources\KompetensiResource;
use App\Models\Asesmen;
use App\Models\Kompetensi;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;

class KompetensiController extends MainController
{
    public $model = Kompetensi::class;
    public $matakuliah;
    public $asesmen;
    public $kompetensi;
    public $storeAction=null;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->matakuliah = MataKuliah::all();

        if($request->has('mata_kuliah_id'))
            $this->asesmen = Asesmen::where('mata_kuliah_id',$request->get('mata_kuliah_id'))->get();

        if($request->has('asesmen_id')){
            $this->storeAction=route('kompetensi.store');
            $this->kompetensi = Kompetensi::where('asesmen_id',$request->get('asesmen_id'))->get();
        }

        return view('kompetensi.create',get_object_vars($this));
    }

       /**
     * Show the form for creating a new resource.
     */
    public function store(KompetensiRequest $request)
    {
        $validated = $request->validated();
        $validated['uuid']='-';
        $save=$this->saveRecord($validated);
        if($save){
            return Redirect::route('kompetensi.create');
        }
    }


}
