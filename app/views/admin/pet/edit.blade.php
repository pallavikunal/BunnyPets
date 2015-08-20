@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pet Details
        <small>Details of Pet.</small>
    </h1>  
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
            {{ Session::get('message') }}
            @endif
            <div class="box box-primary">
                <div class="box-header">           
                    <h3 class="box-title">{{ ucfirst($pet->pet_name) }}{{ trans('backend.tours.sdetails') }}</h3>                    
                    @if (Request::segment(5) != '')                    
                    <div class='pull-right margin'>
                        <a href="{{ URL::route('admin.tour.index',['uid' => Request::segment(5) ]) }}" class='btn btn-primary'> << {{ ucfirst($pet->user->firstName)}}{{ trans('backend.tours.show_stour_listing') }}</a>
                    </div>                    
                    @endif                    
                </div><!-- /.box-header -->  

                <!-- form start -->
                <div class="box-body">                    
                    {{ Form::model($pet, ['route' => ['pet.update', $pet->id ], 'method' => 'patch', 'files' => 'true']) }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            {{ Form::text('name',$pet->pet_name ,['class' => 'form-control', 'id'=> 'name','placeholder' => "Enter Pet",'readonly' => "readonly"]) }}
                            <p class='text-red'>{{ $errors->first('name') }}</p>
                        </div>

                        <dl class="dl-horizontal">
                            @foreach ($services as $service)                        
                            <dt>{{ $service->service_name}}</dt>
                                @if(in_array($service->id, $petServices)) 
                                <dd><p>{{Form::checkbox('service[]', $service->id,true);}}</p></dd>
                                @else
                                <dd><p>{{Form::checkbox('service[]', $service->id);}}</p></dd>
                                @endif 
                            
                            @endforeach
                        </dl>                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        {{ Form::submit(trans('backend.submit') , array('class' => 'btn btn-primary')) }}
                    </div>
                    {{ Form::close() }}
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
</section><!-- /.content -->

@section('page-script')
{{ HTML::style('packages/admin/assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
{{ HTML::script('packages/admin/assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}

@stop
@stop