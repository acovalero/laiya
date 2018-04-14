@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
        $('#texttwo').keyup(function(){
            var textone;
            var texttwo;
            textone = parseFloat($('#textone').val());
            texttwo = parseFloat($('#texttwo').val());
            var result = textone + texttwo;
            $('#result').val(result.toFixed(2));
    
    
        });
</script>



@section('content')

    {{-- INQUIRY --}}

    <h3 class="page-title">@lang('quickadmin.inquiries.title')</h3>
    {!! Form::model($inquiry, ['method' => 'PUT', 'route' => ['admin.inquiries.update', $inquiry->id]]) !!}


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

            <h3>Choose Room:</h3>

            {{-- ROOMS --}}
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>@lang('quickadmin.rooms.fields.room-number')</th>
                            <th>@lang('quickadmin.room_types.fields.room_type')</th>
                            <th>@lang('quickadmin.room_types.fields.rec_pax')</th>
                            <th>@lang('quickadmin.quotations.fields.pax')</th>
                            <th>Amount</th>

                            {{-- <th>Delete</th> --}}
                        </tr>
                    </thead>
                    <tbody class="resultbody">
                        <tr>
                            <td class="no">1</td>
                            <td>
                                {!! Form::label('rooms_id', trans('quickadmin.quotations.fields.room').'', ['class' => 'control-label']) !!}
                                {!! Form::select('rooms_id', $rooms, old('rooms_id'), ['class' => 'form-control select2','name'=>'rooms_id[]']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('rooms_id'))
                                    <p class="help-block">
                                        {{ $errors->first('rooms_id') }}
                                    </p>
                                @endif
                            </td>
                            <td>Room Type</td>
                            <td>Pax</td>
                            <td>
                                {!! Form::number('pax', old('pax'), ['class' => 'form-control', 'placeholder' => '0', 'required' => '','name'=>'pax[]']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('pax'))
                                    <p class="help-block">
                                        {{ $errors->first('pax') }}
                                    </p>
                                @endif
                            </td>
                            <td><p></p></td>
                           
                            {{-- <td>
                                <input type="button" class="btn btn-danger delete" value="x">
                            </td> --}}
                        </tr>

                    </tbody>
                </table>
                {{-- <center><input type="button" class="btn btn-lg btn-primary add" value="Add New Item"> --}}


                <h3>Additional Fees:</h3>    


                {{-- FEES --}}
                {{-- <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fee</th>
                                <th>Price</th>
                                <th>Quantity</th>
                              
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="resultbody2">
                            <tr>
                                <td class="no">1</td>
                                <td>
                                    {!! Form::select('fees_id', $fees, old('fees_id'), ['class' => 'form-control select2','name'=>'fees_id[]']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('fees_id'))
                                        <p class="help-block">
                                            {{ $errors->first('fees_id') }}
                                        </p>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" class="name form-control" name="name[]" value="{{ old('name') }}">
                                </td>
                                <td>
                                    {!! Form::number('pax', old('pax'), ['class' => 'form-control', 'placeholder' => '', 'required' => '','name'=>'pax[]']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('pax'))
                                        <p class="help-block">
                                            {{ $errors->first('pax') }}
                                        </p>
                                    @endif
                                </td>
                                <td>
                                    <input type="button" class="btn btn-danger delete" value="x">
                                </td>
                            </tr>
    
                        </tbody>
                    </table> --}}
                    {{-- <center><input type="button" class="btn btn-lg btn-primary add2" value="Add New Item"> --}}





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

        // For multiple rooms
        $('.add').click(function () {
            var n = ($('.resultbody tr').length - 0) + 1;
            var tr = '<tr><td class="no">' + n + '</td>' +
                    '<td>{!! Form::label('rooms_id', trans('quickadmin.quotations.fields.room').'', ['class' => 'control-label']) !!}{!! Form::select('rooms_id', $rooms, old('rooms_id'), ['class' => 'form-control select2','name'=>'rooms_id[]']) !!}<p class="help-block"></p>@if($errors->has('rooms_id'))<p class="help-block">{{ $errors->first('rooms_id') }}</p>@endif</td>'+
                    '<td>Room Type</td>'+
                    '<td>Pax</td>'+
                    '<td>{!! Form::number('pax', old('pax'), ['class' => 'form-control', 'placeholder' => '', 'required' => '','name'=>'pax[]']) !!}<p class="help-block"></p>@if($errors->has('pax'))<p class="help-block">{{ $errors->first('pax') }}</p>@endif</td>'+
                    '<td><input type="text" class="form-control" name="amount[]"></td>'+
                    '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
            $('.resultbody').append(tr);
        });
        $('.resultbody').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();
        });

        // For multiple fees
         $('.add2').click(function () {
            var n = ($('.resultbody2 tr').length - 0) + 1;
            var tr = '<tr><td class="no">' + n + '</td>' +
                    '<td>{!! Form::label('rooms_id', trans('quickadmin.quotations.fields.room').'', ['class' => 'control-label']) !!}z{!! Form::select('rooms_id', $rooms, old('rooms_id'), ['class' => 'form-control select2','name'=>'rooms_id[]']) !!}<p class="help-block"></p>@if($errors->has('rooms_id'))<p class="help-block">{{ $errors->first('rooms_id') }}</p>@endif</td>'+
                    '<td><input type="text" class="fname form-control" name="fname[]" value="{{ old('fname') }}"></td>'+
                    '<td><input type="text" class="rollno form-control" name="rollno[]" value="{{ old('rollno') }}"></td>'+
                    '<td><input type="text" class="obtainedmarks form-control" name="obtainedmarks[]" value="{{ old('email') }}"></td>'+
                    '<td><input type="text" class="totalmarks form-control" name="totalmarks[]"></td>'+
                    '<td><input type="text" class="percentage form-control" name="percentage[]"></td>'+
                    '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
            $('.resultbody2').append(tr);
        });
        $('.resultbody2').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();
        });

        // $("#calculate").click(function(){
        // var a = $('#coverstockP').val();
        // var b = $('#insidestockP').val();
        // var c = $('#coveroffsetP').val();
        // var d = $('#insideoffsetP').val();
        // var e = $('#otheroffsetP').val();
        // var f = $('#laminationP').val();
        // var g = $('#letterpressP').val();
        // var h = $('#bindingP').val();
        // var i = $('#diecutP').val();
        // var j = $('#diecutrunningP').val();
        // var k = $('#othersP').val();
        // var l = $('#quantity').val();
        // var m = $('#pagenumber').val();

        // var temp = parseInt(a, 10) + parseInt(b, 10) + parseInt(c, 10) +
        //            parseInt(d, 10) + parseInt(e, 10) + parseInt(f, 10) +
        //            parseInt(g, 10) + parseInt(h, 10) + parseInt(i, 10) +
        //            parseInt(j, 10) + parseInt(k, 10);

        // var sum = parseInt(temp, 10) * parseInt(m, 10);
        // var total = parseInt(sum, 10) * parseInt(l, 10);

        // $( "#UnitCost" ).prop( "disabled", false);
        // $('#TotalAll').prop( "disabled", false);

        // $('#UnitCost').attr('value',sum);
        // $('#TotalAll').attr('value',total);

        });

        
    </script>
@stop