@extends('layouts.app')
<script>
    $(document).ready(function(){
        $(".add-row").click(function(){
            var markup = ""
                +"<tr>"
                +"<td>1</td>"
                +"<td>"
                +"<div class='form-group'>"
                +"<div class='input-group date'>"
                +"<div class='input-group-addon'><i class='fa fa-calendar'></i></div>"
                +"<input type='text' class='form-control pull-right startdate' name='startdate[]'>"
                +"</div>"
                +"</div>"
                +"</td>"
                +"<td>"
                +"<input type='hidden' class='form-control pull-right enddate' name='enddate[]'>"
                +"<input type='checkbox' name='ispresent[]'/></td>"
                +"<td>"
                +"<select name='presenttype[]' class='form-control'>"
                +"<option disabled>Select Attendance Type...</option>"
                +"<option value='Whole Day'>Whole Day</option>"
                +"<option value='AM'>AM</option>"
                +"<option value='PM'>PM</option>"
                +"</select>"
                +"</td>"
                +"<td>"
                +"<select name='areaid[]' class='form-control'>"
                +"<option disabled>Select Area...</option>"
                +"<option value=</option>"
                +"</select>"
                +"</td>"
                +"<td>"
                +"<select name='projectid[]' class='form-control'>"
                +"<option disabled>Select Project...</option>"
                +"<option value=</option>"
                +"</select>"
                +"</td>"
                +"</tr>"
                +"";
            $("table tbody").append(markup);
        });
s

    });
</script>
@section('content')
    <h3 class="page-title">@lang('quickadmin.customers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.customers.fields.first-name')</th>
                            <td field-key='first_name'>{{ $customer->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.customers.fields.last-name')</th>
                            <td field-key='last_name'>{{ $customer->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.customers.fields.address')</th>
                            <td field-key='address'>{{ $customer->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.customers.fields.phone')</th>
                            <td field-key='phone'>{{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.customers.fields.email')</th>
                            <td field-key='email'>{{ $customer->email }}</td>
                        </tr>
                        {{-- <tr>
                            <th>@lang('quickadmin.customers.fields.country')</th>
                            <td field-key='country'>{{ $customer->country->title or '' }}</td>
                        </tr> --}}
                    </table>
                </div>
            </div><!-- Nav tabs -->

            <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#myModal">Add Inquiry</button>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" action="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="modalLabel">Add Inquiry</h4>
                            </div>

                            <div class="modal-body">



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <br>
            <hr>




<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#inquiries" aria-controls="inquiries" role="tab" data-toggle="tab">Inquiries</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="inquiries">
<table class="table table-bordered table-striped {{ count($inquiries) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.inquiries.fields.customer')</th>
                        <th>@lang('quickadmin.inquiries.fields.room')</th>
                        <th>@lang('quickadmin.inquiries.fields.time-from')</th>
                        <th>@lang('quickadmin.inquiries.fields.time-to')</th>
                        <th>@lang('quickadmin.inquiries.fields.additional-information')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($inquiries) > 0)
            @foreach ($inquiries as $inquiry)
                <tr data-entry-id="{{ $inquiry->id }}">
                    <td field-key='customer'>{{ $inquiry->customer->first_name or '' }}</td>
                                <td field-key='room'>{{ $inquiry->room->room_number or '' }}</td>
                                <td field-key='time_from'>{{ $inquiry->time_from }}</td>
                                <td field-key='time_to'>{{ $inquiry->time_to }}</td>
                                <td field-key='additional_information'>{!! $inquiry->additional_information !!}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('inquiry_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.inquiries.restore', $inquiry->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('inquiry_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.inquiries.perma_del', $inquiry->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('inquiry_view')
                                    <a href="{{ route('admin.inquiries.show',[$inquiry->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('inquiry_edit')
                                    <a href="{{ route('admin.inquiries.edit',[$inquiry->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('inquiry_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.inquiries.destroy', $inquiry->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.customers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
