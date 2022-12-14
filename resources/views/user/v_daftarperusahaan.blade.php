<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layouts.v_templateregister')
@section('content1') 
<br>
<br> 
<div class="container">
<h2>DAFTAR PERUSAHAAN</h2>
    <div class="search-bar px-2">
      <div class="container">
        <div class="card search-card">
          <label><i class="fas fa-search"></i>Cari Perusahaan<br /></label>
          <div class="mb-3 text-center">
            {{-- <input id="inputSearch" type="" name=""  class="form-control"> --}}
            <input onkeyup="cariPerusahaan()" id="inputSearch" type="search" name="inputSearch"  class="form-control">
          </div>
        </div>
      </div>
    </div>
            <div id="tableperusahaan" class="col-sm-12">     

            </div> 
                
          
          
                </div>
         
            {{-- <div class="col-sm-12">
                <div id="searchResult" class="row">
              </div>
            </div> --}}
          
          {{-- <table style="width: 100%;margin-left:auto;margin-right:auto">
            <tr>
              <td style="width: 40%"></td>
              <td> {{ $perusahaan->links('vendor.pagination.bootstrap-4') }}</td>
              <td style="width: 40%"></td>
            </tr>
          </table> --}}
@endsection

<script>
   $(document).ready(function() {
        tableperusahaan()
    });

    function tableperusahaan() {
            $.get("{{ url('perusahaan/table') }}", {}, function(data, status) {
                $("#tableperusahaan").html(data);
            });
        }
  function cariPerusahaan() {
            var inputSearch = $("#inputSearch").val();
            if (inputSearch == "") {
              tableperusahaan()
            }
            else{
              $.ajax({
                type: "get",
                url: "{{ url('search') }}",
                data: {
                "inputSearch": inputSearch,
                },
            success: function(data, status) {
                $("#tableperusahaan").html(data);
                }
            });
            }
          
        }
</script>

<script type="text/javascript">

    
    function readHitung(id) {
        $.get("{{ url('perusahaan/readHitung') }}/" +id, {}, function(data) {
           $("#lowongan").html(data);  

        });
    }
</script>

