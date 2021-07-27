<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
  <h5>Report transaksi<h4>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>ID_barang</th>
            <th>ID_user</th>
            <th>Jumlah_beli</th>
            <th>Total_harga</th>
            <th>Tanggal_beli</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        @foreach ($transaksis as $transaksi)
        <tbody>
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $transaksi->kd_barang }}</td>
            <td>{{ $transaksi->kd_user}}</td>
            <td>{{ $transaksi->jumlah_beli}}</td>
            <td>{{ $transaksi->total_harga}}</td>
            <td>{{ $transaksi->tanggal_beli}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</center>
</body>
<script>
    window.print();
</script>
</html>