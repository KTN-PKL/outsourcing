@extends('layouts.v_template')
@section('content')

<style>
    #upload {
    opacity: 0;
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

.image-area {
    border: 2px dashed rgba(255, 255, 255, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}
</style>


{{-- <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row py-4">
                            <div class="col-lg-6 mx-auto">
                    
                                <!-- Upload image input-->
                                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                    <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                                    <div class="input-group-append">
                                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                    </div>
                                </div>
                    
                                <!-- Uploaded image area-->
                                <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                    
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Buat Lowongan</h5>
  </div>
  <form method="POST" action="{{ route('register') }}">
      @csrf
    <div class="modal-body">
      <div id="alert"></div>
      <div class="mb-3">
        <label class="form-label">Posisis</label>
        <input type="text" class="form-control" name="posisi" placeholder="Posisis ...">
      </div>
      <div class="row mb-3">                       
        <label class="form-label">Jobdesk</label>
        <div class="col-md-16">
         <textarea name="jobdesk" class="my-editor form-control" id="my-editor1" cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="row mb-3">                       
        <label class="form-label">Kualifikasi</label>
        <div class="col-md-16">
         <textarea name="kualifikasi" class="my-editor form-control" id="my-editor" cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Skill</label>
        <input type="test" class="form-control" name="skill" placeholder="Skill ...">
    </div>
    {{-- <div class="mb-3">
        <label class="form-label">Website Perusahaan</label>
        <input type="test" class="form-control" name="website" placeholder="Website Perusahaan ...">
    </div>
    <div class="row mb-3">                       
        <label class="form-label">Deskripsi Perusahaan</label>
        <div class="col-md-16">
         <textarea name="detail" class="my-editor form-control" id="my-editor" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="mb-3">
            <!-- Upload image input-->
            <label class="form-label">Logo</label>
                <input type="file" onchange="readURL(this);" class="form-control"  name="logo" placeholder="Logo ...">
            <!-- Uploaded image area-->
            <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

       
    </div> --}}
    </div>
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
      <div id="tombol_login">
        <input class="btn btn-primary" type="submit" value="Buat">
      </div>
    </div>
  </form>
</div>
    </div>
</div>
</div>
    <!-- For demo purpose -->
    

    

<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

</script>
    
@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
    CKEDITOR.replace('my-editor1');
    </script>
@endpush