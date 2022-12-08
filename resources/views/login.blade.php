<div class="modal fade" id="masuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
          <div class="modal-body">
            <div id="alert"></div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}">
              @error('password')
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
              <input class="btn btn-primary" type="submit">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  

@section('scripts')
@parent

@if($errors->has('email') || $errors->has('password'))
    <script>
    $(function() {
        $('#masuk').modal('show');
    });
    </script>
@endif
@endsection
