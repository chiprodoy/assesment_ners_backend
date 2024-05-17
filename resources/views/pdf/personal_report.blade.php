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

    <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $item->sub_kompetensi->nama_sub_kompetensi }} - {{$item->sub_kompetensi->kompetensi->nama_kompetensi}}</td>
        <td>{{$item->nilai}}</td>
    </tr>
    @php
        $jumlahAspek=$jumlahAspek+1;
        $subtotal=$subtotal+$item->nilai;
    @endphp
        @if ($loop->remaining == 0)
        <tr align="right">
            <td></td>
            <td>Total Skor</td>
            <td>{{$subtotal}}</td>
        </tr>
        @php
            $subTotals[$indexSubtotal]=$subtotal;
            $indexSubtotal = $indexSubtotal+1;
            exit('</table></body></html>');
        @endphp
        <tr align="right">
            <td></td>
            <td>Nilai  (total skor /{{$jumlahAspek}}*100)</td>
            @php
                $subNilai = $subtotal/$jumlahAspek*100;
                $subNilais[]=$subNilai;
                $jumlahAspek = 0;
            @endphp
            <td>{{$subNilai}}</td>
        </tr>
        @php
            $subPoin = $subNilai/$item->sub_kompetensi->kompetensi->persentase;
            $subPoins[]=$subPoin;
        @endphp
        <tr align="right">
            <td></td>
            <td>Poin </td>
            <td>{{$subPoin}}</td>
        </tr>
        @else
        @if ($item->sub_kompetensi->kompetensi->id!=$nilaiSubKompetensi[$loop->index+1]->sub_kompetensi->kompetensi->id)
        @php
            $subTotals[$indexSubtotal]=$subtotal;
            $indexSubtotal = $indexSubtotal+1;

        @endphp
        <tr align="right">
            <td></td>
            <td>Total Skor</td>
            <td>{{$subtotal}}</td>
        </tr>
        <tr align="right">
            <td></td>
            <td>Nilai  (total skor /{{$jumlahAspek}}*100)</td>
            @php
                $subNilai = $subtotal/$jumlahAspek*100;
                $subNilais[]=$subNilai;
                $jumlahAspek = 0;
            @endphp
            <td>{{$subNilai}}</td>
        </tr>
        @php
            $subPoin = $subNilai/$item->sub_kompetensi->kompetensi->persentase;
            $subPoins[]=$subPoin;

        @endphp
        <tr align="right">
            <td></td>
            <td>Poin (nilai x {{$item->sub_kompetensi->kompetensi->persentase*100}}/100)</td>
            <td>{{$subPoin}}</td>
        </tr>
        <tr>
            <td colspan="3"><strong>{{ ucwords($item->sub_kompetensi->kompetensi->nama_kompetensi) }} - ({{$item->sub_kompetensi->kompetensi->persentase*100}}%)</strong></td>
        </tr>
        @endif
        @endif



    @endforeach

</table>
<h2>KUMULATIF NILAI </h2>

</body>
</html>
