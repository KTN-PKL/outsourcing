<label for="kota">Kota/Kabupaten</label>
<select name="kota" type="text" class="form-select @error('kota') is-invalid @enderror" value="{{ old('kota') }}" placeholder="kota" aria-label="kota">
  <option selected disabled> Pilih Kota/Kabupaten</option>
  @foreach($Regency as $regencies)
  <option value="{{$regencies->name}}">{{$regencies->name}}</option>
  @endforeach
</select>
  @error('kota')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror