@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Suara</div>

                @if(session()->has('success'))
                <div class="car">

                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 border-gray-800 rounded-sm ">{{session('success')}}</p>
                </div>
                @endif
                <div class="card-body">
                    <div class="mb-2">
                        <div class="mb-2">
                        </div>
                    </div>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>nama</th>
                                <th>partai</th>
                                @foreach($field as $row)
                                <th>{{$row->nama}}</th>
                                @endforeach
                                <th>Jumlah</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($data as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->partai}}</td>
                                @foreach($field as $row1)
                                @php
                                $name = $row1->nama;
                                @endphp
                                <td>{{$row->$name}}</td>
                                @endforeach
                                <td>{{$row->jumlah_suara}}</td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection