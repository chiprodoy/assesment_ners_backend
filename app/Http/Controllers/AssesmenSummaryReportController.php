<?php

namespace App\Http\Controllers;

use App\Models\Asesmen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\NilaiSubKompetensi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class AssesmenSummaryReportController extends MainController
{
    public $mahasiswa;
    public $nilaiSubKompetensi;
    //

    public function show($mahasiswaUUID,$matakuliahID,$mode='pdf'){
        ini_set('max_execution_time', 300);
        ini_set("memory_limit","512M");
       // $this->mahasiswa = Mahasiswa::where('uuid',$mahasiswaUUID)->first();
       $this->mahasiswa = Mahasiswa::find($mahasiswaUUID);

       if(!$this->mahasiswa)
           return $this->errorResponse(422,'mahasiswa tidak ditemukan');

       $asesmen=MataKuliah::find($matakuliahID);
       if(!$asesmen)
           return $this->errorResponse(422,'matakuliah tidak ditemukan');

       $sql="SELECT
                nama_asesmen,
                (SELECT ((SUM(nilai)/44)*100) FROM nilai_sub_kompetensis
                INNER JOIN sub_kompetensis ON nilai_sub_kompetensis.sub_kompetensi_id=sub_kompetensis.id
                INNER JOIN kompetensis ON kompetensis.id=sub_kompetensis.kompetensi_id
                WHERE kompetensis.asesmen_id= asesmens.id AND grup_kompetensi='kognitif' AND nilai_sub_kompetensis.mahasiswa_id=".$this->mahasiswa->id.")
                AS kognitif,
                (SELECT ((SUM(nilai)/44)*100) FROM nilai_sub_kompetensis
                INNER JOIN sub_kompetensis ON nilai_sub_kompetensis.sub_kompetensi_id=sub_kompetensis.id
                INNER JOIN kompetensis ON kompetensis.id=sub_kompetensis.kompetensi_id
                WHERE kompetensis.asesmen_id= asesmens.id AND grup_kompetensi='psikomotorik' AND nilai_sub_kompetensis.mahasiswa_id=".$this->mahasiswa->id.")
                AS psikomotorik,
                (SELECT COUNT(id) FROM asesmens WHERE mata_kuliah_id=".$matakuliahID.") AS jmlh_asesmen,
                (SELECT ((SUM(nilai)/44)*100) FROM nilai_sub_kompetensis
                INNER JOIN sub_kompetensis ON nilai_sub_kompetensis.sub_kompetensi_id=sub_kompetensis.id
                INNER JOIN kompetensis ON kompetensis.id=sub_kompetensis.kompetensi_id
                WHERE kompetensis.asesmen_id= asesmens.id AND grup_kompetensi='afektif' AND nilai_sub_kompetensis.mahasiswa_id=".$this->mahasiswa->id.")
                AS afektif,
                (SELECT COUNT(id) FROM asesmens WHERE mata_kuliah_id=".$matakuliahID.") AS jmlh_asesmen,
                (SELECT ((SUM(nilai)/44)*100) FROM nilai_sub_kompetensis
                INNER JOIN sub_kompetensis ON nilai_sub_kompetensis.sub_kompetensi_id=sub_kompetensis.id
                INNER JOIN kompetensis ON kompetensis.id=sub_kompetensis.kompetensi_id
                WHERE kompetensis.asesmen_id= asesmens.id AND grup_kompetensi='social interaction' AND nilai_sub_kompetensis.mahasiswa_id=".$this->mahasiswa->id.")
                AS social
                FROM asesmens
                WHERE mata_kuliah_id=".$matakuliahID;

       $this->nilaiSubKompetensi = DB::select($sql);

        if($mode=='pdf'){
            $pdf = Pdf::loadView('pdf.asesmen_summary_report',get_object_vars($this));
            // return $pdf->download('personal_report.pdf');
            return $pdf->stream();
        }elseif($mode=='pdf-download'){
            $pdf = Pdf::loadView('pdf.asesmen_summary_report',get_object_vars($this));
            return $pdf->download('asesmen_summary_report.pdf');
        }else{
            return view('pdf.asesmen_summary_report',get_object_vars($this));
        }
      //  $pdf = Pdf::loadView('pdf.personal_report',get_object_vars($this));
       // return $pdf->download('personal_report.pdf');
      // return $pdf->stream();
    }

    public function show1($mahasiswaUUID,$matakuliahID,$mode='pdf'){
        ini_set('max_execution_time', 300);
        ini_set("memory_limit","512M");
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
            $pdf = Pdf::loadView('pdf.asesmen_summary_report',get_object_vars($this));
            // return $pdf->download('personal_report.pdf');
            return $pdf->stream();
        }elseif($mode=='pdf-download'){
            $pdf = Pdf::loadView('pdf.asesmen_summary_report',get_object_vars($this));
            return $pdf->download('asesmen_summary_report.pdf');
        }else{
            return view('pdf.asesmen_summary_report',get_object_vars($this));
        }
      //  $pdf = Pdf::loadView('pdf.personal_report',get_object_vars($this));
       // return $pdf->download('personal_report.pdf');
      // return $pdf->stream();
    }
}
