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
    @if ($loop->index > 0 && $item->sub_kompetensi->id!=$nilaiSubKompetensi[$loop->index-1]->sub_kompetensi->id)
    <tr>
        <td colspan="3">{{ ucwords($item->sub_kompetensi->kompetensi->nama_kompetensi) }} - ({{$item->sub_kompetensi->kompetensi->persentase*100}}%)</td>

    </tr>
    @endif



    @endforeach

</table>
</body>
</html>
