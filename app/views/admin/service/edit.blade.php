@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tour Package
        <small>Update Package.</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::route('agent.tour.index') }}">tours</a></li>
        <li class="active">Create</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Tour Package Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{ Form::model($tour,['route' => ['admin.tour.update',$tour->id ],'method' => 'patch','files'=> true]) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="category">Category</label>
                        {{ Form::select('category',$categories,$tour->category_id,['class' => 'form-control', 'id'=> 'category']) }}
                        <p class='text-red'>{{ $errors->first('category') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        {{ Form::text('title',$tour->title,['class' => 'form-control', 'id'=> 'name','placeholder' => 'Enter Title']) }}
                        <p class='text-red'>{{ $errors->first('title') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="details">Details</label>
                        {{ Form::textarea('details',$tour->details,['class' => 'form-control textarea textarea-editor', 'id'=> 'details']) }}
                        <p class='text-red'>{{ $errors->first('details') }}</p>
                    </div>
                    <div class="selectRangeDates">
                        <div style="width:120px; float:left;">
                            <input type="radio" name="dateType" id='radioRandomDate' checked="checked"  value="1" />
                            <label for="randomDate">Random Date</label>
                        </div>
                        <div style="width:120px; float:left;">
                            <input type="radio" name="dateType" id='radioRangeDate' value="2" />
                            <label for="range">Date Range</label>
                        </div>
                    </div>
                    <div class='clearfix'></div>
                    <div class='form-group' id='individualDates'>
                        {{ Form::text('dates',(isset($startDates) && is_string($startDates))?$startDates:null,['class' => 'form-control', 'id'=> 'dates','placeholder' => trans('frontend.agent.tour.select_dates')]) }}
                    </div>
                </div>
                <div class="form-group" id="dateRangeWrapper">
                    <div id="moreDateRange">
                        <div id='span-date-range-picker' class='date-range-picker' style='margin-top: 5px;'>
                            <span>
                                <input name='startdate[]' class='date-range form-control pull-left start-range' style='width:225px;margin-right: 4px;' id='date_start_0' placeholder='Start Date' value="@if(is_array($startDates)){{$startDates[0]}}@endif" />
                                <input name='enddate[]' class='date-range form-control pull-left end-range' style='width:225px;' id='date_end_0' placeholder='End Date'  value="@if(is_array($endDates)){{$endDates[0]}}@endif"/>
                                <input type="button" class="addDate btn-sm btn-primary" value="+" style='margin-left: 4px;'/>
                                <div class='clearfix'></div>
                            </span>
                        </div>

                        @if (isset($startDates) && is_array($startDates) && isset($endDates))
                        <?php
                        unset($startDates[0]);
                        unset($endDates[0]);
                        $counter = 1;
                        ?>
                        @foreach($startDates as $key => $value)
                        <div class='date-range-picker' style='margin-top: 5px;'>
                            <span>
                                <input name='startdate[]' class='date-range form-control pull-left start-range' style='width:225px;margin-right: 4px;' id='date_start_{{$counter}}' placeholder='Start Date' value="{{$value}}" />
                                <input name='enddate[]' class='date-range form-control pull-left end-range' style='width:225px;' id='date_end_{{$counter}}' placeholder='End Date' value="{{$endDates[$key]}}" />
                                <input type="button" class="removeDate btn-sm btn-primary" value="-" style='margin-left: 4px;'/>
                                <div class='clearfix'></div>
                            </span>
                        </div>
                        <?php $counter++; ?>
                        @endforeach
                        @endif
                    </div><!-- /.input group -->
                </div>
                <p class='text-red'>{{ $errors->first('dates') }}</p>
                <div class="form-group">
                    <label for="adult_rate">Rate Per Adult</label>
                    {{ Form::text('adult_rate',$tour->charge_per_adult ,['class' => 'form-control', 'id'=> 'adult_rate','placeholder' => 'Enter rate per adult','maxlength' => 12]) }}
                    <p class='text-red'>{{ $errors->first('adult_rate') }}</p>
                </div>
                <div class="form-group">
                    <label for="child_rate">Rate Per Child (Optional)</label>
                    {{ Form::text('child_rate',$tour->charge_per_child,['class' => 'form-control', 'id'=> 'child_rate','placeholder' => 'Enter rate per child','maxlength' => 12]) }}
                    <p class='text-red'>{{ $errors->first('child_rate') }}</p>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    {{ Form::select('country',$countries,$tour->country_id,['class' => 'form-control', 'id'=> 'country']) }}
                    <p class='text-red'>{{ $errors->first('country') }}</p>
                </div>
                <!--                <div class="form-group">
                                    <label for="state">State</label>
                                    {{ Form::select('state',$states,$tour->state_id,['class' => 'form-control', 'id'=> 'state']) }}
                                    <p class='text-red'>{{ $errors->first('state') }}</p>
                                </div>-->
                <div class="form-group">
                    <label for="region">Region</label>
<!--                    <span>( Please select "Other" if your region is not available in List )</span>-->
                    {{ Form::text('region',$regions,['class' => 'form-control', 'id'=> 'region']) }}
                    <p class='text-red'>{{ $errors->first('region') }}</p>
                </div>
                <div id="otherCity" style="display: none">
                    <div class="form-group">
                        <label for="city">City</label>
                        {{ Form::text('city',null,['class' => 'form-control', 'id'=> 'city','placeholder' => 'Enter city']) }}
                        <p class='text-red'>{{ $errors->first('city') }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="street_address">Meet Location</label>
                    {{ Form::textarea('street_address',$tour->street_address,['class' => 'form-control', 'id'=> 'street_address','rows' => 5,'cols' => 3]) }}
                    <p class='text-red'>{{ $errors->first('street_address') }}</p>
                </div>
                <div class="form-group">
                    <label for="pin_code">Pin Code</label>
                    {{ Form::text('pin_code',$tour->pincode,['class' => 'form-control', 'id'=> 'pin_code','placeholder' => 'Enter Pincode']) }}
                    <p class='text-red'>{{ $errors->first('pin_code') }}</p>
                </div>
                <div class="form-group">
                    <label for="activity_duration" class='pull-left'>{{ trans('frontend.agent.tour.activity_duration')}}</label>
                    <span class='clearfix'></span>
                    {{ Form::selectRange('activity_duration_day', 0, 50, isset($metadata['activity_duration'][0])?$metadata['activity_duration'][0]:1, ['class' => 'form-control pull-left', 'style' => 'width:15%', 'id'=> 'activity_duration_day']); }}
                    <span class='pull-left margin'>Days</span>
                    {{ Form::selectRange('activity_duration_hours', 0, 23, isset($metadata['activity_duration'][1])?$metadata['activity_duration'][1]:0, ['class' => 'form-control pull-left', 'style' => 'width:15%', 'id'=> 'activity_duration_hour']); }}
                    <span class='pull-left margin'>Hours</span>
                    {{ Form::selectRange('activity_duration_miutes', 0, 55, isset($metadata['activity_duration'][2])?$metadata['activity_duration'][2]:0, ['class' => 'form-control pull-left', 'style' => 'width:15%', 'id'=> 'activity_duration_miutes']); }}
                    <span class='pull-left margin'>Minutes</span>
                    <span class='clearfix'></span>
                </div>
                <!--                <div class="form-group">
                                    <label for="availability">Availability</label>
                                    {{ Form::select('availability',['Daily' => 'Daily','Alternate Day' => 'Alternate Day','Weekly' => 'Weekly'],$tour->availability,['class' => 'form-control', 'id'=> 'availability']) }}
                                </div>
                                <div class="form-group">
                                    <label for="activity_timing">Activity Timing</label>
                                    {{ Form::text('activity_timing',$tour->activity_timing,['class' => 'form-control pull-left','id'=> 'activity_timing','placeholder' =>  trans('frontend.agent.tour.enter_activity_timing')]) }}
                                    <p class='text-red'>{{ $errors->first('activity_timing') }}</p>
                                </div>-->
                <div class="form-group">
                    <label for="fitness_level">{{ trans('frontend.agent.tour.fitness_level')}}</label>
                    <span class="custom-dropdown-1">
                        {{ Form::select('fitness_level',['1' => trans('frontend.agent.tour.low'),
                                        '2' =>  trans('frontend.agent.tour.moderate'),
                                        '3' => trans('frontend.agent.tour.high'),
                                        '4' => trans('frontend.agent.tour.higher')
                            ],$tour->fitness_level,['class' => 'form-control', 'id'=> 'fitness_level']) }}
                    </span>
                </div>
                <div class="form-group">
                    <label for="age_group">Age Group</label>
                    {{ Form::select('age_group',['1' => trans('frontend.agent.tour.no_age_limit'),
                                        '2' =>  trans('frontend.agent.tour.only_for_adult'),
                                        '3' => trans('frontend.agent.tour.only_for_kids')                                        
                            ],$tour->age_group,['class' => 'form-control', 'id'=> 'age_group']) }}
                </div>
                <div class="form-group">
                    <label for="pricing">More Details about Pricing (Optional)</label>
                    {{ Form::textarea('pricing',isset($metadata['pricing'])?$metadata['pricing']:null,['class' => 'form-control textarea textarea-editor', 'id'=> 'pricing']) }}
                </div>
                <div class="form-group">
                    <label for="cancellation_policy">Cancellation Policy</label>
                    {{ Form::textarea('cancellation_policy',isset($metadata['cancellation_policy'])?$metadata['cancellation_policy']:'',['class' => 'form-control textarea textarea-editor', 'id'=> 'cancellation_policy']) }}
                    <p class='text-red'>{{ $errors->first('cancellation_policy') }}</p>
                </div>
                <div class="form-group">
                    <label for="other_rules">Other Rules</label>
                    {{ Form::textarea('other_rules',isset($metadata['other_rules'])?$metadata['other_rules']:'',['class' => 'form-control textarea textarea-editor', 'id'=> 'other_rules']) }}
                    <p class='text-red'>{{ $errors->first('other_rules') }}</p>
                </div>
                <div class="form-group">
                    <label for="whats_included">What's Included</label>
                    {{ Form::textarea('whats_included',isset($metadata['whats_included'])?$metadata['whats_included']:'',['class' => 'form-control textarea textarea-editor', 'id'=> 'whats_included']) }}
                    <p class='text-red'>{{ $errors->first('whats_included') }}</p>
                </div>
                <div class="form-group">
                    <label for="whattobring">What To Bring</label>
                    {{ Form::textarea('whattobring',isset($metadata['whattobring'])?$metadata['whattobring']:'',['class' => 'form-control textarea textarea-editor', 'id'=> 'whattobring']) }}
                    <p class='text-red'>{{ $errors->first('whattobring') }}</p>

                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    {{ Form::select('status',['0' => 'Unpublish','1' => 'Publish'],$tour->status,['class' => 'form-control', 'id'=> 'status']) }}
                </div>
                {{ Form::hidden('metaid',isset($metaid)?$metaid:0,['class' => 'form-control','id'=> 'metaid']) }}
                {{ Form::hidden('agentId',$tour->user_id) }}
            </div><!-- /.box-body -->

            <div class="box-footer">    
                {{ Form::submit(trans('backend.save'), array('class' => 'btn btn-primary')) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
</section><!-- /.content -->
@section('page-script')
{{ HTML::style('packages/admin/assets/css/datepicker/multidatepicker.css') }}
{{ HTML::script('packages/admin/assets/js/plugins/datepicker/bootstrap-multi-datepicker.js') }}

{{ HTML::style('packages/admin/assets/css/jquery-datepicker.css') }}
{{ HTML::script('packages/admin/assets/js/jquery-datepicker-min.js') }}

{{ HTML::style('packages/admin/assets/css/datepicker/bootstrap-timepicker.min.css') }}
{{ HTML::script('packages/admin/assets/js/plugins/datepicker/bootstrap-timepicker.min.js') }}

{{ HTML::style('packages/admin/assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
{{ HTML::script('packages/admin/assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}

{{ HTML::script('packages/admin/assets/js/tour.js') }}
{{ HTML::script('http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places') }}
<!--<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>-->
<script>
    var countryCode = new Array();
    $(function() {
        var dateType = '{{$dateType}}';
        showDateOptions(dateType);
        _initializeDatePicker(0);
        if (dateType == 2) {
            var rangeInput = '{{$rangeInput}}';
            showDatePickers(rangeInput);
        }
    });

    $(function() {
        countryCode = $.parseJSON('{{ json_encode($countriesCode) }}');
        $("#bank_details").show();
        $("#region").focus(function() {
            initialize(countryCode[$('#country').val()]);
        });
        $(document).on('change', "#country", function() {
            initialize(countryCode[$(this).val()]);
            $('#region').val("");
        });


        function initialize(country) {
            var options = {
                types: ['(cities)'],
                componentRestrictions: {country: country}
            };
            var input = document.getElementById('region');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
        }}
    );
</script>
@stop
@stop
