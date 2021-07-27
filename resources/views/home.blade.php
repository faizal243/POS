<!-- @extends('layouts.dashboard2') -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif  @if (Auth::user()->level == 1)
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('distributors.index')}}">Distributor</a>
                        <a class="nav-link" href="{{route('mereks.index')}}">Merek</a>
                        <a class="nav-link" href="{{route('barangs.index')}}">Barang</a>
                      </li>
                      <!-- <li class="nav-item">
                          {{-- <a class="nav-link" href="file">Upload File</a> --}}
                        </li> -->
                      <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
              
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>
                    </ul>
                  @elseif (Auth::user()->level == 2)
                  <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                      </li>
                      <li class="nav-item">
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('transaksis.index')}}">Transaksi</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
              
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>
                    </ul>
                    @elseif (Auth::user()->id_level == 3)
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="details">Detail Transaksi</a>
                        
                        
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
              
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>
                    </ul>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
