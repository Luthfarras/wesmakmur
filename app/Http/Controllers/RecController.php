<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rekom');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //mengambil isi dari request dan menampilkannya kembali
        $keluhan = $request->keluhan;
        $dt = new Saran($request->keluhan, $request->tahun);
        $data = [
            'nama' => $dt->namaJamu(),
            'keluhan' => $keluhan,
            'khasiat' => $dt->khasiat(),
            'umur' => $dt->umur(),
            'saran' => $dt->sarank(),
            'saran2' => $dt->saranp(),
        ];
        return view('rekom', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class Jamu {
    public function __construct($keluhan, $tahun)
    {
        //mendeklarasikan parameter
        $this->keluhan = $keluhan;
        $this->tahunLahir = $tahun;
    }
    public function namaJamu()
    {
        //menentukan jamu apa yang cocok dengan keluhan
        if ($this->keluhan == 'keseleo dan kurang nafsu makan') {
            return "Beras Kencur";
        }elseif ($this->keluhan == 'pegal-pegal') {
            return "Kunyit Asam";
        }elseif ($this->keluhan == 'darah tinggi dan gula darah') {
            return "Brotowali";
        }elseif ($this->keluhan == 'kram perut dan masuk angin') {
            return "Temulawak";
        }else {
            return "Isi data.";
        }
    }
    public function khasiat()
    {
        //menentukan khasiat berdasarkan keluhan
        if ($this->namaJamu() == 'Beras Kencur') {
            return "Meredakan keseleo dan menambah nafsu makan.";
        }elseif ($this->namaJamu() == 'Kunyit Asam') {
            return "Meredakan pegal-pegal.";
        }elseif ($this->namaJamu() == 'Brotowali') {
            return "Menurunkan kadar gula darah.";
        }elseif ($this->namaJamu() == 'Temulawak') {
            return "Meredakan kram perut.";
        }else {
            return "Isi data.";
        }
    }
    public function umur()
    {
        //menghitung umur berdasarkan tahun
        return date("Y") - $this->tahunLahir;
    }
}

class Saran extends Jamu {
    public function sarank()
    {
        //menentukan saran pengkonsumsian sesuai umur
        if ($this->umur() <= 10) {
            return "Dikonsumsi 1x";
        }else {
            return "Dikonsumsi 2x";
        }
    }
    public function saranp()
    {
        //menentukan cara pemakaian berdasarkan jamu
        if ($this->namaJamu() == 'Beras Kencur') {
            return "Dioleskan";
        }else {
            return "Dikonsumsi";
        }
    }
}