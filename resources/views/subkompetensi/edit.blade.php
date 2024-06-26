@extends('layout.index')
@section('content')
<div class="container">

<form id="form1" name="form1" method="{{$frmMethod}}" action="{{$frmAction}}">
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
        <label for="kompetensi_id" class="form-label">Kompetensi</label>

        <select class="form-select" name="kompetensi_id" id="kompetensi_id" >
            <option>Pilih Kompetensi</option>
            @foreach ($kompetensi as $item)
                <option value="{{$item->id}}" {{ $selected = ($item->id == request()->get('kompetensi_id') ? 'selected' : '')}}>{{ $item->nama_kompetensi}}</option>
            @endforeach
        </select>
    </div>

@endif
@if (!empty($dataToEdit))
    <div class="mb-3">
        <label for="nama_sub_kompetensi" class="form-label">Sub Kompetensi</label>
        <input class="form-control" type="text" id="nama_sub_kompetensi" name="nama_sub_kompetensi" value="{{$dataToEdit->nama_sub_kompetensi}}" />
    </div>
@endif

  <div class="mb-3">
    <button type="submit" class="btn btn-primary">{{$btnText}}</button>
  </div>
</form>

@if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! Session::get('success') !!}</li>
        </ul>
    </div>
@endif

@if(!empty($subKompetensi))
<table class="table table-striped mt-5">
    <tr>
        <td>No</td>
        <td>ID</td>
        <td>Kompetensi</td>
        <td>Nama Sub Kompetensi</td>
        <td></td>
    </tr>
    @foreach ($subKompetensi as $item)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $item->id}}</td>
            <td>{{ $item->kompetensi->nama_kompetensi}}</td>
            <td>{{ $item->nama_sub_kompetensi}}</td>
            <td><a href="{{route('subkompetensi.edit',$item->uuid).'?mata_kuliah='.request()->get('mata_kuliah').'&asesmen='.request()->get('asesmen').'&kompetensi_id='.request()->get('kompetensi_id')}}">Edit</a></td>

        </tr>
    @endforeach
</table>
@endif

</div>
@endsection
