@extends('layouts.dashboard')
   
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit barang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('barangs.index') }}">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.5 8.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z"/>
                    </svg>
                </a>
            </div>
        </div>    
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('barangs.update',$barang->kd_barang) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID:</strong>
                    <input type="integer" name="kd_barang" value="{{ $barang->kd_barang }}" class="form-control" placeholder="kd_barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama_barang:</strong>
                    <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" placeholder="Nama_barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID_merek:</strong>
                    <!-- <input type="integer" name="id_merek" value="{{ $barang->id_merek }}" class="form-control" placeholder="ID_merek"> -->
                    <select name="kd_merek" class="from-control" id="kd_merek" >
                     @foreach($mereks as $merek)
                    <option value="{{$merek->kd_merek}}">{{$merek->kd_merek}}</option>
                     @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID_distributor:</strong>
                    <!-- <input type="integer" name="id_distributor" value="{{ $barang->id_distributor }}" class="form-control" placeholder="ID_distributor"> -->
                    <select name="kd_distributor" class="from-control" id="kd_distributor" >
                    @foreach($distributors as $distributor)
                    <option value="{{$distributor->kd_distributor}}">{{$distributor->kd_distributor}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal_masuk:</strong>
                    <input type="date" name="tanggal_masuk" value="{{ $barang->tanggal_masuk }}" class="form-control" placeholder="Tanggal_masuk">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga_barang:</strong>
                    <input type="text" name="harga_barang" value="{{ $barang->harga_barang }}" class="form-control" placeholder="Harga_barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stok_barang:</strong>
                    <input type="text" name="stok_barang" value="{{ $barang->stok_barang }}" class="form-control" placeholder="Stok_barang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    <textarea class="form-control" style="height:110px" name="keterangan" placeholder="Ketarangan">{{ $barang->keterangan }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary"> 
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                </button>
            </div>
        </div>
   
    </form>
@endsection