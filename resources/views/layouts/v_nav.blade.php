<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
          
      {{-- @if(auth()->user()->is_admin==0) --}}
      


      {{-- Navbar Admin --}}
      @if(auth()->user()->level==1)
      <li class="nav-item">
        <a href="{{route ('admin.dashboard')}}" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.perusahaan') }}" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>Daftar Perusahaan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.lowongan')}}" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>Daftar Lowongan</p>
        </a>
      </li>

      @endif
      @if(auth()->user()->level==2)
      <li class="nav-item">
        <a href="{{route('perusahaan.dashboard')}}" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <div id="read"></div>
      
     @endif
      <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@auth
<script>
   $(document).ready(function() {
         read()
     });

     function read() {
         $.get("{{ url('perusahaan/read') }}", {}, function(data, status) {
          if (data == 1) {
            $("#read").html(`<li class="nav-item">
        <a href="{{url('/perusahaan/pelamar')}}" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>Daftar Pelamar</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('perusahaan/lowongan')}}" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>Daftar Lowongan</p>
        </a>
      </li>
      
      <li class="nav-item">
        <a href="{{ route('wawancara.index') }}" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Daftar Wawancara</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('perusahaan.lamaran.datalulus') }}" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>Daftar Pelamar diterima</p>
        </a>
      </li>`);  
          }
         });
     }
</script>
      @endif


     


    
    
     