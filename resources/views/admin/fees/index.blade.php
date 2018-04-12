@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.fees.title')</h3>
    @can('fee_create')
    <p>
        <a href="{{ route('admin.fees.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('fee_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.fees.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.fees.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($fees) > 0 ? 'datatable' : '' }} @can('fee_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('fee_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.fees.fields.customer')</th>
                        <th>@lang('quickadmin.fees.fields.room')</th>
                        <th>@lang('quickadmin.fees.fields.pax')</th>
                        <th>@lang('quickadmin.fees.fields.time-from')</th>
                        <th>@lang('quickadmin.fees.fields.time-to')</th>
                        <th>@lang('quickadmin.fees.fields.additional-information')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($fees) > 0)
                        @foreach ($fees as $fee)
                            <tr data-entry-id="{{ $fee->id }}">
                                @can('fee_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='customer'>{{ $fee->customer->full_name or '' }}</td>
                                <td field-key='room'>{{ $fee->room->room_number or '' }}</td>
                                <td field-key='pax'>{{ $fee->pax}}</td>
                                <td field-key='time_from'>{{ $fee->time_from }}</td>
                                <td field-key='time_to'>{{ $fee->time_to }}</td>
                                <td field-key='additional_information'>{!! $fee->additional_information !!}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('fee_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.fees.restore', $fee->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('fee_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.fees.perma_del', $fee->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('fee_view')
                                    <a href="{{ route('admin.fees.show',[$fee->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('fee_edit')
                                    <a href="{{ route('admin.fees.edit',[$fee->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('fee_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.fees.destroy', $fee->id])) !!}
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
        @can('fee_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.fees.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection