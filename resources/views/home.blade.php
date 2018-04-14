@extends('layouts.app')

@section('content')
    <div class="row">
        {{-- Number of Users --}}
        <div class="col-md-2">
            <div class="panel panel-success">
                <div class="panel-heading"><h4>Number of Users</h4></div>
                @if(count($users) > 0)
                <div class="panel-body">
                        <h1 class="title">{{ $users->count('id') }}
                </div>
                @else {
                    <h1>0</h1>
                }
                @endif
            </div>
        </div>

        {{-- Number of Customers --}}
        <div class="col-md-2">
            <div class="panel panel-success">
                <div class="panel-heading"><h4>Number of Customers<h4></div>
                @if(count($customers) > 0)
                <div class="panel-body">
                        <h1 class="title">{{ $customers->count('id') }}
                </div>
                @else {
                    <h1>0</h1>
                }
                @endif
            </div>
        </div>

        {{-- <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading"><h3>@lang('quickadmin.qa_dashboard')</h3></div>
                <div class="panel-body">
                    @lang('quickadmin.qa_dashboard_text')
                </div>
            </div>
        </div> --}}
    </div>

    <div class="row">
        <div class="offset-lg-2 col-md-10 offset-md-2">
            <div class="panel panel-info">
                <div class="panel-heading"><center><h4>@lang('quickadmin.qa_reminders')</h4></center></div>
                <div class="panel-body">
                        <table class="table table-bordered table-striped {{ count($inquiries) > 0 ? 'datatable' : '' }} @can('inquiry_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                                <thead>
                                    <tr>
                                        @can('inquiry_delete')
                                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                                        @endcan
                
                                        <th>@lang('quickadmin.inquiries.fields.customer')</th>
                                        {{-- <th>@lang('quickadmin.inquiries.fields.room')</th> --}}
                                        <th>@lang('quickadmin.inquiries.fields.time-from')</th>
                                        <th>@lang('quickadmin.inquiries.fields.time-to')</th>
                                        <th>@lang('quickadmin.inquiries.fields.created_at')</th>
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
                                                @can('inquiry_delete')
                                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                                @endcan
                
                                                <td field-key='customer'>{{ $inquiry->customer->full_name or '' }}</td>
                                                {{-- <td field-key='room'>{{ $inquiry->room->room_number or '' }}</td> --}}
                                                <td field-key='time_from'>{{ $inquiry->time_from }}</td>
                                                <td field-key='time_to'>{{ $inquiry->time_to }}</td>
                                                <td field-key='created_at'>{{ $inquiry->created_at }}</td>
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
        </div>
    </div>
@endsection
