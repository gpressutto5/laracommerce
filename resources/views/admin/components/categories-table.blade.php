<table class="table table-hover table-striped" id="category-table">
    <thead>
    <tr data-level="header">
        <th>@lang('admin/category.name')</th>
        <th>@lang('admin/category.slug')</th>
        <th>@lang('admin/category.actions')</th>
    </tr>
    </thead>
    <tbody>
    @include('admin.components.categories-table-row', ['categories' => $categories])
    </tbody>
</table>

@push('css')
    <link rel="stylesheet" href="//www.jqueryscript.net/demo/jQuery-Plugin-To-Create-Collapsible-Bootstrap-Tables-Bootstrap-TreeFy/dist/css/bootstrap-treefy.css">
@endpush

@push('js')
    <script src="//www.jqueryscript.net/demo/jQuery-Plugin-To-Create-Collapsible-Bootstrap-Tables-Bootstrap-TreeFy/dist/bootstrap-treefy.js"></script>
    <script>
      $('#category-table').treeFy();
    </script>
@endpush
