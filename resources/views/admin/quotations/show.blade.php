@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.quotations.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.quotations.fields.customer')</th>
                            <td field-key='customer'>{{ $quotation->customer->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.quotations.fields.room')</th>
                            <td field-key='room'>{{ $quotation->room->room_number or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.quotations.fields.pax')</th>
                            <td field-key='room'>{{ $quotation->pax}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.quotations.fields.time-from')</th>
                            <td field-key='time_from'>{{ $quotation->time_from }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.quotations.fields.time-to')</th>
                            <td field-key='time_to'>{{ $quotation->time_to }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.quotations.fields.additional-information')</th>
                            <td field-key='additional_information'>{!! $quotation->additional_information !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.quotations.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
