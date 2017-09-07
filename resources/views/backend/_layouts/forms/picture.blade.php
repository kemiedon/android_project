<!-- https://www.abeautifulsite.net/whipping-file-inputs-into-shape-with-bootstrap-3 -->
<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>
<div class="form-group {{ $errors->has($name) ? 'has-error' : NULL }}">
    <label for="{{ $name }}" class="col-sm-2 control-label">{{ $label }}</label>
    <div class="col-sm-10">
    <span class="btn btn-default btn-file">
        {{ Lang::get('app.button.browse') }} <input type="file" id="{{ $name }}" name="{{ $name }}" onchange="upload_img_{{ $name }} (this);">
    </span>
        <small class="text-muted">{{ $desc }}</small>

        <div>
            <img id="{{ $name }}_preview" width="100" style="margin-top: 8px;"
                @if ($value != '')
                src="{{ asset($upload_path.$value) }}"
                @else
                src="http://placehold.it/100x100"
                @endif
            />
        </div>

@if($errors->has($name))
        <div class="text-danger with-errors">{{ $errors->first($name) }}</div>
@endif

    </div>
</div>

@if($delete_box)
<div class="form-group {{ $errors->has($name) ? 'has-error' : NULL }}">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="delete_{{ $name }}" value="1" >
                刪除此圖
            </label>
        </div>
    </div>
</div>
@endif

<script type="text/javascript">
    function upload_img_{{ $name }} (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#{{ $name }}_preview').attr('src', e.target.result);
                    console.log(e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
