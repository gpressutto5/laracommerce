@php
$depth = isset($depth) ? $depth : 0;
@endphp
@foreach($categories as $category)
    <tr data-node="treetable-{{ $category->id }}"
        @if($category->parent_id)
            data-pnode="treetable-parent-{{ $category->parent_id }}"
        @endif
    >
        <td>
            @if ($depth)
                <i class="fa fa-level-up parent-icon"></i>
            @endif
            {{ $category->id }}
        </td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->slug }}</td>
        <td>
            <a href="#" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i> @lang('admin/category.edit')</a>
            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> @lang('admin/category.delete')</a>
        </td>
    </tr>
    @if($category->children->count())
        @include('admin.components.categories-table-row', [
            'categories' => $category->children,
            'depth' => $depth + 1,
        ])
    @endif
@endforeach

@push('css')
    <style>
        .parent-icon {
            -webkit-transform:rotateY(180deg);
            -moz-transform:rotateY(180deg);
            -o-transform:rotateY(180deg);
            -ms-transform:rotateY(180deg);

            padding: 0 10px;
            color: transparent;
        }

        td .parent-icon:last-child {
            color: #bbbbbb;
        }
    </style>
@endpush
