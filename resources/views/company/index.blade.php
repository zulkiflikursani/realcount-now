@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Klien') }}</div>

                @if(session()->has('success'))
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 border-gray-800 rounded-sm ">{{session('success')}}</p>
                @endif

                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{route('company.create')}}"><button
                                class="btn btn-sm btn-primary ">Tambah</button></a>
                        <a href="{{route('register.index')}}"><button class="btn btn-sm btn-primary ">Buat
                                User</button></a>
                    </div>

                    <table class="table table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope='col'>id</th>
                                <th>kode klien</th>
                                <th>nama</th>
                                <th>partai</th>
                                <th>dapil</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($companies as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->kode_company}}</td>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->partai}}</td>
                                <td>{{$row->dapil}}</td>
                                <td><a href="{{route('company.edit',['company'=>$row])}}"><button
                                            class="btn btn-sm btn-warning ">edit</button></a></td>
                                <td>
                                    <form action="{{route('company.delete',['company'=>$row])}}" method="post"
                                        onsubmit="return confirm('Yakin ingin menghapus data ?')">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-sm btn-danger" value="delete">
                                </td>
                                </form>
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