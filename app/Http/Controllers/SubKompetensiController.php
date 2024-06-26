<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubKompetensiResource;
use App\Models\Asesmen;
use App\Models\Kompetensi;
use App\Models\MataKuliah;
use App\Models\SubKompetensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SubKompetensiController extends MainController
{
    public $model = SubKompetensi::class;

    public $matakuliah;

    public $asesmen;

    public $kompetensi;

    public $subKompetensi;

    public $dataToEdit;

    public $btnText;

    public $frmAction;

    public $frmMethod;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //

        $this->matakuliah = MataKuliah::all();

        if($request->has('mata_kuliah'))
            $this->asesmen = Asesmen::where('mata_kuliah_id',$request->get('mata_kuliah'))->get();

        if($request->has('asesmen'))
            $this->kompetensi = Kompetensi::where('asesmen_id',$request->get('asesmen'))->get();

        return view('subkompetensi.create',get_object_vars($this));
    }

    public function edit(Request $request,$id=''){
        $this->matakuliah = MataKuliah::all();

        if($request->has('mata_kuliah'))
            $this->asesmen = Asesmen::where('mata_kuliah_id',$request->get('mata_kuliah'))->get();

        if($request->has('asesmen'))
            $this->kompetensi = Kompetensi::where('asesmen_id',$request->get('asesmen'))->get();

        if($request->has('kompetensi_id'))
            $this->subKompetensi = SubKompetensi::where('kompetensi_id',$request->get('kompetensi_id'))->get();

        $this->dataToEdit = SubKompetensi::where('uuid',$id)->first();

        if(empty($this->dataToEdit)) {
            $this->btnText = 'Kirim';
            $this->frmMethod='GET';
            $this->frmAction = '';
        }else{
            $this->btnText='Simpan';
            $this->frmMethod='POST';
            $this->frmAction = route('subkompetensi.update',$this->dataToEdit->uuid);
        }

        return view('subkompetensi.edit',get_object_vars($this));
    }

    public function update(Request $request,$uuid){
        $rec = $this->model::where('uuid',$uuid)->first();
        $data = $request->only('kompetensi_id','nama_sub_kompetensi');
        $updated = $rec->update($data);

        if($updated){
            return redirect()->to('/subkompetensi/edit/'.$rec->uuid.'?mata_kuliah='.$request->get('mata_kuliah').'&asesmen='.$request->get('asesmen').'&kompetensi_id='.$request->get('kompetensi_id'))->with('message', 'Data berhasil diedit');
        }

        return redirect()->to('/subkompetensi/edit/'.$rec->uuid.'?mata_kuliah='.$request->get('mata_kuliah').'&asesmen='.$request->get('asesmen').'&kompetensi_id='.$request->get('kompetensi_id'))->with('message', 'Data gagal diedit');
    }

    public function seed(){
        Artisan::call('seed:subkompetensi');
    }
}
