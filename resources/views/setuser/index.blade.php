@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Setting User') }}</div>

                @if(session()->has('success'))
                <div class="car">

                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 border-gray-800 rounded-sm ">{{session('success')}}</p>
                </div>
                @endif
                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{route('setuser.create')}}"><button
                                class="btn btn-sm btn-primary ">Tambah</button></a>
                        <!-- <a href="{{route('calon.index')}}"><button class="btn btn-sm btn-primary ">Buat
                                User</button></a> -->
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Kode User</th>
                                <th>Kode Lokasi</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($setusers as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->nama}}</td>
                                <td>
                                    <a href="{{route('setuser.edit',['id'=>$row->id])}}"><button
                                            class="btn btn-sm btn-warning ">edit</button></a>
                                </td>
                                <td>
                                    <form action="{{route('setuser.delete',['id'=> $row->id])}}" method="post"
                                        onsubmit="return confirm('Apakah anda yakin?')">
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