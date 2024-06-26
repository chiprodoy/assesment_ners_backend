@extends('layout.index')
@section('content')
<div class="container">
<form id="form1" name="form1" method="GET">
    @csrf
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Mata Kuliah</label>

    <select class="form-select" name="mata_kuliah" id="mata_kuliah">
        <option>Pilih Mata Kuliah</option>
        @foreach ($matakuliah as $item)
            <option value="{{ $item->id}}" {{ $selected = ($item->id == request()->get('mata_kuliah') ? 'selected' : '')}}>{{ $item->kode_mata_kuliah}} - {{ $item->nama_mata_kuliah}}</option>
        @endforeach
    </select>
</div>

@if (!empty($asesmen))

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Asesmen</label>

        <select class="form-select" name="asesmen" id="asesmen" >
            <option>Pilih Asesmen</option>
            @foreach ($asesmen as $item)
                <option value="{{$item->id}}" {{ $selected = ($item->id == request()->get('asesmen') ? 'selected' : '')}}>{{ $item->nama_asesmen}}</option>
            @endforeach
        </select>
    </div>

@endif

@if (!empty($kompetensi))

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Kompetensi</label>

        <select class="form-select" name="kompetensi" id="kompetensi" >
            <option>Pilih Kompetensi</option>
            @foreach ($kompetensi as $item)
                <option value="{{$item->id}}" {{ $selected = ($item->id == request()->get('kompetensi') ? 'selected' : '')}}>{{ $item->nama_kompetensi}}</option>
            @endforeach
        </select>
    </div>

@endif

  <div class="mb-3">
    <button type="submit" class="btn btn-primary">Kirim</button>
  </div>
</form>
</div>
@endsection
