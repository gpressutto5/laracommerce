@php
    $depth = isset($depth) ? $depth : 0;
@endphp
@foreach($categories as $category)
    <option value="{{ $category->id }}">{{ str_repeat('&mdash;', $depth) }} {{ $category->name }}</option>
    @if($category->children->count())
        @include('admin.components.categories-select-option', [
            'categories' => $category->children,
            'depth' => $depth + 1,
        ])
    @endif
@endforeach

@push('js')
    <script>
      $('#parent').select2();
    </script>
@endpush
