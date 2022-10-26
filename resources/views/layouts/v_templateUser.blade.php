@extends('layouts.v_templateregister')
<style>
</style>     
<br>
<br>
<br> 
<section class="content1">
      

    <!-- Default box -->
    @yield('content1')
    
        <style> .container { width: 500px; padding: 0 0 5px 0; margin: 3px 0 10px 0; background: rgb(0, 0, 0); } #nav { margin: 0; padding: 0; border-top: 3px solid #000000; } #nav li { margin: 0; padding: 0; display: inline; list-style-type: none; } #nav a:link, #nav a:visited { float: left; font: bold 7.5pt verdana; line-height: 14px; padding: 9px; text-decoration: none; color: #708491; } #nav a:link.active, #nav a:visited.active, #nav a:hover { color: rgb(0, 0, 0); background: url(http://1.bp.blogspot.com/_7wsQzULWIwo/SzvC_Xa-vHI/AAAAAAAACw0/qVeZI3gdWQM/s1600/Inverted.png) no-repeat top center; border-top: 4px solid #000000; } </style> <div class="container">
            <div class="col-md-6 offset-md-4">
            <ul class="col-md-12 offset-md-4" id="nav">    
           <li ><a class="nav-link" href="{{url('/lamaranSaya')}}"><span>Lamaran Saya</span></a></li>
           <li><a class="nav-link" href="#"><span>Asesmen</span></a></li>
           <li><a class="nav-link" href="{{url('/link')}}"><span>Wawancara</span></a></li>
           </ul>
           </div>
    </div>
    <!-- /.card -->

  </section>