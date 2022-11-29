<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Posting;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh isi tabel posting
        $data = Posting::all();
        $kategori = Kategori::all();
        return view('posting', compact('data', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //menampilkan postingan ke beranda
        $data = Posting::where('status', '=', 'tampil')->paginate(5);
        $kategori = Kategori::all();
        return view('home', compact('data', 'kategori'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menyimpan data ke tabel posting
        Posting::create($request->all());
        return redirect('posting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function show(Posting $posting)
    {
        //menampilkan salah satu data dari tabel posting
        $kategori = Kategori::all();
        $produk = Produk::select('*')->where('kategori_id', '=', $posting->kategori_id)->where('status', '=', 'tampil')->get();
        return view('detail', compact('posting', 'kategori', 'produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function edit(Posting $posting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posting $posting)
    {
        //mengupdate salah satu data dalam tabel posting
        $posting->update($request->all());
        return redirect('posting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posting $posting)
    {
        //menghapus salah satu data dalam tabel posting
        $posting->delete();
        return redirect('posting');
    }

    public function akses(Posting $posting)
    {
        //mengatur pengelolaan data dalam tabel posting
        if ($posting->status == 'tampil') {
            $posting->update([
                'status' => 'tidak',
            ]);
        }else {
            $posting->update([
                'status' => 'tampil',
            ]);
        }
        return redirect('posting');
    }
}
