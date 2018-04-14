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
                            <th>@lang('quickadmin.fees.fields.name')</th>
                            <td field-key='name'>{{ $fee->$fee_types->name}}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.fees.fields.price')</th>
                            <td field-key='price'>{{ $fee->price}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.fees.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
