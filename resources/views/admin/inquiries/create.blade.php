@extends('layouts.app')




@section('content')

    {{-- INQUIRY --}}

    <h3 class="page-title">@lang('quickadmin.inquiries.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.inquiries.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div> 
        <div class="panel-body">
            {{-- Customer --}}
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('customer_id', trans('quickadmin.inquiries.fields.customer').'', ['class' => 'control-label']) !!}
                    {!! Form::select('customer_id', $customers, old('customer_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('customer_id'))
                        <p class="help-block">
                            {{ $errors->first('customer_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Room Selection -->
            {{-- <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rooms_id', trans('quickadmin.inquiries.fields.room').'', ['class' => 'control-label']) !!}
                    {!! Form::select('rooms_id', $rooms, old('rooms_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rooms_id'))
                        <p class="help-block">
                            {{ $errors->first('rooms_id') }}
                        </p>
                    @endif
                </div>
            </div> --}}

            <!-- Check in -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('time_from', trans('quickadmin.inquiries.fields.time-from').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('time_from', old('time_from'), ['id' => 'checkin', 'class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('time_from'))
                        <p class="help-block">
                            {{ $errors->first('time_from') }}
                        </p>
                    @endif
                </div>
            </div>
            {{-- Check out --}}
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('time_to', trans('quickadmin.inquiries.fields.time-to').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('time_to', old('time_to'), ['id' => 'checkout', 'class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('time_to'))
                        <p class="help-block">
                            {{ $errors->first('time_to') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>  
    </div>
  
    {{-- QUOTATION --}}
    
    <h3 class="page-title">@lang('quickadmin.quotations.title')</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div> 
        <div class="panel-body">

            <!-- Room Selection -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rooms_id', trans('quickadmin.quotations.fields.room').'', ['class' => 'control-label']) !!}
                    {!! Form::select('rooms_id', $rooms, old('rooms_id'), ['class' => 'form-control select2','name'=>'rooms_id[]']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rooms_id'))
                        <p class="help-block">
                            {{ $errors->first('rooms_id') }}
                        </p>
                    @endif
                </div>
            </div>
        
            <!-- Pax  -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pax', trans('quickadmin.quotations.fields.pax').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('pax', old('pax'), ['class' => 'form-control', 'placeholder' => '', 'required' => '','name'=>'pax[]']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pax'))
                        <p class="help-block">
                            {{ $errors->first('pax') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Fee Selection -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fees_id', trans('quickadmin.quotations.fields.fee').'', ['class' => 'control-label']) !!}
                    {!! Form::select('fees_id', $fees, old('fees_id'), ['class' => 'form-control select2','name'=>'fees_id[]']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fees_id'))
                        <p class="help-block">
                            {{ $errors->first('fees_id') }}
                        </p>
                    @endif
                </div>
            </div>



            <!-- Room Selection -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rooms_id', trans('quickadmin.quotations.fields.room').'', ['class' => 'control-label']) !!}
                    {!! Form::select('rooms_id', $rooms, old('rooms_id'), ['class' => 'form-control select2','name'=>'rooms_id[]']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rooms_id'))
                        <p class="help-block">
                            {{ $errors->first('rooms_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Pax  -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pax', trans('quickadmin.quotations.fields.pax').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('pax', old('pax'), ['class' => 'form-control', 'placeholder' => '', 'required' => '','name'=>'pax[]']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pax'))
                        <p class="help-block">
                            {{ $errors->first('pax') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Fee Selection -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fees_id', trans('quickadmin.quotations.fields.fee').'', ['class' => 'control-label']) !!}
                    {!! Form::select('fees_id', $fees, old('fees_id'), ['class' => 'form-control select2','name'=>'fees_id[]']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fees_id'))
                        <p class="help-block">
                            {{ $errors->first('fees_id') }}
                        </p>
                    @endif
                </div>
            </div>


            <!-- Room Selection -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rooms_id', trans('quickadmin.quotations.fields.room').'', ['class' => 'control-label']) !!}
                    {!! Form::select('rooms_id', $rooms, old('rooms_id'), ['class' => 'form-control select2','name'=>'rooms_id[]']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rooms_id'))
                        <p class="help-block">
                            {{ $errors->first('rooms_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Pax  -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pax', trans('quickadmin.quotations.fields.pax').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('pax', old('pax'), ['class' => 'form-control', 'placeholder' => '', 'required' => '','name'=>'pax[]']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pax'))
                        <p class="help-block">
                            {{ $errors->first('pax') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Fee Selection -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fees_id', trans('quickadmin.quotations.fields.fee').'', ['class' => 'control-label']) !!}
                    {!! Form::select('fees_id', $fees, old('fees_id'), ['class' => 'form-control select2','name'=>'fees_id[]']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fees_id'))
                        <p class="help-block">
                            {{ $errors->first('fees_id') }}
                        </p>
                    @endif
                </div>
            </div>



        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['id' => 'check_me', 'class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
   
    
@stop

@section('javascript')
    @parent
    
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    
   
    <script>

        $(document).ready(function(){
            $('.datetimepicker').datetimepicker({
            format: "YYYY-MM-DD HH:mm"

            // $('.daterange').datetimepicker({
            // format: "YYYY-MM-DD"
        });

        $("#check_me").on('click', function(){
            var checkin = $("#checkin").val();
            var checkout = $("#checkout").val();
            // var room = $("#room").val();
            // var type = $("#change_room").val();

            if(checkin > checkout){
                alert("Im sorry , please choose the present or future date for reservation");
                return false;
            }
            var d = new Date();
            var date = d.getFullYear() + "-" +0+parseInt( d.getUTCMonth() + 1 )   + "-" + d.getDate();
            if(checkin < date){
                alert("Im sorry , please choose the present or future date for reservation");
                return false;
            }
        });

        });

        
    </script>
@stop