@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Lokasi') }}</div>
                <div>
                    @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $e)
                        {{$e}}
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="card-body">

                    <form action="{{route('lokasi.update',['lokasi'=>$lokasi])}}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <input type="text" name='company' value="{{Auth::user()->company}}" readonly hidden>
                        <div class="form-group">
                            <label for="kode_company">Nama Lokasi</label>
                            <input type="text" class="form-control" id="nama" name='nama' aria-describedby="" placeholder="Nama Lokasi" value="{{$lokasi->nama}}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection