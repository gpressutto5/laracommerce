@php
$depth = isset($depth) ? $depth : 0;
@endphp
@foreach($categories as $category)
    <form action="{{ url('admin/categories', [$category->id]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input type="hidden" name="id" value="{{ $category->id }}">
    <tr data-node="treetable-{{ $category->id }}"
        @if($category->parent_id)
            data-pnode="treetable-parent-{{ $category->parent_id }}"
        @endif
    >
            <td>
                @if ($depth)
                    <i class="fa fa-level-up parent-icon"></i>
                @endif
                <span class="should-appear" id="name-{{ $category->id }}">{{ $category->name }}</span>
                <input class="should-hide edit-input" style="display: none;" name="name" value="{{ $category->name }}" id="name-field-{{ $category->id }}">
            </td>
            <td>
                <span class="should-appear" id="slug-{{ $category->id }}">{{ $category->slug }}</span>
                <input class="should-hide edit-input" style="display: none;" name="slug" value="{{ $category->slug }}" id="slug-field-{{ $category->id }}">
            </td>
            <td>
                <button id="save-{{ $category->id }}" style="display: none;" href="#" class="btn btn-sm btn-default should-hide" title="@lang('admin/category.save')"><i class="fa fa-floppy-o"></i></button>
                <a id="cancel-{{ $category->id }}" style="display: none;" href="#" class="btn btn-sm btn-default should-hide" onclick="event.preventDefault();update_fields({{ $category->id }}, 'cancel');" title="@lang('admin/category.cancel')"><i class="fa fa-times"></i></a>
                <a id="edit-{{ $category->id }}" href="#" class="btn btn-sm btn-default should-appear" onclick="event.preventDefault();update_fields({{ $category->id }}, 'edit');" title="@lang('admin/category.edit')"><i class="fa fa-pencil"></i></a>
                <button id="delete-{{ $category->id }}" href="#" class="btn btn-sm btn-default should-appear" title="@lang('admin/category.delete')" onclick="delete_button('@lang('admin/category.confirm', ['category' => $category->name])')"><i class="fa fa-trash"></i></button>
            </td>
    </tr>
    </form>
    @if($category->children->count())
        @include('admin.components.categories-table-row', [
            'categories' => $category->children,
            'depth' => $depth + 1,
        ])
    @endif
@endforeach
