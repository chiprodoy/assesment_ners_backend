<html>
  <head>
    <meta charset="utf-8">
    <title>Laporan Asesmen</title>
  </head>
  <body>

<h1>ASESMEN LAPORAN PENDAHULUAN TINJAUAN KASUS</h1>
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
    @endphp
    @foreach ($nilaiSubKompetensi as $item)
    @if ($loop->index==0)
    <tr>
        <td colspan="3">{{ ucwords($item->sub_kompetensi->kompetensi->nama_kompetensi) }} - ({{$item->sub_kompetensi->kompetensi->persentase*100}}%)</td>

    </tr>
    @endif
    @if ($loop->index > 0 && $item->sub_kompetensi->id!=$nilaiSubKompetensi[$loop->iteration-1]->sub_kompetensi->id)
    <tr>
        <td colspan="3">{{ ucwords($item->sub_kompetensi->kompetensi->nama_kompetensi) }} - ({{$item->sub_kompetensi->kompetensi->persentase*100}}%)</td>

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
        <tr>
            <td></td>
            <td>Total Skor</td>
            <td>{{$subtotal}}</td>
        </tr>
        <tr>
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
        <tr>
            <td></td>
            <td>Poin </td>
            <td>{{$subPoin}}</td>
        </tr>
        @else
        @if ($item->sub_kompetensi->kompetensi->id!=$nilaiSubKompetensi[$loop->index+1]->sub_kompetensi->kompetensi->id)
        <tr>
            <td></td>
            <td>Total Skor{{$item->sub_kompetensi->kompetensi->id}} - {{$nilaiSubKompetensi[$loop->index+1]->sub_kompetensi->kompetensi->id}}</td>
            <td>{{$subtotal}}</td>
        </tr>
        <tr>
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
        <tr>
            <td></td>
            <td>Poin </td>
            <td>{{$subPoin}}</td>
        </tr>
        @endif
        @endif



    @endforeach

</table>
</body>
</html>
