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

                    <form action="" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('put')


                        <input type="text" name='company' value="{{Auth::user()->company}}" readonly hidden />
                        @php
                        $kode_lok = ""
                        @endphp
                        @foreach($setuser as $row)
                        @php
                        $kode_user = $row->kode_user;
                        $kode_lok = $row->kode_lokasi;
                        @endphp
                        @endforeach
                        <div class="form-group">
                            <label for="kode_company">Kode User</label>
                            <select class="form-select" name="kode_user" id="">
                                @php
                                $selected = '';
                                @endphp
                                @foreach($users as $row)
                                @if($row->id == $kode_user)
                                @php
                                $selected="selected=selected";
                                @endphp
                                @else
                                @php
                                $selected='';
                                @endphp
                                @endif
                                <option value="{{$row->id}}" {{$selected}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">

                            <label for="partai">Kode Lokasi</label>
                            <select class="form-select" name="kode_lokasi" id="">
                                @php
                                $selected = '';
                                @endphp
                                @foreach($lokasi as $row)
                                @if($row->id == $kode_lok)
                                @php
                                $selected="selected=selected";
                                @endphp
                                @else
                                @php
                                $selected='';
                                @endphp
                                @endif
                                <option value="{{$row->id}}" {{$selected}}>{{$row->nama}}
                                </option>
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