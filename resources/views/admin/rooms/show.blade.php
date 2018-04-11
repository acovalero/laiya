@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.rooms.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.rooms.fields.room-number')</th>
                            <td field-key='room_number'>{{ $room->room_number }}</td>
                        </tr>
                            <th>@lang('quickadmin.rooms.fields.room_type')</th>
                            <td field-key='room_types'>{{ $room->room_types->room_type or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active"><a href="#inquiries" aria-controls="inquiries" role="tab"
                                                          data-toggle="tab">Inquiry</a></li>
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
                            <th>@lang('quickadmin.inquiries.fields.room_type')</th>

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
                                    <td field-key='room_type'>{{ $inquiry->room_types->room_type or '' }}</td>
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
                                                <a href="{{ route('admin.inquiries.show',[$inquiry->id]) }}"
                                                   class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                            @endcan
                                            @can('inquiry_edit')
                                                <a href="{{ route('admin.inquiries.edit',[$inquiry->id]) }}"
                                                   class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
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

            <a href="{{ route('admin.rooms.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
