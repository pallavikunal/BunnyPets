@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage Pet
        <small>Manage All Pet.</small>
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
                    <h3 class="box-title">Manage Pet</h3>                    
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-striped data-table">
                        <thead>
                            <tr>
                                <th>Pet name</th>    
                                <th>Pet Service</th>
                                <th>Add Service</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pets as $pet)
                            <tr id="row_{{ $pet->id }}">
                                <td>{{ ucfirst(strip_tags(substr($pet->pet_name,0,40))) }}</td>                                
                                <td><table>@foreach($pet->service as $log)
                                        <tr>
                                            <td>
                                                @foreach($services as $ser)
                                                @if ($ser->id == $log->pet_service_id)
                                                {{ $ser->service_name }}
                                                @endif
                                                @endforeach
                                            </td>                                            
                                        <tr>
                                            @endforeach
                                    </table>
                                </td>
                                <td>
                                    <a href="{{ URL::route('pet.edit',['id' => $pet->id ]) }}" class="fa" title="View details">Add service</a></td>
                                <td>
                                    <!--status-->
                                    @if ($pet->status)
                                    <a href="javascript:void(0);" class="fa fa-unlock-alt change-status" data-id="{{ $pet->id }}"
                                       data-status="{{ $pet->status }}" title="Make Inactive">&nbsp;</a>
                                    @else
                                    <a href="javascript:void(0);" class="fa fa-lock change-status"
                                       data-id="{{ $pet->id }}" data-status="{{ $pet->status }}" title="Make Active">&nbsp;</a>
                                    @endif
                                    <!--status-->

                                    <!--Delete-->
                                    <a href="javascript:void(0);" class="fa fa-trash-o delete" title="Delete"data-id="{{ $pet->id }}">&nbsp;</a>
                                    <!--Delete-->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Pet name</th>                                
                                <th>Pet Service</th>
                                <th>Add Service</th>
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
                'type': CONFIG.get('PET_CHANGE_STATUS')};
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
            if (confirm('Are you sure you want to delete this pet?')) {
                var self = $(this);
                var id = self.attr('data-id');
                var data = {'id': id,
                    'type': CONFIG.get('PET_DELETE')};
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