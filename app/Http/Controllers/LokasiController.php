<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokasiController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        $lokasi = Lokasi::where('company', Auth::user()->company)->get();

        return view('lokasi.index', ['lokasi' => $lokasi]);
    }

    public function create()
    {
        return view('lokasi.create');
    }

    public function insert(Request $request)
    {
        $data = $request->validate(
            [
                "company" => "required",
                "nama" => "required",
            ]
        );
        Lokasi::create($data);
        return (redirect(route('lokasi.index')))->with('success', 'Berhasil Menyimpan Data');
    }

    public function edit(Lokasi $lokasi)
    {
        return view('lokasi.edit', ["lokasi" => $lokasi]);
    }

    public function update(Request $request, Lokasi $lokasi)
    {
        $data = $request->validate(
            [
                "company" => "required",
                "nama" => "required",
            ]
        );

        $lokasi->update($data);
        return redirect(route('lokasi.index'))->with('success', "Berhasil Mengedit data");
    }

    public function delete(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect(route('lokasi.index'))->with('success', "Berhasil Menghapus data");
    }
}
