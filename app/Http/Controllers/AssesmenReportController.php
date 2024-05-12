<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\NilaiSubKompetensi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AssesmenReportController extends MainController
{
    public $mahasiswa;
    public $nilaiSubKompetensi;
    //
    public function show($mahasiswaUUID,$mode='pdf'){

       // $this->mahasiswa = Mahasiswa::where('uuid',$mahasiswaUUID)->first();
       $this->mahasiswa = Mahasiswa::find($mahasiswaUUID);

       $this->nilaiSubKompetensi = NilaiSubKompetensi::join('sub_kompetensis','nilai_sub_kompetensis.sub_kompetensi_id','=','sub_kompetensis.id')->orderBy('sub_kompetensis.kompetensi_id')->where('mahasiswa_id',$this->mahasiswa->id)->get();

        if(!$this->mahasiswa)
               return $this->errorResponse(422,'mahasiswa tidak ditemukan');

        if($mode=='pdf'){
            $pdf = Pdf::loadView('pdf.personal_report',get_object_vars($this));
            // return $pdf->download('personal_report.pdf');
            return $pdf->stream();
        }else{
            return view('pdf.personal_report',get_object_vars($this));
        }
      //  $pdf = Pdf::loadView('pdf.personal_report',get_object_vars($this));
       // return $pdf->download('personal_report.pdf');
      // return $pdf->stream();
    }
}
