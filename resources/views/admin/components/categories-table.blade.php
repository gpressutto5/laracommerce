<table class="table table-hover" id="category-table">
    <thead>
    <tr data-level="header">
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @include('admin.components.categories-table-row', ['categories' => $categories])
    </tbody>
</table>

@section('css')
    <link rel="stylesheet" href="//www.jqueryscript.net/demo/jQuery-Plugin-To-Create-Collapsible-Bootstrap-Tables-Bootstrap-TreeFy/dist/css/bootstrap-treefy.css">
@stop

@section('js')
    <script src="//www.jqueryscript.net/demo/jQuery-Plugin-To-Create-Collapsible-Bootstrap-Tables-Bootstrap-TreeFy/dist/bootstrap-treefy.js"></script>
    <script>
      $('#category-table').treeFy();
    </script>
@stop
