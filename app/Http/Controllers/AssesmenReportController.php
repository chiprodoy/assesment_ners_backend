<?php

namespace App\Http\Controllers;

use App\Models\Asesmen;
use App\Models\Mahasiswa;
use App\Models\NilaiSubKompetensi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AssesmenReportController extends MainController
{
    public $mahasiswa;
    public $nilaiSubKompetensi;
    //
    public function show($mahasiswaUUID,$asesmenid,$mode='pdf'){

       // $this->mahasiswa = Mahasiswa::where('uuid',$mahasiswaUUID)->first();
       $this->mahasiswa = Mahasiswa::find($mahasiswaUUID);

       if(!$this->mahasiswa)
           return $this->errorResponse(422,'mahasiswa tidak ditemukan');

       $asesmen=Asesmen::find($asesmenid);
       if(!$asesmen)
           return $this->errorResponse(422,'asesmen tidak ditemukan');

       $this->nilaiSubKompetensi = NilaiSubKompetensi::join('sub_kompetensis','nilai_sub_kompetensis.sub_kompetensi_id','=','sub_kompetensis.id')
       ->join('kompetensis','sub_kompetensis.kompetensi_id','=','kompetensis.id')
       ->join('asesmens','kompetensis.asesmen_id','=','asesmens.id')
       ->orderBy('sub_kompetensis.kompetensi_id')
       ->where('mahasiswa_id',$this->mahasiswa->id)
       ->where('asesmens.id',$asesmenid)
       ->get();
        if($mode=='pdf'){
            $pdf = Pdf::loadView('pdf.personal_report',get_object_vars($this));
            // return $pdf->download('personal_report.pdf');

            return $pdf->stream();
        }elseif($mode=='pdf-download'){
            $pdf = Pdf::loadView('pdf.personal_report',get_object_vars($this));
            return $pdf->download('personal_report.pdf');
        }else{
            return view('pdf.personal_report',get_object_vars($this));
        }
      //  $pdf = Pdf::loadView('pdf.personal_report',get_object_vars($this));
       // return $pdf->download('personal_report.pdf');
      // return $pdf->stream();
    }
}
