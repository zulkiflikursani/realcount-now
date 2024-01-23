<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyContorller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Company::all();
        return view('company.index', ['companies' => $data]);
    }
    public function create()
    {
        return view('company.create');
    }

    public function insert(Request $request)
    {
        $data = $request->validate([
            "kode_company" => 'required',
            "nama" => 'required',
            "partai" => 'required',
            "dapil" => 'required',
        ]);

        $newCompany = Company::create($data);
        return redirect(route('company.index'));
    }
    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company]);
    }

    public function update(Company $company, Request $request)
    {
        $data = $request->validate([
            "kode_company" => 'required',
            "nama" => 'required',
            "partai" => 'required',
            "dapil" => 'required',
        ]);

        $company->update($data);

        return redirect(route('company.index'))->with('success', 'Berhasil Mengupdate data');
    }

    public function delete(Company $company)
    {
        $company->delete();
        return redirect(route('company.index'))->with('success', 'Berhasil Menghapus data');
    }
}
