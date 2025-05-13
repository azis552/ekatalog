<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Transaksi::orderBy("created_at","desc")->where('instansi_id',auth()->user()->id)->paginate(10);
        return view("admin.pemesanan.index",compact("datas"));
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
        dd($request->all());
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

    public function addToCart(Request $request)
    {
        // Contoh penambahan ke keranjang (sesuaikan dengan logikamu)
        $productId = $request->product_id;
        $quantity = $request->quantity;

        $transaksi = TransaksiDetail::where("produk_id", $productId)->where("user_id", auth()->user()->id)->first();

        if ($transaksi) {
            $transaksi->jumlah += $quantity;
            $transaksi->save();
        } else {
            TransaksiDetail::create([
                'produk_id' => $productId,
                'jumlah' => $quantity,
                'user_id' => auth()->user()->id,
            ]);
        }

        return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang!']);
    }

    public function getCartCount()
    {
        $transaksi = TransaksiDetail::where('user_id', auth()->user()->id)->where('transaksi_id', null)->get();
        $totalItems = 0;
        foreach ($transaksi as $item) {
            $totalItems += $item->jumlah;
        }
        // Hitung total item dalam keranjang
        // $totalItems = $transaksi->sum('jumlah'); 
        // Atau jika menggunakan Eloquent Collection
        // $totalItems = $transaksi->count();
        // Menghitung total item dalam keranjang
        // $totalItems = $transaksi->sum('jumlah');
        // Mengembalikan jumlah total item dalam keranjang sebagai respons JSON
        // return response()->json(['count' => $totalItems]);

        return response()->json(['count' => $totalItems]);
    }

    public function showCart()
    {
        $transaksis = DB::table('transaksi_details')
            ->join('produks', 'transaksi_details.produk_id', '=', 'produks.id')
            ->where('transaksi_details.user_id', auth()->user()->id)
            ->select(
                'transaksi_details.id',
                'transaksi_details.jumlah',
                'transaksi_details.harga',
                'transaksi_details.total',
                'produks.name',
                'produks.harga',
                'produks.foto as foto',
            )
            ->get();
        return view('landing.keranjang', compact('transaksis'));
    }

    public function checkout()
    {
        $transaksiDetail = TransaksiDetail::where('user_id', auth()->user()->id)->where('transaksi_id', null)->get();
        if ($transaksiDetail->isEmpty()) {
            return redirect()->route('landing')->with('error', 'Keranjang kosong!');
        }

        foreach ($transaksiDetail as $item) {
            $transaksi = Transaksi::create([
                'instansi_id' => auth()->user()->id,
                'tanggal' => now(),
                'status' => 'pending',
                'total' => $item->total,
            ]);

            $produk = Produk::find($item->produk_id);

            $item->transaksi_id = $transaksi->id;
            $item->harga = $produk->harga;
            $item->total = $produk->harga * $item->jumlah;
            $item->save();
        }
        return redirect()->route('landing')->with('success', 'Transaksi berhasil dilakukan!');
    }
}
