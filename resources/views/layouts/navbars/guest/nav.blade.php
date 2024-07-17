@php
use App\Models\Logo; 
@endphp
<!-- Navbar -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 {{ (Request::is('static-sign-up') ? 'w-100 shadow-none  navbar-transparent mt-4' : 'blur blur-rounded shadow py-2 start-0 end-0 mx4') }}">
  <div class="container-fluid {{ (Request::is('static-sign-up') ? 'container' : 'container-fluid') }}">
    <a class="navbar-brand font-weight-bolder ms-0 {{ (Request::is('static-sign-up') ? 'text-white' : '') }}" href="{{ url('dashboard') }}">
      @foreach(Logo::get() as $logo)
      <img style="width: 50px; height: 50px; border-radius: 50px;" class="me-2" src="{{ asset('storage/logo/'.$logo->logo) }}" class="ms-4" alt="...">
      @endforeach
      Sogod Legislative MS
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
    
          <a class="nav-link me-2 text-dark" href="{{ auth()->user() ? url('static-sign-in') : url('login') }}">
            <i class="fas fa-key opacity-6 me-1"></i>
            Sign In
          </a>
          <a class="nav-link me-2 text-dark" href="{{ auth()->user() ? url('/') : url('/') }}">
            <i class="fas fa-globe-asia opacity-6 me-1"></i>
            Public
          </a>

          <li class="nav-item px-3 d-flex align-items-center">
              <a href="#" class="nav-link p-0 fixed-plugin-button-nav text-dark">
              <i class="fas fa-user-friends fixed-plugin-button-nav cursor-pointer opacity-6 me-1"></i>
               Officials
              </a>
          </li>
        
    </div>
  </div>
</nav>
<!-- End Navbar -->
