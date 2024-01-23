<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $company = Auth::user()->company;
        $data = Calon::where('company', $company)->get();
        return view('calon.index', ['calon' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('calon.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'company' => 'required',
            'nama' => 'required',
            'partai' => 'required',
            'dapil' => 'required',
        ]);

        Calon::create($data);
        return redirect(route('calon.index'))->with('success', "Berhasil Menambahkan Calon");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calon $calon)
    {
        return view('calon.edit', ["calon" => $calon]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calon $calon)
    {
        //
        $data = $request->validate([
            'company' => 'required',
            'nama' => 'required',
            'partai' => 'required',
            'dapil' => 'required',
        ]);

        $calon->update($data);
        return redirect(route('calon.index'))->with("success", "Berhasil Mengedit Data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Calon $calon)
    {
        $calon->delete();
        return redirect(route('calon.index'))->with("success", "Berhasil Menghapus Data");

        //
    }
}
