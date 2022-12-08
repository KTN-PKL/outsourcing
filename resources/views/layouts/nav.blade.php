<div class="container-fluid">
    <a class="navbar-brand" href="#"><h4>PORTAL KERJA</h4></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">LOWONGAN KERJA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/daftarPerusahaan')}}">PERUSAHAAN</a>
        </li>
      </ul>
    </ul>
      @guest
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link px-2" href="#" data-bs-toggle="modal" data-bs-target="#pilihRegister">DAFTAR</a>
        </li>
         <li class="nav-item">
          <a class="nav-link px-2"  data-bs-toggle="modal" data-bs-target="#masuk">MASUK</a>
        </li>
        

      </ul>
    

      @endguest
       @auth
      <ul class="navbar-nav ms-8">
        <li class="nav-item">
            <div class="icon-demo d-flex align-items-center justify-content-center p-3 py-6">
              <i class="fa fa-bell"> <a href="{{url('/lamaranSaya')}}"> <sup id="jumlah" class="badge badge-warning"></sup></a></i>
            </div>
        </li>
        <li class="nav-item">
          <div id="navbar">
           
          </div>
      </li>
        
        <li  class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{url('/')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         {{Auth::user()->name}}
          </a>
       
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a href="{{url('/profil')}}" class="dropdown-item fa fa-user"> Profil Saya</a>
            <a href="{{url('/lamaranSaya')}}" class="dropdown-item fa fa-file"> Lamaran Saya</a>

              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                 <i class="fa fa-sign-out"></i>{{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>
      
    </ul>
    @endauth
    </div>
  </div>