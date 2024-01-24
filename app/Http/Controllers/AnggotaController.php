<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Jumlahsuara;
use App\Models\Lokasi;
use App\Models\Setusers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setuser = Setusers::where('kode_user', Auth::user()->id)->get();
        $lokasi = $setuser[0]->kode_lokasi;
        $getnamalokasi = Lokasi::where('id', $lokasi)->first();
        $namalokasi = $getnamalokasi->nama;

        $data = DB::table('jumlah_suara')
            ->leftjoin('calon', 'jumlah_suara.kode_calon', '=', 'calon.id')
            ->where('jumlah_suara.company', Auth::user()->company)
            ->where('jumlah_suara.kode_lokasi', $lokasi)
            ->select('jumlah_suara.id', 'jumlah_suara.kode_anggota', 'jumlah_suara.kode_calon', 'jumlah_suara.jumlah_suara', 'calon.nama', 'calon.partai')->get();
        return view('anggota.index', ["data" => $data, 'lokasi' => $lokasi, 'namalokasi' => $namalokasi]);
    }
    public function create()
    {
        $calon = Calon::where('company', Auth::user()->company)->get();
        return view('anggota.create', ['calon' => $calon]);
    }

    public function insert(Request $request)
    {
        $setuser = Setusers::where('kode_user', Auth::user()->id)->get();
        $lokasi = $setuser[0]->kode_lokasi;

        $request->validate([
            'kode_calon' => 'required|unique:jumlah_suara,kode_calon,' . $request->id . ',id,kode_anggota,' . $request->kode_anggota,
            'kode_anggota' => 'required',
            'jumlah_suara' => 'required',
            'company' => 'required'
        ]);


        Jumlahsuara::create(
            [
                "kode_calon" => $request->kode_calon,
                "kode_anggota" => Auth::user()->id,
                "kode_lokasi" => $lokasi,
                "jumlah_suara" => $request->jumlah_suara,
                "company" => Auth::user()->company,
            ]
        );
        return redirect(route('anggota.index'))->with('success', "Berhasil Menyimpan Suara");
    }

    public function delete(string $id)
    {
        Jumlahsuara::destroy($id);
        return redirect(route('anggota.index'))->with('success', "Berhasil Menghapus Suara");
    }
}
