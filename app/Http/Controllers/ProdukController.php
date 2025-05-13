<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == "admin") {
            $datas = Produk::orderBy("created_at", "desc")->paginate(10);
            return view("admin.produk.index", compact("datas"));
        }else{
        $datas = Produk::where('user_id',Auth::user()->id)->orderBy("created_at", "desc")->paginate(10);
        return view("admin.produk.index", compact("datas"));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.produk.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
            'deskripsi' => 'required',
            'berat' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('file') && $request->hasFile('foto')) {
            $file = $request->file('file');
            $foto = $request->file('foto');

            $fileName = time() . '_' . $file->getClientOriginalName();
            $fotoName = time() . '_' . $foto->getClientOriginalName();

            $file->move(public_path('storage/files'), $fileName);
            $foto->move(public_path('storage/images'), $fotoName);

            Produk::create([
                'name' => $request->name,
                'dokumen' => $fileName,
                'user_id' => auth()->user()->id,
                'status' => "Pending",
                'deskripsi' => $request->deskripsi,
                'berat' => $request->berat,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
                'foto' => $fotoName
            ])->save();

            return redirect()->route("produk.index")->with("success", "Berhasil Menambahkan Produk");
        } else {
            return redirect()->route("produk.index")->with("error", "Gagal Menambahkan Produk");
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::find($id);
        return view("admin.produk.show", compact("produk"));
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
        $berkas = Produk::find($id);
        $berkas->status = $status;
        $berkas->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
}
