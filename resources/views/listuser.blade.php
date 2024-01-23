@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if(Auth::user()->level == 1)
                <div class="card-header">{{ __('Klien') }}</div>
                @else
                <div class="card-header">{{ __('List User') }}</div>
                @endif

                @if(session()->has('success'))
                <div class="car">

                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 border-gray-800 rounded-sm ">{{session('success')}}</p>
                </div>
                @endif
                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{route('register.index')}}"><button
                                class="btn btn-sm btn-primary ">Tambah</button></a>
                        <a href="{{route('setuser.index')}}"><button class="btn btn-sm btn-primary ">Set lokasi
                                User</button></a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>company</th>
                                <th>level</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->company}}</td>
                                <td>{{$user->level}}</td>
                                <td>
                                    <form action="{{route('register.delete',['users'=>$user])}}" method="post"
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