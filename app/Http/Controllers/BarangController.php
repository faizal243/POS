<?php

namespace App\Http\Controllers;

use App\Barang;
// use App\Exports\BarangExport;
// use Maatwebsite\Excel\Facades\Excel;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Distributor;
use App\Merek;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::latest()->paginate(5);
        $mereks = Merek::all();
        $distributors = Distributor::all();
        return view('barangs.index',compact('barangs','mereks','distributors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mereks = Merek::all();
        $distributors = Distributor::all();
        return view('barangs.create',compact('mereks',$mereks,'distributors',$distributors));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kd_merek' => 'required',
            'kd_distributor' => 'required',
            'tanggal_masuk' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'keterangan' => 'required',
        ]);
  
        Barang::create($request->all());
   
        return redirect()->route('barangs.index')
                        ->with('success','Barang created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('barangs.show',compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $level = Auth::user()->level;
        $mereks = Merek::all();
        $distributors = Distributor::all();
        return view('barangs.edit',compact('barang', 'level','mereks',$mereks,'distributors',$distributors));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kd_merek' => 'required',
            'kd_distributor' => 'required',
            'tanggal_masuk' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'keterangan' => 'required',
        ]);
  
        $barang->update($request->all());
  
        return redirect()->route('barangs.index')
                        ->with('success','Barangs updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang, $id)
    {
        $a = Barang::where('kd_barang', $id);
        $a->delete();
  
        return redirect()->route('barangs.index')
                        ->with('success','Barang deleted successfully');
    }

    // public function barangexport()
    // {
        
    //     return Excel::download(new BarangExport,'barangs.xlsx');
    
    // }
}
