@extends('layout.index')
@section('content')
<div class="container">
    @if (!empty($storeAction))
        <form id="form1" name="form1" method="POST" action="{{$storeAction}}">

    @else
        <form id="form1" name="form1" method="GET">

    @endif

    @csrf
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Mata Kuliah</label>

    <select class="form-select" name="mata_kuliah_id" id="mata_kuliah_id">
        <option>Pilih Mata Kuliah</option>
        @foreach ($matakuliah as $item)
            <option value="{{ $item->id}}" {{ $selected = ($item->id == request()->get('mata_kuliah_id') ? 'selected' : '')}}>{{ $item->kode_mata_kuliah}} - {{ $item->nama_mata_kuliah}}</option>
        @endforeach
    </select>
</div>


@if (!empty($asesmen))

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Asesmen</label>

        <select class="form-select" name="asesmen_id" id="asesmen_id" >
            <option>Pilih Asesmen</option>
            @foreach ($asesmen as $item)
                <option value="{{$item->id}}" {{ $selected = ($item->id == request()->get('asesmen_id') ? 'selected' : '')}}>{{ $item->nama_asesmen}}</option>
            @endforeach
        </select>
    </div>

@endif

@if (request()->get('asesmen_id'))
    <div class="mb-3">
        <label for="nama_kompetensi" class="form-label">Kompetensi</label>
        <input type="text" class="form-control" id="nama_kompetensi" name="nama_kompetensi">
    </div>
    <div class="mb-3">
        <label for="persentase" class="form-label">Persentase</label>
        <input type="text" class="form-control" id="persentase" name="persentase">
    </div>
@endif


  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Kirim</button>
  </div>
</form>
<table class="table table-bordered">
    <tr>
        <td>No</td>
        <td>Nama Kompetensi</td>

    </tr>
    @if ($kompetensi)

    @foreach ($kompetensi as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nama_kompetensi}}</td>

        </tr>
    @endforeach
    @endif

</table>
</div>
@endsection
