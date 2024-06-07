<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Laporan Asesmen</title>
  </head>
  <body>

NIM : {{$mahasiswa->npm}}<br/>
Nama : {{$mahasiswa->nama}}<br/>

<table cellpadding=5>
    <tr>
        <td></td>
        <td></td>
        <td>Kog</td>
        <td>Psi</td>
        <td>Afe</td>
        <td>Soc</td>
        <td>Nilai</td>
        <td>Grade</td>
    </tr>
    @php
        $totalKog=0;
        $totalPsi=0;
        $totalAfe=0;
        $totalSoc=0;
        $totalNilai=0;
        $totalNA=0;
    @endphp
    @foreach ($nilaiSubKompetensi as $k => $v)
    @php
        $totalKog=$totalKog+$v->kognitif;
        $totalPsi=$totalPsi+$v->psikomotorik;
        $totalAfe=$totalAfe+$v->afektif;
        $totalSoc=$totalSoc+$v->social;
        $totalNilai=$v->kognitif+$v->psikomotorik+$v->afektif+$v->social;
        $totalNA=$totalNA+$totalNilai;
        $grade='';
        $gradeAkhir='';
    @endphp
        <tr>
            <td></td>
            <td>{{ $v->nama_asesmen}}</td>
            <td>{{ $v->kognitif}}</td>
            <td>{{ $v->psikomotorik}}</td>
            <td>{{ $v->afektif}}</td>
            <td>{{ $v->social}}</td>
            <td>{{$totalNilai}}</td>
            <td>
                @php
                if($totalNilai >= 80){
                    $grade='A';
                }elseif ($totalNilai < 80 && $totalNilai >= 70) {
                    # code...
                    $grade='B';

                }elseif ($totalNilai < 70 && $totalNilai >= 51) {
                    # code...
                    $grade='C';
                }elseif ($totalNilai < 51 && $totalNilai >= 30) {
                    # code...
                    $grade='D';
                }else{
                    $grade='E';
                }
            @endphp
            {{$grade}}
            </td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td align="right">Nilai Akhir</td>
        <td>{{ $totalKog}}</td>
        <td>{{ $totalPsi}}</td>
        <td>{{ $totalAfe}}</td>
        <td>{{ $totalSoc}}</td>
        <td>{{$totalNA}}</td>
        <td>
            @php
            if($totalNA >= 80){
                $gradeAkhir='A';
            }elseif ($totalNA < 80 && $totalNA >= 70) {
                # code...
                $gradeAkhir='B';

            }elseif ($totalNA < 70 && $totalNA >= 51) {
                # code...
                $gradeAkhir='C';
            }elseif ($totalNA < 51 && $totalNA >= 30) {
                # code...
                $gradeAkhir='D';
            }else{
                $gradeAkhir='E';
            }
        @endphp
        {{$gradeAkhir}}
        </td>
    </tr>
</table>
</body>
</html>
