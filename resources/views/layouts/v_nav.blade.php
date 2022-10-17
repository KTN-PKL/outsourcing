<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
          
      {{-- @if(auth()->user()->is_admin==0) --}}
      <li class="nav-item">
        <a href="{{url('home')}}" class="nav-link {{request()->is('beranda')? 'active':''}}">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>


      {{-- Navbar Admin --}}
      {{-- @if(auth()->user()->is_admin==1) --}}
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>Lowongan Kerja</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>Form Lamaran</p>
        </a>
      </li>
      
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Input Link Wawancara</p>
        </a>
      </li>

      {{-- @endif --}}
      <li class="nav-item"></li>
      <div style="height: 50vh">  </div>
      <li class="nav-item">
        <form action="/logout" method="POST">
          @csrf
          <button class="btn btn-danger" type="submit">Logout</button>
        </form>
      </li>


    
    
     