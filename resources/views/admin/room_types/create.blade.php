@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.room_types.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.room_types.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('room_type', trans('quickadmin.room_types.fields.room_type').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('room_type', old('room_type'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('room_type'))
                        <p class="help-block">
                            {{ $errors->first('room_type') }}
                        </p>
                    @endif
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('status', trans('quickadmin.rooms.fields.status').'*', ['class' => 'control-label']) !!}
                    {{ Form::select('status', [
                    'Available' => 'Available',
                    'Pending' => 'Pending', 
                    'Booked' => 'Booked',
                    'Maintenance' => 'Maintenance'
                    ], null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) }}
                    
                    <p class="help-block"></p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('floor', trans('quickadmin.rooms.fields.floor').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('floor', old('floor'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('floor'))
                        <p class="help-block">
                            {{ $errors->first('floor') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('quickadmin.rooms.fields.description').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div> -->

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', trans('quickadmin.room_types.fields.price').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('price', old('price'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rec_pax', trans('quickadmin.room_types.fields.rec_pax').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('rec_pax', old('rec_pax'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rec_pax'))
                        <p class="help-block">
                            {{ $errors->first('rec_pax') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('max_pax', trans('quickadmin.room_types.fields.max_pax').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('max_pax', old('max_pax'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('max_pax'))
                        <p class="help-block">
                            {{ $errors->first('max_pax') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

