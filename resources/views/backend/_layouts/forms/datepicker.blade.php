<div class="form-group {{ $errors->has($name) ? 'has-error' : NULL }}">
    <label for="{{ $name }}" class="col-sm-2 control-label">{{ $label }}</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}">
        <small class="text-muted">{{ $desc }}</small>
@if($errors->has($name))
        <div class="text-danger with-errors">{{ $errors->first($name) }}</div>
@endif
        <script>
            $("#{{ $name }}").datepicker({ dateFormat: "{{ $date_format }}" });
            $("#{{ $name }}").datepicker("option", $.datepicker.regional[ "{{ App::getLocale() }}" ]);
        </script>
    </div>
</div>
