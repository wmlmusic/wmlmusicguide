<style type="text/css">.error{color:red;}</style>
<!--start content-outer ........START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?php echo ucwords($data['formStatus']) ?> Post</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content" style="border:0px solid red">		
				<?php
					// echo "<pre>"; print_r($data);
				?>				
				<form id="postForm" action="postcontroller.php" method="post" enctype="multipart/form-data">
					<!-- start id-form -->
					<table border="0" width="100%" cellpadding="0" cellspacing="0"  id="id-form">
					<tr>
						<th valign="top">Post Title:</th>
						<td><input type="text" class="inp-form required" name="name" value="<?php if(isset($data['row']['name'])) echo $data['row']['name']; ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Description:</th>
						<td><textarea class="form-textarea" cols="" rows="" name="details"><?php if(isset($data['row']['details'])) echo $data['row']['details']; ?></textarea></td>
						<td></td>
					</tr>
					<tr>
						<th valign="top">URL:</th>
						<td><input type="url" class="inp-form" name="postlink" value="<?php if(isset($data['row']['post_link'])) echo $data['row']['post_link']; ?>" /></td>
					</tr>	
					<tr>
						<th valign="top">Client:</th>
						<td>
						<?php
							//$sql="SELECT aname,id FROM artists"; 

							$sql="SELECT aname,id FROM artists order by aname"; 
							echo "<select name=client value=''>Select Client</option>"; // list box select command
							foreach ($data['rows'] as $key => $value){//Array or records stored in $row
							echo "<option value=$data['id']>$data['aname']</option>"; 
							/* Option values are added by looping through the array */ 
							}
							echo "</select>";// Closing of list box
						?>
						</td>
					</tr>					
					<tr>
						<th>Video File Upload:</th>
						<td width="250">
						<!-- The file upload form used as target for the file upload widget -->
						<form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
						<!-- Redirect browsers with JavaScript disabled to the origin page -->
						<noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
						<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
						<div class="fileupload-buttonbar">
							<div class="fileupload-buttons">
								<!-- The fileinput-button span is used to style the file input field as button -->
								<span class="fileinput-button">
								<span>Add files...</span>
									<input type="file" name="files[]" multiple>
								</span>
								</br>
								<button type="submit" class="start">Start upload</button>
								<button type="reset" class="cancel">Cancel upload</button>
								<button type="button" class="delete">Delete</button>
								<input type="checkbox" class="toggle">
								<!-- The global file processing state -->
								<span class="fileupload-process"></span>
							</div>
							<!-- The global progress state -->
							<div class="fileupload-progress fade" style="display:none">
								<!-- The global progress bar -->
								<div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								<!-- The extended global progress state -->
								<div class="progress-extended">&nbsp;</div>
							</div>
						</div>						
						<!-- The table listing the files available for upload/download -->
						
						<table role="presentation"><tbody class="files"><textarea cols="60"></textarea></tbody></table>
						
						</form>	
						</td>
						<td>
						<form>
						<label for="theme-switcher">Theme:</label>
						<select id="theme-switcher" class="pull-right">
							<option value="black-tie">Black Tie</option>
							<option value="blitzer">Blitzer</option>
							<option value="cupertino">Cupertino</option>
							<option value="dark-hive" selected>Dark Hive</option>
							<option value="dot-luv">Dot Luv</option>
							<option value="eggplant">Eggplant</option>
							<option value="excite-bike">Excite Bike</option>
							<option value="flick">Flick</option>
							<option value="hot-sneaks">Hot sneaks</option>
							<option value="humanity">Humanity</option>
							<option value="le-frog">Le Frog</option>
							<option value="mint-choc">Mint Choc</option>
							<option value="overcast">Overcast</option>
							<option value="pepper-grinder">Pepper Grinder</option>
							<option value="redmond">Redmond</option>
							<option value="smoothness">Smoothness</option>
							<option value="south-street">South Street</option>
							<option value="start">Start</option>
							<option value="sunny">Sunny</option>
							<option value="swanky-purse">Swanky Purse</option>
							<option value="trontastic">Trontastic</option>
							<option value="ui-darkness">UI Darkness</option>
							<option value="ui-lightness">UI Lightness</option>
							<option value="vader">Vader</option>
						</select>
						</form>
						</td>
					</tr>
					<?php if(isset($data['row'])){?>
					<tr>
						<th valign="top">Picture:</th>
						<td><?php if($data['post']) echo "<img src = '../../uploads/post_{$data['row']['id']}.jpg' width='125' />"; ?></td>
					</tr>
					<?php } ?>
					<tr>
						<th valign="top">Category:</th>
						<td>
							<select name="category">
								<option value="">Select option</option>
								<option value="music" <?php if(isset($data['row']['category']) && $data['row']['category'] == 'music') echo "selected";  ?>>Music</option>
								<option value="video" <?php if(isset($data['row']['category']) && $data['row']['category'] == 'video') echo "selected";  ?>>Video</option>
							</select>
						</td>
					</tr>
					<tr>
						<th valign="top">Status:</th>
						<td>
							<select name="status">
								<option value="1" <?php if(isset($data['row']['status']) && $data['row']['status'] == '1') echo "selected";  ?>>Active</option>
								<option value="0" <?php if(isset($data['row']['status']) && $data['row']['status'] == '0') echo "selected";  ?>>Inactive</option>
							</select>
						</td>
					</tr>

					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="submit" value="" class="form-submit" />
							<input id="restform" class="form-reset">
							<a href="post.php" class="form-cancel">Cancel</a>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					</table>
					<input type="hidden" name="form" value="<?php echo $data['formStatus'] ?>" />
					<input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?>" />
				</form>
			</div>
			
			<div class="clear"></div>
			
			<!-- The blueimp Gallery widget -->
			<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
				<div class="slides"></div>
					<h3 class="title"></h3>
					<a class="prev">‹</a>
					<a class="next">›</a>
					<a class="close">×</a>
					<a class="play-pause"></a>
					<ol class="indicator"></ol>
				</div>		
			</div>			
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer......END -->
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress"></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="start" disabled>Start</button>
            {% } %}
            {% if (!i) { %}
                <button class="cancel">Cancel</button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
            </p>
            {% if (file.error) { %}
                <div><span class="error">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            <button class="delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Delete</button>
            <input type="checkbox" name="delete" value="1" class="toggle">
        </td>
    </tr>
{% } %}
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="../viewer_admin/plugins/jQuery-File-Upload-master/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="../viewer_admin/plugins/jQuery-File-Upload-master/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="../viewer_admin/plugins/jQuery-File-Upload-master/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="../viewer_admin/plugins/jQuery-File-Upload-master/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="../viewer_admin/plugins/jQuery-File-Upload-master/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="../viewer_admin/plugins/jQuery-File-Upload-master/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="../viewer_admin/plugins/jQuery-File-Upload-master/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="../viewer_admin/plugins/jQuery-File-Upload-master/js/jquery.fileupload-ui.js"></script>
<!-- The File Upload jQuery UI plugin -->
<script src="../viewer_admin/plugins/jQuery-File-Upload-master/js/jquery.fileupload-jquery-ui.js"></script>
<!-- The main application script -->
<script src="../viewer_admin/plugins/jQuery-File-Upload-master/js/main.js"></script>
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 999000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
// Initialize the jQuery UI theme switcher:
$('#theme-switcher').change(function () {
    var theme = $('#theme');
    theme.prop(
        'href',
        theme.prop('href').replace(
            /[\w\-]+\/jquery-ui.css/,
            $(this).val() + '/jquery-ui.css'
        )
    );
});
// Post Form Validate
	$(document).ready(function () {
		$('#postForm').validate({
			errorElement: "div",
			rules: {
			    name: { required: true },
			    details: { required: true },
			    category: { required: true }
		  	}
		});
		$('#restform').click(function(){
            $('#postForm')[0].reset();
 		});
	});
</script>