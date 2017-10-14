<table class="table table-hover">
    <thead>
    <tr>
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
