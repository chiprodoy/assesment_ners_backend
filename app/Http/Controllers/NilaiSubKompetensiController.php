<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\NilaiSubKompetensiRequest;
use App\Http\Resources\NilaiSubKompetensiResource;
use App\Http\Resources\SubKompetensiResource;
use App\Models\Dosen;
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

    public function saveRecord($data)
    {
        $rec = $this->model::updateOrInsert(
            ['sub_kompetensi_id' => $data['sub_kompetensi_id'], 'mahasiswa_id' => $data['mahasiswa_id'],'dosen_id'=>$data['dosen_id']],
            ['nilai' => $data['nilai']]
        );

        return $rec;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store($sub_kompetensi_uuid,NilaiSubKompetensiRequest $request)
    {

            $subKompetensi = SubKompetensi::where('uuid',$sub_kompetensi_uuid)->first();
            $dosen = Dosen::where('user_id',Auth::user()->id)->first();

            if(!$dosen){
               return $this->errorResponse(422,'akun dosen tidak ditemukan');
            }

            // Retrieve the validated input data...
            $validated = $request->validated();
            $validated['sub_kompetensi_id']=$subKompetensi->id;
            $validated['dosen_id']=$dosen->id;

            $dataSave=$this->saveRecord($validated);
            if($dataSave){
                $nilaiSubKompetensi = NilaiSubKompetensi::where('sub_kompetensi_id',$validated['sub_kompetensi_id'])
                ->where('mahasiswa_id',$validated['mahasiswa_id'])
                ->where('dosen_id',$validated['dosen_id'])
                ->get();

                return NilaiSubKompetensiResource::collection($nilaiSubKompetensi);
            }

        //
    }

}
