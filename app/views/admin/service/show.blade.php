@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ trans('backend.tours.show_tour_details') }}
        <small>{{ trans('backend.tours.show_tour_details_of_tour') }}.</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{ trans('backend.home') }}</a></li>
        <li><a href="{{ URL::route('admin.tour.index') }}">{{ trans('backend.tours.index_tour') }}</a></li>
        <li class="active">{{ trans('backend.tours.details') }}</li>
    </ol>
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
                    <h3 class="box-title">{{ ucfirst($tour->title) }}{{ trans('backend.tours.sdetails') }}</h3>                    
                    @if (Request::segment(5) != '')                    
                    <div class='pull-right margin'>
                        <a href="{{ URL::route('admin.tour.index',['uid' => Request::segment(5) ]) }}" class='btn btn-primary'> << {{ ucfirst($tour->user->firstName)}}{{ trans('backend.tours.show_stour_listing') }}</a>
                    </div>                    
                    @endif                    
                    <div class='pull-right margin'>
                        <a href="" onclick="window.history.go(-1); return false;" class='btn btn-primary'>Back</a>
                    </div>
                </div><!-- /.box-header -->                
                

                <!-- form start -->
                <div class="box-body">
                    @if ($tour === NULL)
                    <div class="alert alert-info">                        
                        <b>{{ trans('backend.tours.show_record_not_found') }}</b>                                
                    </div>
                    @else
                    <dl class="dl-horizontal">
                        <dt>{{ trans('backend.tours.show_name') }}</dt>
                        <dd><p><strong>{{ ucfirst($tour->title) }}</strong></p></dd>
                        <dt>{{ trans('backend.tours.show_category') }}</dt>
                        <dd><p>{{ $tour->category->name}}</p></dd>
                        <dt>{{ trans('backend.tours.show_agent_name') }}</dt>
                        <dd><p>{{ ucfirst($tour->user->firstName)}} {{ ucfirst($tour->user->lastName)}}</p></dd>
                        <dt>{{ trans('backend.tours.show_details') }}</dt>
                        <dd><p>{{ $tour->details}}</p></dd>
                        <dt>{{ trans('backend.tours.show_charge_per_adult') }}</dt>
                        <dd><p>{{ $tour->charge_per_adult}} INR.</p></dd>
                        <dt>{{ trans('backend.tours.show_charge_per_child') }}</dt>
                        <dd><p>{{ $tour->charge_per_child}} INR.</p></dd>
                        <dt>{{ trans('backend.tours.show_activity_duration') }}</dt>
                        <dd>
                            <p>{{ ($metadata['activity_duration'])?$metadata['activity_duration'][0]." Days ".$metadata['activity_duration'][1]." Hours ".$metadata['activity_duration'][2]." Minutes " :'NA'}}</p>
                        </dd>
