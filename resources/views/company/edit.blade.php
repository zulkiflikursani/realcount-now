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

                    <form action="{{route('company.update',['company'=>$company])}}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="kode_company">Kode Klien</label>
                            <input type="text" class="form-control" id="kode_company" name='kode_company' aria-describedby="" placeholder="Enter Kode Klient" value="{{$company->kode_company}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="" placeholder="Enter Nama" value="{{$company->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="partai">Partai</label>
                            <input type="text" class="form-control" id="partai" name="partai" aria-describedby="" placeholder="Enter Partai" value="{{$company->partai}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Daerah Pemilihan</label>
                            <input type="text" class="form-control" id="dapil" name="dapil" aria-describedby="" placeholder="Enter Daerah Pemilihan" value="{{$company->dapil}}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection