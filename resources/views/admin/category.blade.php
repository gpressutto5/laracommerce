@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>@lang('menu.categories')</h1>
@stop

@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <form action="#" method="post">
                    {!! csrf_field() !!}
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin/category.new')</h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <!-- Name field -->
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">@lang('admin/category.name'):</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-tag"></i>
                                </div>
                                <input id="name" name="name" class="form-control" placeholder="@lang('admin/category.name')" value="{{ old('name') }}">
                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Slug field -->
                        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            <label for="slug">@lang('admin/category.slug'):</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-link"></i>
                                </div>
                                <input id="slug" name="slug" class="form-control" placeholder="@lang('admin/category.slug')" value="{{ old('slug') }}">
                            </div>
                            @if ($errors->has('slug'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slug') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Parent field -->
                        <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                            @include('admin.components.categories-select', ['categories' => $categories])
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="box-tools">
                            <button class="btn btn-success">@lang('admin/category.create')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin/category.title')</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    @include('admin.components.categories-table', ['categories' => $categories])
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
      function string_to_slug(str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to   = "aaaaeeeeiiiioooouuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
          str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
          .replace(/\s+/g, '-') // collapse whitespace and replace by -
          .replace(/-+/g, '-'); // collapse dashes

        return str;
      }

        $('#name').on('keyup', function() {
          var name = $('#name').val();
          $('#slug').val(string_to_slug(name));
        });
    </script>
@endpush
