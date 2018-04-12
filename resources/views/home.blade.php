@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>
                <div class="panel-body">
                    @lang('quickadmin.qa_dashboard_text')
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>
                <div class="panel-body">
                    @lang('quickadmin.qa_dashboard_text')
                </div>
            </div>
        </div>

            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>
                    <div class="panel-body">
                        @lang('quickadmin.qa_dashboard_text')
                    </div>
                </div>
            </div>
    </div>

    <div class="row">
        <div class="offset-lg-2 col-md-6 offset-md-2">
            <div class="panel panel-info">
                <div class="panel-heading">@lang('quickadmin.qa_reminders')</div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped" >
                            <thead>
                                <tr>
                                    @can('iniquiry_delete')
                                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                                    @endcan
        
                                    <th>@lang('quickadmin.inquiries.fields.customer')</th>
                                    <th>@lang('quickadmin.inquiries.fields.created_at')</th>
                                    <th>@lang('quickadmin.customers.fields.phone')</th>
                                    {{-- @if( request('show_deleted') == 1 )
                                    <th>&nbsp;</th>
                                    @else
                                    <th>&nbsp;</th>
                                    @endif --}}
                                </tr>
                            </thead>
                            
                            <tbody>
                                @if (count($inquiries) > 0)
                                    @foreach ($inquiries as $iniquiry)
                                    @foreach ($customers as $customer)
                                        <tr data-entry-id="{{ $iniquiry->id }}">
                                            @can('iniquiry_delete')
                                                <td></td>
                                            @endcan
            
                                            <td field-key='customer'>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                            <td field-key='created_at'>{{ $iniquiry->created_at }}</td>
                                            <td field-key='phone'>{{ $customer->phone }}</td>

                                            {{-- <td>
                                                @can('iniquiry_view')
                                                <a href="{{ route('admin.inquiries.show',[$iniquiry->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                                @endcan
                                                @can('iniquiry_edit')
                                                <a href="{{ route('admin.inquiries.edit',[$iniquiry->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                                @endcan
                                                @can('iniquiry_delete')
                                                {!! Form::open(array(
                                                    'style' => 'display: inline-block;',
                                                    'method' => 'DELETE',
                                                    'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                    'route' => ['admin.inquiries.destroy', $iniquiry->id])) !!}
                                                {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                            </td> --}}
            
                                        </tr>
                                        @endforeach
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
