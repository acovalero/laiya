@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.fees.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.fees.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fee_number', trans('quickadmin.fees.fields.fee-number').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('fee_number', old('fee_number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fee_number'))
                        <p class="help-block">
                            {{ $errors->first('fee_number') }}
                        </p>
                    @endif
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fee_types_id', trans('quickadmin.fees.fields.fee_type').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('fee_types_id', $fee_types, old('fee_types_id'), ['class' => 'form-control select2', 'required' => '']) !!}

                    <p class="help-block"></p>
                    @if($errors->has('fee_types_id'))
                        <p class="help-block">
                            {{ $errors->first('fee_types_id') }}
                        </p>
                    @endif
                </div>
            </div> --}}

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('status', trans('quickadmin.fees.fields.status').'*', ['class' => 'control-label']) !!}
                    {{ Form::select('status', [
                    'Available' => 'Available',
                    'Pending' => 'Pending', 
                    'Booked' => 'Booked',
                    'Maintenance' => 'Maintenance'
                    ], '0', ['class' => 'form-control', 'required' => '']) }}
                    
                    <p class="help-block"></p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                </div>
            </div>

        



        
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

