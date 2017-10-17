<label for="parent">@lang('admin/category.parent'):</label>
<div class="input-group">
    <div class="input-group-addon">
        <i class="fa fa-level-up"></i>
    </div>
    <select name="parent" id="parent" class="form-control">
        <optgroup label="@lang('admin/category.root')">
            <option value="root">@lang('admin/category.no-parent')</option>
        </optgroup>
        <optgroup label="@lang('admin/category.child')">
            @include('admin.components.categories-select-option', ['categories' => $categories])
        </optgroup>
    </select>
    @if ($errors->has('parent'))
        <span class="help-block">
            <strong>{{ $errors->first('parent') }}</strong>
        </span>
    @endif
</div>
