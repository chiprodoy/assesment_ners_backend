<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Laporan Asesmen</title>
  </head>
  <body>

<h1>ASESMEN {{strtoupper($nilaiSubKompetensi[0]->sub_kompetensi->kompetensi->asesmen->nama_asesmen)}}</h1>
NIM : {{$mahasiswa->npm}}<br/>
Nama : {{$mahasiswa->nama}}<br/>

</table>
<h2>KUMULATIF NILAI </h2>

</body>
</html>
