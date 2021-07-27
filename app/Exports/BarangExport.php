<!-- <!-- <?php

// namespace App\Exports;

// use App\Barang;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithMapping;
// use Maatwebsite\Excel\Concerns\WithHeadings;

// class LaporanExport implements FromCollection, WithMapping, WithHeadings 
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Barang::all();
//     }

//     public function map($barang):array
//     {
//         return [
//             //data yang dari kolom tabel database yang akan diambil
//             $barang->kd_barang,
//             $barang->nama_barang,
//             $barang->kd_merek,
//             $barang->kd_distributor,
//             $barang->tanggal_masuk,
//             $transaksi->harga_barang,
//             $transaksi->stok_barang,
//             $transaksi->keterangan,
//         ];
//     }

//     public function headings():array
//     {
//         return [
//             //pastikan urut dan jumlahnya sesuai dengan yang ada di mapping-data atau table di database
//             'ID',
//             'Nama_barang',
//             'kd_merek',
//             'kd_distributor',
//             'Tanggal_masuk',
//             'Harga_masuk',
//             'Stok_barang',
        //     'Keterangan',
//         // ];
//     } -->
// } -->
