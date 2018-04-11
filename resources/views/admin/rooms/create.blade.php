@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.rooms.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.rooms.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('room_number', trans('quickadmin.rooms.fields.room-number').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('room_number', old('room_number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('room_number'))
                        <p class="help-block">
                            {{ $errors->first('room_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('room_types_id', trans('quickadmin.rooms.fields.room_type').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('room_types_id', $room_types, old('room_types_id'), ['class' => 'form-control select2', 'required' => '']) !!}

                    <p class="help-block"></p>
                    @if($errors->has('room_types_id'))
                        <p class="help-block">
                            {{ $errors->first('room_types_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('status', trans('quickadmin.rooms.fields.status').'*', ['class' => 'control-label']) !!}
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

