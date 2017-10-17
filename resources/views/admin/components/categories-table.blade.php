<table class="table table-hover table-striped" id="category-table">
    <thead>
    <tr data-level="header">
        <th>@lang('admin/category.name')</th>
        <th width="30%">@lang('admin/category.slug')</th>
        <th width="110px">@lang('admin/category.actions')</th>
    </tr>
    </thead>
    <tbody>
    @include('admin.components.categories-table-row', ['categories' => $categories])
    </tbody>
</table>

@push('css')
    <link rel="stylesheet" href="//www.jqueryscript.net/demo/jQuery-Plugin-To-Create-Collapsible-Bootstrap-Tables-Bootstrap-TreeFy/dist/css/bootstrap-treefy.css">
    <style>
        .parent-icon {
            -webkit-transform:rotateY(180deg);
            -moz-transform:rotateY(180deg);
            -o-transform:rotateY(180deg);
            -ms-transform:rotateY(180deg);

            padding: 0 10px;
            color: #bbbbbb;
        }

        .edit-input {
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background: #fff none;
            border: 1px solid #ccc;
        }
        .edit-input:focus {
            border-color: #3c8dbc;
            box-shadow: none;
            outline: 0;
        }
    </style>
@endpush

@push('js')
    <script src="//www.jqueryscript.net/demo/jQuery-Plugin-To-Create-Collapsible-Bootstrap-Tables-Bootstrap-TreeFy/dist/bootstrap-treefy.js"></script>
    <script>
      $('#category-table').treeFy();
    </script>
    <script>
        var reset_fields = function () {
          $shouldAppear = document.getElementsByClassName('should-appear');
          for (var i = 0; i < $shouldAppear.length; i++) {
            $shouldAppear[i].style.display = 'inline-block';
          }
          $shouldHide = document.getElementsByClassName('should-hide');
          for (var i = 0; i < $shouldHide.length; i++) {
            $shouldHide[i].style.display = 'none';
          }
        };

        var update_fields = function (id, mode) {
          reset_fields();
          var nameSpan = document.getElementById('name-' + id);
          var nameField = document.getElementById('name-field-' + id);
          var slugSpan = document.getElementById('slug-' + id);
          var slugField = document.getElementById('slug-field-' + id);
          var editButton = document.getElementById('edit-' + id);
          var cancelButton = document.getElementById('cancel-' + id);
          var saveButton = document.getElementById('save-' + id);
          var deleteButton = document.getElementById('delete-' + id);

          var normalMode = [
            nameSpan,
            slugSpan,
            deleteButton,
            editButton,
          ];

          var editMode = [
            nameField,
            slugField,
            cancelButton,
            saveButton,
          ];

          normalMode.forEach(function (element) {
            console.log(element);
            element.style.display = mode === 'edit' ? 'none' : 'inline-block';
          });

          editMode.forEach(function (element) {
            element.style.display = mode === 'edit' ? 'inline-block' : 'none';
          });

        };
    </script>
@endpush
