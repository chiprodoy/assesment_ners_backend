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
    public function show($mahasiswaUUID){

        $this->mahasiswa = Mahasiswa::where('uuid',$mahasiswaUUID)->first();
        $this->nilaiSubKompetensi = NilaiSubKompetensi::where('mahasiswa_id',$this->mahasiswa->id)->get();

        if(!$this->mahasiswa)
               return $this->errorResponse(422,'mahasiswa tidak ditemukan');

        $pdf = Pdf::loadView('pdf.personal_report',get_object_vars($this));
       // return $pdf->download('personal_report.pdf');
       return $pdf->stream();
    }
}
