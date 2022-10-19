@extends('layouts.v_templateregister')
 @section('content3') 
 <br>
 <table width = "100%" border = "0">
          
    <tr>
       <td colspan = "2">
         <h1>Detail Loker</h1>
       </td>
    </tr>
    <td  colspan="2" height = "60" >
    </td>
    <tr valign = "top">
       <td  width = "10%">
        <img width="100%" src="{{asset('/logo/'. $lowongan->logo)}}" alt="logo">
       </td>
        
       <td  width = "90%" >
        <h4>{{$lowongan->nama}} </h4>
        <h4 style="color: blue">{{$lowongan->posisi}}</h4>
       </td>
    </tr>
    <td  colspan="2" height = "60" >
    </td> 
     
 </table>
 

 @endsection 