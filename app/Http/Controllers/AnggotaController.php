<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Jumlahsuara;
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
        $data = DB::table('jumlah_suara')
            ->leftjoin('calon', 'jumlah_suara.kode_calon', '=', 'calon.id')
            ->where('jumlah_suara.company', Auth::user()->company)->get();
        return view('anggota.index', ["data" => $data]);
    }
    public function create()
    {
        $calon = Calon::where('company', Auth::user()->company)->get();
        return view('anggota.create', ['calon' => $calon]);
    }

    public function insert(Request $request)
    {
        $data = $request->validate([
            'kode_calon' => 'required|unique:jumlah_suara',
            'kode_anggota' => 'required',
            'jumlah_suara' => 'required',
            'company' => 'required',

        ]);

        Jumlahsuara::create($data);
        return redirect(route('anggota.index'))->with('success', "Berhasil Menyimpan Suara");
    }

    public function delete(string $id)
    {
        Jumlahsuara::where('id', $id)->delete();
        return redirect(route('anggota.index'))->with('success', "Berhasil Menghapus Suara");
    }
}
