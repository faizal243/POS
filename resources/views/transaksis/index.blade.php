@extends('layouts.dashboard2',['level' => 'kasir'])
 
@section('content')
                                <br>
                                <br>
                                    <div class="row">
                                        <div class="col-lg-12 margin-tb">
                                            <div class="pull-left">
                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                    <h3>Transaksi</h3>
                                                </div>
                                            </div>

                                            @if ($level == 'meneger')
                                                    <a class="btn btn-primary" href="{{ route('exportlaporan')}}" target="_blank">
                                                    <!-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                                                        <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                        <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                    </svg> -->
                                                    Excel
                                                    </a>
                                                    @endif
                                            
                                            @if ($level != 'meneger')
                                            <div class="pull-right">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                                </svg>
                                                            </button>
                                            @endif
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form action="{{ route('transaksis.store') }}" method="POST">
                                    @csrf

                                    
                                
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                               
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <!-- <input type="integer" name="kd_barang" class="form-control" placeholder="ID_barang"> -->
                                                <input type="hidden" value="{{$check->kd_transaksi}}" name="kd_transaksi" class="from-control" placeholder="KD_transaksi" >
                                            </div>
                                        </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>KD_barang:</strong>
                                                    <!-- <input type="integer" name="kd_barang" class="form-control" placeholder="KD_barang"> -->
                                                     <select name="kd_barang" class="from-control" id="kd_barang" >
                                                        @foreach($barangs as $barang)
                                                            <option value="{{$barang->kd_barang}}">{{$barang->nama_barang}} <small>(stok:{{$barang->stok_barang}})</small></option>
                                                        @endforeach
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="kd_user" value="{{$level->id}}" class="form-control" placeholder="KD_user">
                                                    </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>QYT:</strong>
                                                        <input type="number" name="qyt" class="form-control" placeholder="QYT">
                                                    </div>
                                            </div>
                                            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>Harga:</strong>
                                                        <input type="integer" name="harga" class="form-control" placeholder="Harga">
                                                    </div>
                                            </div> -->
                                            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Tanggal_beli:</strong>
                                                        <input type="date" name="tanggal_beli" class="form-control" placeholder="tanggal_beli">
                                                </div>
                                             </div> -->
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                    </div>
                            </form>
                                                    </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.5 8.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z"/>
                                                                </svg>
                                                            </button>
                                                            @if(Session::get('stok_barang kurang'))
                                                            <div class="alert alert-success">
                                                                 {{ $Session::get('stok_kurang') }}
                                                            </div>
                                                                <script>
                                                                     $(function(){  
                                                                         $('#bayarModalCenter').modal('show');
                                                                        });
                                                                </script>
                                                            @endif
   
                                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    
    <table  id="table_id" class="display">
    <thead class="thead-dark">
        <tr>
            <th>Nama barang</th>
            <th>Jumlah Barang Beli</th>
            <th>Harga satuan</th>
            <th>total</th>
            <!-- <th>Tanggal_Beli</th> -->
          
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($detailtransaksis as $transaksi)
        <tr>
            <td>{{ $transaksi->nama_barang}}</td>
            <td>{{ $transaksi->qyt }}</td>
            <td>{{ $transaksi->harga / $transaksi->qyt}}</td>
            <td>{{ $transaksi->harga }}</td>
            <td>
                <form action="{{ route('transaksis.destroy',$transaksi->kd_detail_transaksi) }}" method="POST">
   
                    <!-- <a class="btn btn-primary" href="/print" target="_blank">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                        <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                        <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                    </svg>
                    </a> -->
                  

                    @if ($level != 'meneger')
                    <a class="btn btn-info" href="{{ route('transaksis.show',$transaksi->kd_transaksi) }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 1h12a1 1 0 0 1 1 1v11.586l-2-2A2 2 0 0 0 11.586 11H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                        </svg>
                    </a>
    
                    <a class="btn btn-primary" href="{{ route('transaksis.edit',$transaksi->kd_transaksi) }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hammer" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.812 1.952a.5.5 0 0 1-.312.89c-1.671 0-2.852.596-3.616 1.185L4.857 5.073V6.21a.5.5 0 0 1-.146.354L3.425 7.853a.5.5 0 0 1-.708 0L.146 5.274a.5.5 0 0 1 0-.706l1.286-1.29a.5.5 0 0 1 .354-.146H2.84C4.505 1.228 6.216.862 7.557 1.04a5.009 5.009 0 0 1 2.077.782l.178.129z"/>
                            <path fill-rule="evenodd" d="M6.012 3.5a.5.5 0 0 1 .359.165l9.146 8.646A.5.5 0 0 1 15.5 13L14 14.5a.5.5 0 0 1-.756-.056L4.598 5.297a.5.5 0 0 1 .048-.65l1-1a.5.5 0 0 1 .366-.147z"/>
                        </svg>
                    </a>


                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                        </svg>
                    </button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

    <button class="btn btn-primary" data-toggle="modal" data-target="#bayarModalCenter">bayar</button>
@endsection

@if ($level != 'meneger')

@section('footer')
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endsection

@endif


                        <div class="modal fade" id="bayarModalCenter">        
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bayarModalCenterTitle">Pembayaran</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <i class="anticon anticon-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body-body">    
                                    <form action="{{ url('bayar/'. $check->kd_transaksi )}}" method="post">
                                        @csrf
                                        @method('put')
                                        @foreach ($detailtransaksis as $transaksi)
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for=""><b>{{$transaksi->nama_barang}}</b></label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">{{$transaksi->qyt}}</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">{{$transaksi->harga}}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div><hr>
                                        <div class="modal-body-total">
                                        <div class="row">
                                                <div class="col-md-5">
                                                    <label for=""><b></b></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for=""><b>TOTAL : </b></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for=""><b>RP.</b>{{$hargatotal}}</label>
                                                    <input type="hidden" name="total" value="{{$hargatotal}}">
                                                </div>
                                            </div>
                                        </div><hr>
                                        <div class="modal-body-footer">
                                            <div class="form-group">
                                                <input type="number" name="uang" id="money" class="form-control" placeholder="masukan jumalh uang" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a name="" id="" class="btn btn-default" href="{{ route('transaksis.index') }}" role="button">Kembali</a>
                                        <button type="submit" id="pay_button" class="btn btn-success">Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>