<!--                        <dt>{{ trans('backend.tours.show_availability') }}</dt>
                        <dd><p>{{ $tour->availability}}</p></dd>
                        <dd><p>{{ $tour->activity_timing }}</p></dd>-->
                        <dt>{{ trans('frontend.agent.tour.street_address' )}}</dt>                        
                        
                        <dd>
                            <p> {{ $tour->street_address}}
                                {{ $tour->country->name}},
                                {{ $tour->state->name}}, 
                            </p>
                            <p> {{ $tour->region->name}},{{ $tour->pincode}}</p>
                        </dd>
                        <dt>{{ trans('backend.tours.fitness_level')}}</dt>
                        <dd>
                            <p>
                                @if ($tour->fitness_level == 1){{ trans('frontend.agent.tour.low') }}
                                @elseif ($tour->fitness_level == 2){{ trans('frontend.agent.tour.moderate') }}
                                @elseif ($tour->fitness_level == 3){{ trans('frontend.agent.tour.high') }}
                                @else {{ trans('frontend.agent.tour.higher') }}
                                @endif
                            </p>
                        </dd>
                        <dt>Age Group</dt>
                        <dd>
                            <p>
                                @if ($tour->age_group == 1){{ trans('frontend.agent.tour.no_age_limit') }}
                                @elseif ($tour->age_group == 2){{ trans('frontend.agent.tour.only_for_adult') }}
                                @elseif ($tour->age_group == 3){{ trans('frontend.agent.tour.only_for_kids') }}                              
                                @endif
                            </p>
                        </dd>
                        @if (isset($metadata['tour_info']))
                        <dt>{{ trans('backend.tours.show_pricing') }}</dt>
                        <dd>
                            <p> {{ isset($metadata['tour_info']['pricing'])?$metadata['tour_info']['pricing']:'NA' }}</p>
                        </dd>
                        <dt>{{ trans('backend.tours.show_activity_other_rules') }}</dt>
                        <dd>
                            <p> {{ isset($metadata['tour_info']['other_rules'])?$metadata['tour_info']['other_rules']:'NA' }}</p>
                        </dd>
                        <dt>{{ trans('backend.tours.show_cancellation_policy') }}</dt>
                        <dd>
                            <p>{{ isset($metadata['tour_info']['cancellation_policy'])?$metadata['tour_info']['cancellation_policy']:'NA' }}</p>
                        </dd>
                        <dt>{{ trans('backend.tours.whatsincluded') }}</dt>
                        <dd>
                            <p>{{ isset($metadata['tour_info']['whats_included'])?$metadata['tour_info']['whats_included']:'NA'}}</p>
                        </dd>
                        <dt>{{ trans('backend.tours.show_what_to_bring') }}</dt>
                        <dd>
                            <p>{{ isset($metadata['tour_info']['whattobring'])?$metadata['tour_info']['whattobring']:'NA'}}</p>
                        </dd>                                

                        @endif
                        <dt>{{ trans('backend.tours.show_status') }}</dt>
                        <dd>
                            @if ($tour->status)
                            <p class='text-green'>
                                <a href='javascript:void(0);'
                                   data-id="{{$tour->id}}"
                                   data-status="{{$tour->status}}"
                                   class='btn btn-success btn-sm change-status' title='{{ trans('backend.tours.show_unpublish_this') }}'>{{ trans('backend.tours.show_publish') }}</a>
                            </p>
                            @else
                            <p>
                                <a href='javascript:void(0);'
                                   data-id="{{$tour->id}}"
                                   data-status="{{$tour->status}}"
                                   class='btn-danger btn-sm change-status' title='{{ trans('backend.tours.show_publish_this') }}'>{{ trans('backend.tours.show_unpublish') }}</a>
                            </p>
                            @endif
                        </dd>
                        <dt>{{ trans('backend.tours.show_dates') }}</dt>                            
                        <dd>
                            <p>
                            <div id="selectedDates"></div>
                            </p>                                
                        </dd>
                        <dt>{{ trans('backend.tours.show_created_at') }}</dt>
                        <dd><p>{{ date('d M, Y', strtotime($tour->created_at)) }}</p></dd>
                        <dt>{{ trans('backend.tours.show_modified_at') }}</dt>
                        <dd><p>{{ date('d M, Y', strtotime($tour->updated_at)) }}</p></dd>
                        @if ($tourImages)
                        <dt>{{ trans('backend.tours.show_images') }}</dt>
                        <dd>
                            @foreach($tourImages as $key => $image)
                            <p class='pull-left pad'>
                                <img src="{{ asset('uploads/tours') }}/{{ $tour->user_id }}/{{ $tour->id }}/thumb_150X133_{{ $image['image_name'] }}" width='100px' height='100px' title='{{ $image["title"] }}'/>
                            </p>
                            @endforeach
                        </dd>
                        @endif
                    </dl>
                    @endif
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
</section><!-- /.content -->

@section('page-script')
{{ HTML::style('packages/admin/assets/css/datepicker/multidatepicker.css') }}
{{ HTML::script('packages/admin/assets/js/plugins/datepicker/bootstrap-multi-datepicker.js') }}

{{ HTML::style('packages/admin/assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
{{ HTML::script('packages/admin/assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
<script type="text/javascript">
    $(function() {
        $(document).on('click', '.change-status', function() {
            var self = $(this);
            var status = parseInt(self.attr('data-status'));
            var data = {'id': self.attr('data-id'),
                'status': status,
                'type': CONFIG.get('TOUR_CHANGE_STATUS')};
            var res = executeAjaxRequest(self, data, true);
            $("#message").html(res.str);
            if (res.valid) {
                if (status) {
                    $("#loader").replaceWith('<a href="javascript:void(0);" class="btn-danger btn-sm change-status" data-id="' + self.attr('data-id') + '" data-status="0" title="Publish This">Unpublished</a>');
                    return false;
                }

                $("#loader").replaceWith('<a href="javascript:void(0);" class="btn btn-success btn-sm change-status" data-id="' + self.attr('data-id') + '" data-status="1" title="Unpublish This">Published</a>');
            }

            // if some error occurrs then loader will again changed to element
            $("#loader").replaceWith(self);
        });

        var availableDates = new Array();
        var setDate = new Date();
        availableDates = $.parseJSON('{{ json_encode($dates) }}');
        if (availableDates.length > 0) {
            setDate = new Date(availableDates[0]);
        }

        $('#selectedDates').multidatepicker({
            dateFormat: 'yyyy,mm,dd',
            startDate: setDate,
            endDate: new Date(date.getFullYear(), 11, 30),
            beforeShowDay: function(date) {
                var dmy = date.getFullYear() + "-" + (date.toLocaleDateString('en-US', {month: '2-digit'})) + "-" + date.toLocaleDateString('en-US', {day: '2-digit'});
                dmy = dmy.toString();
                if ($.inArray(dmy, availableDates) !== -1) {
                    return true;
                } else {
                    return false;
                }
            }
        });
    });
</script>
@stop
@stop