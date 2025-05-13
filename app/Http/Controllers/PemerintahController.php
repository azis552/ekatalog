<?php

namespace App\Http\Controllers;

use App\Models\InstansiPemerintah;
use Illuminate\Http\Request;

class PemerintahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas =InstansiPemerintah::orderBy("created_at","desc")->paginate(10);
        return view("admin.pemerintah.index",compact("datas"));

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
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
        ]);

        $data = InstansiPemerintah::create([
            'name'=> $request->name,
            'alamat'=> $request->alamat,
            'user_id'=> auth()->user()->id,
            'status'=> "Pending",
        ]);
        if ($data) {
            return redirect()->route('home')->with('success', 'Data Instansi Pemerintah Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data Instansi Pemerintah Gagal Ditambahkan');
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
    public function updateStatus($id, $status)
    {
        $berkas = InstansiPemerintah::find($id);
        $berkas->status = $status;
        $berkas->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
