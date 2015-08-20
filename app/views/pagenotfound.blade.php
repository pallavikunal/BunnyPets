@extends('layouts.base')

@section('content')
<div class="inner-banner">
    <div class="banner-col1">
        <div class="item1">            
            <img src="{{ asset('packages/images/inner-banner1.png') }}" alt="Trailwala">               
        </div>        
    </div>
</div>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row marginTop30 marginBottom30">


        <div class="container MuseoSans500">
            <div class="col-lg-12 text-center">
               	<h4>Page doesn't exit or some other error occured. Go to our <a href="{{ URL::to('/') }}" class="color-yellow">home page</a> or got back to <a href="#" onclick="javascript:history.back();" class="color-yellow">previous page</a></h4>
                <div class="clearfix"></div>
                <span class="Heading-404">404</span><span class="title-404">ERROR</span>
                <div class="clearfix"></div>
                <span><img src="{{ asset('packages/images/are-you-lost.png')}} " alt="Generic placeholder image" width="236" height="338"></span>
                <div class="clearfix"></div>
                <h3>Don't worry you will be back on track in no time!</h3>

            </div>
        </div>

    </div><!-- /.row -->
</div><!-- /.container -->	
<div class="clearfix"></div>
@stop