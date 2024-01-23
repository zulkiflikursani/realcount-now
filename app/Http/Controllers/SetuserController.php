<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Setusers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SetuserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setusers = DB::table('setuser')
            ->leftJoin('users', 'setuser.kode_user', '=', 'users.id')
            ->leftJoin('lokasi', 'lokasi.id', '=', 'setuser.kode_lokasi')
            ->select('setuser.id', 'setuser.kode_user', 'users.name', 'setuser.kode_lokasi', 'lokasi.nama')
            ->get();

        return view('setuser.index', ['setusers' => $setusers]);
    }

    public function create()
    {
        $users = User::where('company', Auth::user()->company)->get();
        $lokasi = Lokasi::where('company', Auth::user()->company)->get();

        return view('setuser.create', ['users' => $users, 'lokasi' => $lokasi]);
    }

    public function insert(Request $request)
    {
        $data = $request->validate([
            'company' => 'required',
            'kode_user' => "required",
            'kode_lokasi' => "required",
        ]);

        Setusers::create($data);
        return redirect(route('setuser.index'))->with('success', 'Berhasil menambahkan data');
    }
    public function edit(string $id, Request $request)
    {

        $users = User::where('company', Auth::user()->company)->get();
        $lokasi = Lokasi::where('company', Auth::user()->company)->get();
        $data = Setusers::where('id', $id)->get();
        return view('setuser.edit', ['setuser' => $data, 'users' => $users, 'lokasi' => $lokasi]);
    }

    public function update(string $id, Request $request)
    {
        $data = $request->validate([
            'company' => 'required',
            'kode_user' => "required",
            'kode_lokasi' => "required",
        ]);

        Setusers::where('id', $id)
            ->udpate($data);
        return redirect(route('setuser.index'))->with('success', 'Berhasil mengedit data');
    }

    public function delete(string $id)
    {
        Setusers::where('id', $id)->delete();
        return redirect(route('setuser.index'))->with('success', 'Berhasil menghapus data');
    }
}
