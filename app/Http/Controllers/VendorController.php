<?php

namespace App\Http\Controllers;

use App\Models\BerkasPenjual;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas =BerkasPenjual::orderBy("created_at","desc")->paginate(10);
        return view("admin.berkas.index",compact("datas"));

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
            'file' => 'required|mimes:pdf|max:2048',
            'keterangan' => 'required',
            'tipe' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('file') && $request->hasFile('foto')) {
            $file = $request->file('file');
            $foto = $request->file('foto');

            $fileName = time() . '_' . $file->getClientOriginalName();
            $fotoName = time() . '_' . $foto->getClientOriginalName();

            $file->move(public_path('storage/files'), $fileName);
            $foto->move(public_path('storage/images'), $fotoName);

            BerkasPenjual::create([
                'name' => $request->name,
                'file' => $fileName,
                'user_id' => auth()->user()->id,
                'status' => "Pending",
                'keterangan' => $request->keterangan,
                'tipe' => $request->tipe,
                'alamat' => $request->alamat,
                'foto' => $fotoName
            ]);

            return redirect()->route('home')->with('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->route('home')->with('error','Data Gagal Ditambahkan');
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
        $berkas = BerkasPenjual::find($id);
        $berkas->status = $status;
        $berkas->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

}
