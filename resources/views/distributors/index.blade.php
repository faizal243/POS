@extends('layouts.dashboard2',['level' => 'admin'])
 
@section('content')
<br>
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <h3>Distributor</h3>
                </div>
            </div>
            <div class="pull-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg>
                            </button>

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
                    <form action="{{ route('distributors.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                <input type="text" name="kd_distributor" class="form-control" placeholder="ID">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama_distributor:</strong>
                <input type="text" name="nama_distributor" class="form-control" placeholder="Nama_distributor">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <textarea class="form-control" style="height:110px" name="alamat" placeholder="Alamat"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No_telepon:</strong>
                <input type="text" name="no_telepon" class="form-control" placeholder="No_telepon">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                    </div>
                </div>
                </div>
        </div>
    </div>

   
    <!-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif -->
   
    <table class="table table-bordered" id="table_id" class="display">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nama_distributor </th>
            <th>Alamat</th>
            <th>No_telepon
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($distributors as $distributor)
        <tr>
            <td>{{ $distributor->kd_distributor }}</td>
            <td>{{ $distributor->nama_distributor }}</td>
            <td>{{ $distributor->alamat}}</td>
            <td>{{ $distributor->no_telepon}}</td>
            <td>
                <form action="{{ route('distributors.destroy',$distributor->kd_distributor) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('distributors.show',$distributor->kd_distributor) }}">
                        Show
                    </a>
    
                    <a class="btn btn-primary" href="{{ route('distributors.edit',$distributor->kd_distributor) }}">
                       Edit
                    </a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"> 
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        
    </table>
  
    {!! $distributors->links() !!}
    
      
@endsection

@section('footer')
<!-- <script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script> -->
@endsection