<div class="form-group {{ $errors->has($name) ? 'has-error' : NULL }}">
    <label for="{{ $name }}" class="col-sm-2 control-label">{{ $label }}</label>
    <div class="col-sm-10">
        <select class="form-control" id="{{ $name }}" name="{{ $name }}">
            <option value="">---請選擇---</option>
@foreach ($data_provider as $option_value => $option)
            <option value="{{ $option_value }}" {{ $option_value === $value ? 'selected' : NULL }}>{{ $option }}</option>
@endforeach
        </select>
        <small class="text-muted">{{ $desc }}</small>
@if($errors->has($name))
        <div class="text-danger with-errors">{{ $errors->first($name) }}</div>
@endif
    </div>
</div>
