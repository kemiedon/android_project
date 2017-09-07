<div class="form-group {{ $errors->has($name) ? 'has-error' : NULL }}">
	<label for="{{ $name }}" class="col-sm-2 control-label">{{ $label }}</label>
	<div class="col-sm-10">
		<textarea class="form-control" rows="{{ $rows }}" id="{{ $name }}" name="{{ $name }}" data-minlength="{{ $min_length }}">{{ $value }}</textarea>
		<small class="text-muted">{{ $desc }}</small>
@if($errors->has($name))
        <div class="text-danger with-errors">{{ $errors->first($name) }}</div>
@endif

		<script>
		  tinymce.init({
				subfolder: '',
		    selector: '#{{ $name }}',
				language: '{{ App::getLocale() }}',
				height: '360px',
				menubar: false,
				plugins: [ // 不要使用 fullpage
								"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
								"searchreplace visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
								"table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern youTube sh4tinymce filemanager image_fm link_fm media_fm"
				],
				toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontsizeselect table image",
				// toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink youTube image code | forecolor backcolor | fullscreen sh4tinymce image_fm",
				toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink | forecolor backcolor | fullscreen",

				// content_css: '{{ asset('css/tinymce_content.css') }}',
				paste_enable_default_filters: false,
				// table_appearance_options: true,
				// force_hex_style_colors: true,
				// valid_classes: {},
				invalid_styles: 'mso-yfti-tbllook mso-padding-alt mso-yfti-lastrow mso-yfti-irow mso-yfti-firstrow mso-yfti-lastfirstrow mso-border-bottom-themecolor mso-border-bottom-themetint mso-yfti-cnfc mso-background-themecolor mso-fareast-language mso-border-right-themecolor mso-border-right-themetint mso-border-top-alt mso-border-top-themecolor mso-border-top-themetint mso-border-bottom-alt mso-border-right-alt mso-background-themetint mso-border-left-alt mso-border-left-themecolor mso-border-left-themetint mso-border-alt mso-border-themecolor mso-border-themetint mso-bidi-font-size padding',
				valid_elements : 'em,table[style],tr[style],td[style],p[style],strong/b,u,sub,sup,span[style],pre[class|contenteditable],ol,li',
				setup: function (ed) {
	        ed.on('init', function(args) {
						// $('#{{ $name }}').css({
						// 	'display'  : 'block',
						// 	'position' : 'fixed',
						// 	'left'     : '-99999px',
						// });
	        });
	    	}
		  });
	  </script>
	</div>
</div>
