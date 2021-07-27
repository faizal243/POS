<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Barang;
use App\DTView;
use App\DetailTransaksi;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $check = Transaksi::where('total_bayar', '=', '0')->first();

        if ($check == null) {
            Transaksi::create([
            'total_bayar' => 0,
            'total_harga' => 0,
            'total_barang' => 0,
            'kembalian' => 0,
            'tanggal_beli' => Carbon::now()
    ]);

    $check = Transaksi::where('total_bayar', '=', '0')->first();

}
// dd($check);
        $detailtransaksis = DTView::where('kd_transaksi', $check->kd_transaksi)->get();
        
        $hargatotal = DTView::where('kd_transaksi', $check->kd_transaksi)->sum('harga');
        // $transaksis = DetailTransaksi::latest()->paginate(5);
        $level = Auth::user();
        $barangs = Barang::all();
  
        return view('transaksis.index',compact('level','barangs','check', 'hargatotal', 'detailtransaksis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksis.create',compact('barangs',$barangs,));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang_price = Barang::where('kd_barang', $request->kd_barang)->first();

        if($request->qyt > $barang_price->stok_barang OR $request->qyt <=0){
            return redirect('/transaksis')->with(['stok_barang'=>'stok barang tidak Sesuai']);
        }
        elseif($request->qty < 0){
            return redirect('/transaksis')->with(['stok_barang'=>'stok barang minimal 1']);
        }
        else{
            $Detail = DetailTransaksi::create([
                // 'kd_detail_transaksi' => $request->kd_detail_transaksi,
                'kd_transaksi' => $request->kd_transaksi,
                'kd_barang' => $request->kd_barang,
                'kd_user' => $request->kd_user,
                'qyt' => $request->qyt,
                'harga'=> $request->qyt * $barang_price->harga_barang,
            ]);
            
                $a = Barang::where('kd_barang', $request->kd_barang)->first();
                $a->update([
                    'stok_barang' => $barang_price->stok_barang - $request->qyt,
                ]);

                return redirect()->route('transaksis.index')->with(['success'=> 'Barang Masuk Keranjang']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show',compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $level = Auth::user()->level;
        $barangs = Barang::all();
        return view('transaksis.edit',compact('transaksi','level','barangs',$barangs));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'total_barang' => 'required',
            'total_harga' => 'required',
            'total_bayar' => 'required',
            'kembalian' => 'required',
            'tanggal_beli' => 'required',
        ]);
  
        $transaksi->update($request->all());
  
        return redirect()->route('transaksis.index')
                        ->with('success','Transaksis updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailTransaksi $transaksi)
    {
        $transaksi->delete();
  
        return redirect()->route('transaksis.index')
                        ->with('success','Transaksi deleted successfully');
    }

    public function print(Transaksi $transaksi)
    {
        $transaksis = Transaksi::all();
        return view('transaksis.print', compact('transaksis'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function laporanexport()
    {
        
        return Excel::download(new LaporanExport,'transaksis.xlsx');
    
    } public function bayar(Request $request, $id)
    {
        $a = Transaksi::find($id);
        $a->update([
            'total_harga' => $request->total,
            'total_bayar' => $request->uang,
            'kembalian' => $request->uang - $request->total,
            'tanggal_beli' => Carbon::now(),
        ]);

        $c = $request->uang - $request->total;

        return redirect('/transaksis')->with('success', 'Kembalian :'. $c);
    }
}
