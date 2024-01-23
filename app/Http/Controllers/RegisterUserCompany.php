<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\UserModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterUserCompany extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $company = Company::all();
        return view("register", [
            "company" => $company
        ]);
    }

    public function create(Request $request)
    {

        $data = $request->validate([
            'name' => "required",
            'company' => "required",
            'email' => "required|unique:users",
            'level' => "required"
        ]);

        UserModels::create([
            'name' => $request->name,
            'company' => $request->company,
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password),
        ]);



        return redirect(route('register.listuser'))->with('success', "Berhasil Menyimpan data");
    }

    public function listuser()
    {
        $level = Auth::user()->level;
        if ($level == 1) {
            $users = UserModels::all();
        } else {
            $users = UserModels::where('company', Auth::user()->company)->get();
        }
        return view('listuser', ['users' => $users]);
    }

    public function delete(User $users)
    {
        $users->delete();
        return  redirect(route('register.listuser'))->with('success', 'Berhasil menghapus data');
    }
    //
}
