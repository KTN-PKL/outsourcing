<div class="modal fade" id="masuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form method="POST" action="{{ route('login.check') }}">
                @csrf
          <div class="modal-body">
            <div style="display: none" class="alert alert-danger alert-block" id="alert">
              <button type="button" class="close" data-dismiss="alert">x</button>
                  Email atau Password salah
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control @error('email1') is-invalid @enderror" name="email1" value="{{old('email1')}}">
              @error('email1')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control @error('password1') is-invalid @enderror" name="password1" value="{{old('password1')}}">
              @error('password1')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
          </div>
          <div class="modal-footer">
            <h6>Tidak Punya Akun? <a href="#" data-bs-toggle="modal" data-bs-target="#pilihRegister" data-bs-dismiss="modal">Daftar</a>
            </h6>
            <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <div id="tombol_login">
              <input class="btn btn-primary" type="submit" value="Masuk">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  

{{-- @section('scripts')
@parent --}}

@if($errors->has('email1') || $errors->has('password1'))
    <script>
    $(function() {
        $('#masuk').modal('show');
    });
    </script>
    @elseif(session()->has('error'))
    <script>
      $(function() {
          $('#masuk').modal('show');
          document.getElementById('alert').style.display="block";
      });
      </script>
@endif
{{-- @endsection --}}
