<?php

namespace App\Http\Controllers;

use App\Detailtransaksi;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailtransaksiController extends Controller
{
    public function index(){
        
        $detail_transaksis = Detailtransaksi::latest()->paginate(5);
  
        return view('detai_transaksis.index',compact('detail_transaksis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    public function Detail_barang()
    {
        
        return Excel::download(new Detail_barang,'transaksis.xlsx');
    
    } 
    
}
