<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanSuaraContorller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $getlokasi = Lokasi::where('company', Auth::user()->company)->get();
        $tempQuerylok = '';
        foreach ($getlokasi as $row) {
            $namalokasi = str_replace(' ', '', $row->nama);
            $tempQuerylok .= "IF(jumlah_suara.kode_lokasi='$row->id',SUM(jumlah_suara.jumlah_suara),0) as $namalokasi,";
        }

        $query = "select jumlah_suara.id, jumlah_suara.kode_calon,calon.nama,calon.partai,jumlah_suara.kode_lokasi,$tempQuerylok sum(jumlah_suara.jumlah_suara) as jumlah_suara from jumlah_suara left join calon on jumlah_suara.kode_calon=calon.id group by jumlah_suara.kode_calon";

        $result = DB::select($query);


        return view('laporan.suara', ['data' => $result, 'field' => $getlokasi]);
    }
}
