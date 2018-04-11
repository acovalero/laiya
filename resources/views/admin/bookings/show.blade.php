@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.inquiries.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.inquiries.fields.customer')</th>
                            <td field-key='customer'>{{ $inquiry->customer->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.inquiries.fields.room')</th>
                            <td field-key='room'>{{ $inquiry->room->room_number or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.inquiries.fields.pax')</th>
                            <td field-key='room'>{{ $inquiry->pax}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.inquiries.fields.time-from')</th>
                            <td field-key='time_from'>{{ $inquiry->time_from }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.inquiries.fields.time-to')</th>
                            <td field-key='time_to'>{{ $inquiry->time_to }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.inquiries.fields.additional-information')</th>
                            <td field-key='additional_information'>{!! $inquiry->additional_information !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
