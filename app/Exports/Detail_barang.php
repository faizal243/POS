<?php

namespace App\Exports;

use App\Detailtransaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithMapping, WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::all();
    }

    public function map($transaksi):array
    {
        return [
            //data yang dari kolom tabel database yang akan diambil
            $transaksi->kd_transaksi,
            $transaksi->kd_barang,
            $transaksi->kd_user,
            $transaksi->jumlah_beli,
            $transaksi->total_harga,
            $transaksi->tanggal_beli,
        ];
    }

    public function headings():array
    {
        return [
            //pastikan urut dan jumlahnya sesuai dengan yang ada di mapping-data atau table di database
            'ID',
            'ID_barang',
            'ID_user',
            'Jumlah_beli',
            'Total_harga',
            'Tanggal_beli',
        ];
    }
}
