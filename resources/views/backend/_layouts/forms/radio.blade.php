<div class="form-group {{ $errors->has($name) ? 'has-error' : NULL }}">
    <label class="col-sm-2 control-label">{{ $label }}</label>
    <div class="col-sm-10">
@foreach ($data_provider as $radio_value => $radio_label)
        <label class="radio-inline">
            <input type="radio" name="{{ $name }}" value="{{ $radio_value }}" {{ $radio_value == $value ? 'checked' : NULL }}>{{ $radio_label }}
        </label>
@endforeach
        <small class="text-muted clearfix">{{ $desc }}</small>
@if($errors->has($name))
        <div class="text-danger with-errors">{{ $errors->first($name) }}</div>
@endif
    </div>
</div>




