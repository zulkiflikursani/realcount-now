@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Setting User') }}</div>
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

                    <form action="{{route('setuser.insert')}}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <input type="text" name='company' value="{{Auth::user()->company}}" readonly hidden />

                        <div class="form-group">
                            <label for="kode_company">Kode User</label>
                            <select class="form-select" name="kode_user" id="">
                                @foreach($users as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="partai">Kode Lokasi</label>
                            <select class="form-select" name="kode_lokasi" id="">
                                @foreach($lokasi as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                            </select>
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