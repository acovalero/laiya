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
                            <th>@lang('quickadmin.inquiries.fields.time-from')</th>
                            <td field-key='time_from'>{{ $inquiry->time_from }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.inquiries.fields.time-to')</th>
                            <td field-key='time_to'>{{ $inquiry->time_to }}</td>
                        </tr>
                        {{-- <tr>
                            <th>@lang('quickadmin.inquiries.fields.additional-information')</th>
                            <td field-key='additional_information'>{!! $inquiry->additional_information !!}</td>
                        </tr> --}}
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>

            <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#myModal">Add Quotation</button>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" action="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="modalLabel">Add Inquiry</h4>
                            </div>

                            <div class="modal-body">
                            {!! Form::open(['method' => 'POST', 'route' => ['admin.inquiries.store']]) !!}
                            <h3 class="page-title">@lang('quickadmin.quotations.title')</h3>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    @lang('quickadmin.qa_create')
                                </div> 
                                <div class="panel-body">

                                    <!-- Room Selection -->
                                    {{-- <div class="row">
                                        <div class="col-xs-12 form-group">
                                            {!! Form::label('rooms_id', trans('quickadmin.quotations.fields.room').'', ['class' => 'control-label']) !!}
                                            {!! Form::select('rooms_id', $rooms, old('rooms_id'), ['class' => 'form-control select2']) !!}
                                            <p class="help-block"></p>
                                            @if($errors->has('rooms_id'))
                                                <p class="help-block">
                                                    {{ $errors->first('rooms_id') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div> --}}
                                
                                    <!-- Pax  -->
                                    <div class="row">
                                        <div class="col-xs-12 form-group">
                                            {!! Form::label('pax', trans('quickadmin.quotations.fields.pax').'*', ['class' => 'control-label']) !!}
                                            {!! Form::number('pax', old('pax'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                            <p class="help-block"></p>
                                            @if($errors->has('pax'))
                                                <p class="help-block">
                                                    {{ $errors->first('pax') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Fee Selection -->
                                    {{-- <div class="row">
                                        <div class="col-xs-12 form-group">
                                            {!! Form::label('fees_id', trans('quickadmin.quotations.fields.fee').'', ['class' => 'control-label']) !!}
                                            {!! Form::select('fees_id', $fees, old('fees_id'), ['class' => 'form-control select2']) !!}
                                            <p class="help-block"></p>
                                            @if($errors->has('fees_id'))
                                                <p class="help-block">
                                                    {{ $errors->first('fees_id') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            {!! Form::submit(trans('quickadmin.qa_save'), ['id' => 'check_me', 'class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}




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

        </div>

        
    </div>
@stop
