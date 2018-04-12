@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.inquiries.title')</h3>
    @can('inquiry_create')
    <p>
        <a href="{{ route('admin.inquiries.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('inquiry_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.inquiries.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.inquiries.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($inquiries) > 0 ? 'datatable' : '' }} @can('inquiry_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('inquiry_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.inquiries.fields.customer')</th>
                        <th>@lang('quickadmin.inquiries.fields.room')</th>
                        <th>@lang('quickadmin.inquiries.fields.pax')</th>
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
                                <td field-key='room'>{{ $inquiry->room->room_number or '' }}</td>
                                <td field-key='pax'>{{ $inquiry->pax}}</td>
                                <td field-key='time_from'>{{ $inquiry->time_from }}</td>
                                <td field-key='time_to'>{{ $inquiry->time_to }}</td>
                                <td field-key='created_at'>{{ $inquiry->created_at }}</td>
                                {{-- <td field-key='additional_information'>{!! $inquiry->additional_information !!}</td> --}}
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
@stop

@section('javascript') 
    <script>
        @can('inquiry_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.inquiries.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection