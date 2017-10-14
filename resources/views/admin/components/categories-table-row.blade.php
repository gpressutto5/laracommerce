@php
$depth = isset($depth) ? $depth : 0;
@endphp
@foreach($categories as $category)
    <tr>
        <td>
            @for ($i = 0; $i < $depth; $i++)
                <i class="fa fa-level-up parent-icon"></i>
            @endfor
            {{ $category->id }}
        </td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->slug }}</td>
        <td><a href="#">Edit</a> <a href="#">Delete</a></td>
    </tr>
    @if($category->children->count())
        @include('admin.components.categories-table-row', [
            'categories' => $category->children,
            'depth' => $depth + 1,
        ])
    @endif
@endforeach

@section('css')
    @parent
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
@endsection
