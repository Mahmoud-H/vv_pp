@extends('layouts.admin')
@section('content')

<style>

 .cont{
  position:absolute;
  top:0px;
 width: 100%;
 }
  .cont1{
  margin:auto;
   }
  img{
	  margin-top:35px;
  opacity:0.2;
      width: 70%;
        display: block;
  margin-left: auto;
  margin-right: auto;

  }
    .h{
        color: darkorchid
    }
    .content{
  margin-left: 50px;
/*//  margin-right: auto;*/
    }
    .m{
        margin-left: 152px;
    }

</style>


<div class="content">
 <img src="{{asset('background.png')}}">
 <div class="cont">
<div class="cont1">


<div class="login-box">
    
    
    
    
    <div class="login-logo">
        <div class="login-logo">
<!--
            <a href="{{ route('admin.home') }}">
                {{ trans('panel.site_title1') }}
            </a>
-->
            <h2 class="h m">{{ trans('panel.site_title1') }}</h2>
      
             
        </div>
       <img class=" m" height="250" width="50" src="{{asset('logo.png')}}" >

    </div>
 
     <div class="login-logo">
        <div class="login-logo">
           <h6 class="h m">
             {{ trans('panel.site_title2') }}
            </h6>
            <h6 class="h m">
             {{ trans('panel.site_title3') }}
            </h6>
            </div>
         </div>
</div>
    
    </div></div></div>
@endsection