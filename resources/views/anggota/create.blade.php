@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Jumlah Suara') }}</div>
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

                    <form action="{{route('suara.insert')}}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <input type="text" name='company' value="{{Auth::user()->company}}" readonly hidden>
                        <input type="text" name='kode_anggota' value="{{Auth::user()->id}}" readonly hidden>
                        <div class="form-group mb-3">
                            <label for="kode_company">Nama</label>
                            <select name="kode_calon" id="" class="form-select">
                                <option value=''>--Pilih Calon--</option>
                                @foreach($calon as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="partai">Jumlah Suara</label>
                            <input type="number" class="form-control" id="jumlah_suara" name="jumlah_suara"
                                aria-describedby="" placeholder="Masukkan Jumlah Suara">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{route('anggota.index')}}" class="btn btn-primary">Kembali</a>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection