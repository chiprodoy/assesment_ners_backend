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
    @endphp
    @foreach ($nilaiSubKompetensi as $item)
    @if ($loop->index==0)
    <tr>
        <td colspan="3">{{ ucwords($item->sub_kompetensi->kompetensi->nama_kompetensi) }}</td>

    </tr>
    @endif

    <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $item->sub_kompetensi->nama_sub_kompetensi }}</td>
        <td>@php echo $item->nilai; $subtotal=$subtotal+$item->nilai @endphp </td>
    </tr>
    @endforeach
    <tr>
        <td></td>
        <td>Total Skor</td>
        <td>{{$subtotal}}</td>
    </tr>
    <tr>
        <td></td>
        <td>Nilai  (total skor /44*100)</td>
        <td>@php
            $subNilai = $subtotal/44*100;
            echo $subNilai
        @endphp</td>
    </tr>
    <tr>
        <td></td>
        <td>Poin </td>
        <td>@php
            $subPoin = $subNilai/30*100;
            echo $subPoin
        @endphp</td>
    </tr>
</table>
</body>
</html>
