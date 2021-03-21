@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                
                
                <img class="center" height="550" width="400" src="{{asset('logo_enco.jpg')}}" >
<!--
                <div class="card-header">
                    Dashboard
                </div>
-->

<!--
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
-->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection