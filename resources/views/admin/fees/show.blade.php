@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.fees.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.fees.fields.customer')</th>
                            <td field-key='customer'>{{ $fee->customer->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.fees.fields.room')</th>
                            <td field-key='room'>{{ $fee->room->room_number or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.fees.fields.pax')</th>
                            <td field-key='room'>{{ $fee->pax}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.fees.fields.time-from')</th>
                            <td field-key='time_from'>{{ $fee->time_from }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.fees.fields.time-to')</th>
                            <td field-key='time_to'>{{ $fee->time_to }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.fees.fields.additional-information')</th>
                            <td field-key='additional_information'>{!! $fee->additional_information !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.fees.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
