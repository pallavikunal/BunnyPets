@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Create Pet
        <small>Create new Pet.</small>
    </h1>    
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Create Pet</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{ Form::open(['route' => 'pet.store','files'=> true]) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        {{ Form::text('name',null,['class' => 'form-control', 'id'=> 'name','placeholder' => "Enter Pet"]) }}
                        <p class='text-red'>{{ $errors->first('name') }}</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        {{ Form::textarea('description',null,['class' => 'form-control', 'id'=> 'description', 'rows' => 5 , 'cols' => 10 ]) }}
                        <p class='text-red'>{{ $errors->first('description') }}</p>
                    </div>  
                </div><!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::submit(trans('backend.submit') , array('class' => 'btn btn-primary')) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section><!-- /.content -->
@stop
