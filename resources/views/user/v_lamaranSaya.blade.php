@extends('layouts.v_templateregister')
<style>
</style>     
<br>
<br>
<br> 
<section class="content1">
      

  
    
        <style> .container { width: 500px; padding: 0 0 5px 0; margin: 3px 0 10px 0; background: rgb(0, 0, 0); } #nav { margin: 0; padding: 0; border-top: 3px solid #000000; } #nav li { margin: 0; padding: 0; display: inline; list-style-type: none; } #nav a:link, #nav a:visited { float: left; font: bold 7.5pt verdana; line-height: 14px; padding: 9px; text-decoration: none; color: #708491; } #nav a:link.active, #nav a:visited.active, #nav a:hover { color: rgb(0, 0, 0); background: url(http://1.bp.blogspot.com/_7wsQzULWIwo/SzvC_Xa-vHI/AAAAAAAACw0/qVeZI3gdWQM/s1600/Inverted.png) no-repeat top center; border-top: 4px solid #000000; } </style> <div class="container">
            <div class="col-md-6 offset-md-4">
            <ul class="col-md-12" id="nav">    
           <li id="f1"><a class="nav-link active" href="#" onclick="dis1()"><h6>Lamaran Saya</h6></a></li>
           <li id="f2" style="display:none"><a class="nav-link" href="#" onclick="dis1()"><h6>Lamaran Saya</h6></a></li>
           <li id="f3"><a class="nav-link" href="#" onclick="dis2()"><h6>Wawancara<small id="f5"  class = "badge badge-primary"></small></h6></a></li>
           <li id="f4" style="display:none"><a class="nav-link active" href="#" onclick="dis2()"><h6>Wawancara<small id="f6"  class = "badge badge-primary"></small></h6></a></li>
          
           </div>
    </div>

  </section>
@section('content2')

<div style="margin-left:2em;margin-right:2em;" class="jumbotron p-5 rounded-3">
  <div id="lamaran"></div> 
  </div>
    
<script>
  $(document).ready(function() {
         dis1()
     });
  function dis1() {
    document.getElementById("f2").style.display="none";
    document.getElementById("f1").style.display="block";
    document.getElementById("f4").style.display="none";
    document.getElementById("f3").style.display="block";
    $.get("{{ url('user/lamaran') }}", {}, function(data, status) {
             $("#lamaran").html(data);
             bacastatus(),
             f5(),
             notif()
         });
  }
  function dis2() {
    document.getElementById("f1").style.display="none";
    document.getElementById("f2").style.display="block";
    document.getElementById("f3").style.display="none";
    document.getElementById("f4").style.display="block";
    $.get("{{ url('user/wawancara') }}", {}, function(data, status) {
             $("#lamaran").html(data); 
             bacawawancara(),
             f5(),
             notif()
         });
  }
  function f5() {
    $.get("{{ url('user/wawancaranotif') }}", {}, function(data, status) {
             $("#f5").html(data); 
             $("#f6").html(data);  
         });
  }
  function bacastatus()
  {
    $.get("{{ url('user/bacastatus') }}", {}, function(data, status) {
         });
  }
  function bacawawancara()
  {
    $.get("{{ url('user/bacawawancara') }}", {}, function(data, status) {
         });
  }
</script>
@endsection          