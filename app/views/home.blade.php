@extends('layouts.base')
@section('content')
<div class="container marketing">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 alignCenter marginBottom20">
            <h1 class="MuseoSlab500 color-maroon">Bunny's </h1>
        </div>
        <div class="clearfix"></div>

        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2">
            <h3 class="MuseoSans500">Manage Services</h3>            
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2">
            <h3 class="MuseoSans500">Manage Pet types</h3>            
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2">
            <h3 class="MuseoSans500">Allocate a service</h3>            
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2">
            <h3 class="MuseoSans500">list of services</h3>            
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2">
            <h3 class="MuseoSans500">list of pets</h3>            
        </div>
    </div>
</div>
<hr class="visible-xs hr-divider1 seperator1">
<div class="clearfix"></div>
<!-- END .main-contents .bom-contents -->
@section('page-script')
<link href="{{ asset('packages/css/jquery-ui.min.css') }}" rel="stylesheet">
{{ HTML::script('packages/js/bootstrap-datepicker.js') }}
{{ HTML::script('packages/js/jquery.flexslider-min.js') }}
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
{{ HTML::script('packages/js/rs-plugin/js/jquery.plugins.min.js') }}
{{ HTML::script('packages/js/jquery-ui.min.js') }}
<!--<script src="https://www.google.com/jsapi?key=ABQIAAAAn01L8sl4uwWn5vTPpoEoXhQlhX9aoLwtuBlP8SLx1ePnrLY9UBT9g3_4EQBp1uyDz1sgvvv7UqG-nQ"></script>-->
@stop
@stop