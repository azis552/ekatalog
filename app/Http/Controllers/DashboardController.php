<?php

namespace App\Http\Controllers;

use App\Models\BerkasPenjual;
use App\Models\InstansiPemerintah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $data = BerkasPenjual::where('user_id', auth()->user()->id)->get();
        $count = BerkasPenjual::where('user_id', auth()->user()->id)->count();
        $pemerintah = InstansiPemerintah::where('user_id', auth()->user()->id)->get();
        $pemerintahCount = InstansiPemerintah::where('user_id', auth()->user()->id)->count();
        return view("admin.index", compact("data","count","pemerintah","pemerintahCount"));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
}
