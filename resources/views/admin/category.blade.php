@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>@lang('menu.categories')</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Test</h3>
                    <div class="box-tools">
                        <a href="#" class="btn btn-sm btn-primary">Add new <i class="fa fa-plus-circle tool-icon"></i></a>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    @include('admin.components.categories-table', ['categories' => $categories])
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')
    @parent
    <style>
        /*.tool-icon {*/
            /*font-size: 30px;*/
        /*}*/
    </style>
@stop
