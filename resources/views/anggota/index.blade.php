@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lakukan Pengisian') }}</div>

                @if(session()->has('success'))
                <div class="car">

                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 border-gray-800 rounded-sm ">{{session('success')}}</p>
                </div>
                @endif
                <div class="card-body">
                    <div class="mb-2">
                        <div class="mb-2">
                            <a href="{{route('anggota.create')}}"><button class="btn btn-sm btn-primary ">Tambah</button></a>
                            <!-- <a href="{{route('calon.index')}}"><button class="btn btn-sm btn-primary ">Buat
                                User</button></a> -->
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>nama</th>
                                <th>partai</th>
                                <th>Jumlah</th>

                                <th>hapus</th>
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
                                <td>{{$row->jumlah_suara}}</td>
                                <td>
                                    <form action="{{route('suara.delete',['id'=>$row->id])}}" method="post" onsubmit="return confirm('Apakah anda yakin?')">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                    </form>
                                </td>
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