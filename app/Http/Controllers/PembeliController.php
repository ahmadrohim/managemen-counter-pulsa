<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;


class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = request('page') ? request('page') : 1;
        return view('pembeli.index',[
            'tajuk_konten' => 'Data Pembeli',
            'pembeli' => Pembeli::latest()->filter(request(['search']))->paginate(20)->withQueryString(),
            'page' => $page,
            'active' => 'data-pembeli',
            'url' => 'pembeli'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required',
            'tanggal_beli' => 'required',
            'jumlah_beli' => 'required'
        ],[
            'nama.required' => 'Kolom nama pembeli tidak boleh kosong!',
            'no_telepon.required' => 'Kolom no telepon tidak boleh kosong!',
            'tanggal_beli.required' => 'Kolom tanggal beli tidak boleh kosong!',
            'jumlah_beli.required' => 'Kolom jumlah beli tidak boleh kosong!'
        ]);

        $validate['user_id'] = 1;
        $validate['pulsa_id'] = 3;
        $validate['kode_pembeli'] = substr(str_shuffle('abcderfghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'),0,20);

        Pembeli::create($validate);
        return redirect('/pembeli')->with('success', 'Data pembeli berhasil disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function show(Pembeli $pembeli)
    {
        return view('pembeli.detail',[
            'tajuk_konten' => 'Detail pembelian',
            'pembeli' => $pembeli,
            'active' => 'data-pembeli' 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembeli $pembeli)
    {
        return view('pembeli.edit',[
            'tajuk_konten' => 'Form Edit Data Pembeli',
            'pembeli' => $pembeli,
            'active' => 'data-pembeli'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        $pembeli = Pembeli::find($pembeli->id);
        $pembeli->update($request->all());

        return redirect('/pembeli')->with('success', 'Data pembeli berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembeli $pembeli)
    {
        $pembeli->delete();
        return redirect('/pembeli')->with('success', 'Data pembeli berhasil dihapus');
    }
}
