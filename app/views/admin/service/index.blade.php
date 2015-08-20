@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage Service
        <small>Manage All Service.</small>
    </h1>    
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div id="message">
                @if (Session::has('message'))
                {{ Session::get('message') }}
                @endif
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Manage Service</h3>                    
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped data-table">
                        <thead>
                            <tr>
                                <th>Service name</th>
                                <th>Pet</th>
                                <th>Add pet</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                            <tr id="row_{{ $service->id }}">
                                <td>{{ ucfirst(strip_tags(substr($service->service_name,0,40))) }}</td> 
                                <td><table>@foreach($service->pet as $log)
                                        <tr>
                                            <td>
                                                @foreach($pets as $pet)
                                                @if ($pet->id == $log->pet_type_id)
                                                {{ $pet->pet_name }}
                                                @endif
                                                @endforeach
                                            </td>                                            
                                        <tr>
                                            @endforeach
                                    </table>
                                </td>
                                <td>{{ date('d M, Y',strtotime($service->created_at )) }}</td>
                                <td>
                                    <!--status-->
                                    @if ($service->status)
                                    <a href="javascript:void(0);" class="fa fa-unlock-alt change-status" data-id="{{ $service->id }}"
                                       data-status="{{ $service->status }}" title="Make Inactive">&nbsp;</a>
                                    @else
                                    <a href="javascript:void(0);" class="fa fa-lock change-status"
                                       data-id="{{ $service->id }}" data-status="{{ $service->status }}" title="Make Active">&nbsp;</a>
                                    @endif
                                    <!--status-->
                                    
                                    <!--Delete-->
                                   <?php /* @if ($service->tour->count() >= '1')
                                    <a href="javascript:void(0);" class="fa fa-warning " title="{{ trans('backend.index_not_allowed_to_delete') }}">&nbsp;</a>
                                    @else*/?>
                                    <a href="javascript:void(0);" class="fa fa-trash-o delete" title="Delete"data-id="{{ $service->id }}">&nbsp;</a>
                                    <?php /*@endif*/?>
                                    <!--Delete-->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Service name</th>                                
                                <th>Pet</th>
                                <th>Add pet</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
@section('page-script')
{{ HTML::script('packages/admin/assets/js/plugins/datatables/jquery.dataTables.js') }}
{{ HTML::script('packages/admin/assets/js/plugins/datatables/dataTables.bootstrap.js') }}
<script type="text/javascript">
    $(function() {
        $('#example2').dataTable();
        $(document).on('click', '.change-status', function() {
            var self = $(this);
            var status = parseInt(self.attr('data-status'));
            var data = {'id': self.attr('data-id'),
                'status': status,
                'type': CONFIG.get('SERVICE_CHANGE_STATUS')};
            var res = executeAjaxRequest(self, data, true);        
            $("#message").html(res.str);
            if (res.valid) {
                if (status) {
                    $("#loader").replaceWith('<a href="javascript:void(0);" class="fa fa-lock change-status" data-id="' + self.attr('data-id') + '" data-status="0" title="Make Active">&nbsp;</a>');
                    return false;
                }

                $("#loader").replaceWith('<a href="javascript:void(0);" class="fa fa-unlock-alt change-status" data-id="' + self.attr('data-id') + '" data-status="1" title="{{ trans("sitetext.make_inactive") }}">&nbsp;</a>');
            }

            // if some error occurrs then loader will again changed to element
            $("#loader").replaceWith(self);
        });        

        $(document).on('click', '.delete', function() {
            if (confirm('Are you sure you want to delete this service?')) {
                var self = $(this);
                var id = self.attr('data-id');
                var data = {'id': id,
                    'type': CONFIG.get('SERVICE_DELETE')};
                var res = executeAjaxRequest(self, data);                
                if (res) {
                    $("#row_" + id).remove();                    
                    $("#message").html(res.str);
                }

                $("#loader").replaceWith(self);
            }
        });
    });
</script>
@stop
@stop