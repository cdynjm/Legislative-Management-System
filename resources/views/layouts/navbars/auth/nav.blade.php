@php
use App\Models\Logo; 
@endphp
<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar"> 
            
            
            <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <a href="{{ url('/logout')}}" class="nav-link text-body font-weight-bold px-0">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    @if(Auth::user()->type == 1)
                        <span class="d-sm-inline me-2">{{ Auth::user()->name }}</span>
                        @foreach(Logo::get() as $logo)
                        <img style="width: 30px; height: 30px; border-radius: 50px;" class="me-2" src="{{ asset('storage/logo/'.$logo->logo) }}" class="ms-4" alt="...">
                        @endforeach
                        <div class="text-xs text-end me-5">Administrator</div>
                    @endif
                    @if(Auth::user()->type == 0)
                        <span class="d-sm-inline me-2">{{ Auth::user()->Members->name }}</span>
                        <img style="width: 30px; height: 30px; border-radius: 50px;" class="me-2" src="{{ asset('storage/photo/'.Auth::user()->Members->photo) }}" class="ms-4" alt="...">
                        <div class="text-xs text-end me-5">
                        @if(Auth::user()->Members->position == 1)
                            Mayor
                        @endif
                        @if(Auth::user()->Members->position == 2)
                            Vice Mayor
                        @endif
                        @if(Auth::user()->Members->position == 3)
                            SB Member
                        @endif
                        </div>
                    @endif
                </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="#" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
                </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
                <a href="#" class="nav-link text-body p-0">
                <i class="fas fa-user-friends fixed-plugin-button-nav cursor-pointer"></i>
                </a>
            </li>
            
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->