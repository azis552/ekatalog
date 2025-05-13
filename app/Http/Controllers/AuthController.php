<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("auth.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "email"=> "required|email|unique:users",
            "password"=> "required|min:8",
            "name"=> "required"
            ]);

        $user = User::create([
            "email"=> $data["email"],
            "password"=> Hash::make($data["password"]),
            "name"=> $data["name"],
        ]);


        if ($user) {
            return redirect()->route("login")->with("success","Berhasil Membuat Akun");
        } else {
            return redirect()->route("register")->with("error","Gagal Membuat Akun");
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login_check(Request $request)
    {
        $data = $request->validate([
            "email"=> "required|email",
            "password"=> "required|min:8"
        ]);

        if (Auth::attempt($data)) {
            return redirect()->route("home")->with("success","Berhasil Login");
        } else {
            return redirect()->route("login")->with("error","Gagal Login");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login")->with("success","Berhasil Logout");
    }
}
