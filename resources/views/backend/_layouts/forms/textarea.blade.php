<div class="form-group @if($errors->has($name)) has-error @endif">
	<label for="{{ $name }}" class="col-sm-2 control-label">{{ $label }}</label>
	<div class="col-sm-10">
		<textarea class="form-control" rows="{{ $rows }}" id="{{ $name }}" name="{{ $name }}" data-minlength="{{ $min_length }}" data-error="{{ $error_message }}" @if($required == 'required') required @endif>{{ $value }}</textarea>
		<small class="text-muted">{{ $desc }}</small>
		<div class="text-danger with-errors">
			@if($errors->has($name))
				{{ $errors->first($name) }}
			@endif
		</div>
	</div>
</div>
