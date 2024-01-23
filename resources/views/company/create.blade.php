@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Klien') }}</div>
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

                    <form action="{{route('company.insert')}}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label for="kode_company">Kode Klien</label>
                            <input type="text" class="form-control" id="kode_company" name='kode_company'
                                aria-describedby="" placeholder="Enter Kode Klient">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby=""
                                placeholder="Enter Nama">
                        </div>
                        <div class="form-group">
                            <label for="partai">Partai</label>
                            <input type="text" class="form-control" id="partai" name="partai" aria-describedby=""
                                placeholder="Enter Partai">
                        </div>
                        <div class="form-group">
                            <label for="nama">Daerah Pemilihan</label>
                            <input type="text" class="form-control" id="dapil" name="dapil" aria-describedby=""
                                placeholder="Enter Daerah Pemilihan">
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