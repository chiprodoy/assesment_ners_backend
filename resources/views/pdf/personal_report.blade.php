<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Laporan Asesmen</title>
  </head>
  <body>

<h1>ASESMEN {{strtoupper($nilaiSubKompetensi[0]->sub_kompetensi->kompetensi->asesmen->nama_asesmen)}}</h1>
NIM : {{$mahasiswa->npm}}<br/>
Nama : {{$mahasiswa->nama}}<br/>
<table border=1 cellspacing=0 cellpadding=3 width='100%'>
    <tr rowspan=2>
        <td>No</td>
        <td>Aspek Yang Dinilai</td>
        <td>Skor Yang Dinilai</td>

    </tr>
    @php
        $subtotal = 0;
        $jumlahAspek = 0;
        $indexSubtotal=0;
        $subTotals=[0,0,0,0];
        $naKognitif = 0;
        $naPsikoMotor = 0;
        $naAfektif = 0;
        $naSocial = 0;
    @endphp
    @foreach ($nilaiSubKompetensi as $item)
    @if ($loop->index==0)
    <tr>
        <td colspan="3"><strong>{{ ucwords($item->sub_kompetensi->kompetensi->nama_kompetensi) }} - ({{$item->sub_kompetensi->kompetensi->persentase*100}}%)</strong></td>

    </tr>
    @endif





    @endforeach

</table>
<h2>KUMULATIF NILAI </h2>

</body>
</html>
