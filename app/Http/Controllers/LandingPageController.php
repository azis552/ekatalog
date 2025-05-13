<?php

namespace App\Http\Controllers;

use App\Models\BerkasPenjual;
use App\Models\Produk;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = BerkasPenjual::paginate(10);
        $produks = Produk::paginate(10);

        return view("landing.index", compact("vendors","produks"));
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

    public function produk_detail($id)
    {
        $produk = Produk::find($id);
        return view("landing.produk_detail", compact("produk"));
    }
}
