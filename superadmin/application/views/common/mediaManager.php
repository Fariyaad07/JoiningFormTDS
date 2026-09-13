

<!--===========================Media Manager=========================-->
<div id="mediaManager" class="modal fade" tabindex="-1" data-width="760">
	<form id="fileupload" class="horizontal-form" action="<?=base_url()?>fileupload/index/" method="POST" enctype="multipart/form-data">
		<div class="modal-header">
			<table id="dropZone" style="border-radius: 30px;border: 1px solid #e7ecf1;width: 100%;height: 150px;text-align: center;background-color: #062f1d26;border-style: dashed;border-width: thick;border-color: black;">
				<tr>
					<td>
						<h2>Drop files here</h2>
						<div class="fileupload-buttonbar">
							<span class="btn green fileinput-button">
							<i class="fa fa-plus"></i>
							<span> Add files... </span>
							<input type="file" name="files[]" multiple=""> </span>
							<button type="submit" class="btn blue start">
							<i class="fa fa-upload"></i>
							<span> Start upload </span>
							</button>
							<button type="reset" class="btn dark cancel">
							<i class="fa fa-ban-circle"></i>
							<span> Cancel upload </span>
							</button>
							<!--<button type="button" class="btn red delete">
							<i class="fa fa-trash"></i>
							<span> Delete Checked</span>
							</button>
							<button type="button" class="btn yellow">
							<input type="checkbox" class="toggle">
							<span> Select All</span>
							</button>-->
							<!-- The global file processing state -->
							<span class="fileupload-process"> </span>
						</div>
						
							<div class="col-lg-12 fileupload-progress fade">
								<!-- The global progress bar -->
								<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
									<div class="progress-bar progress-bar-success" style="width:0%;"> </div>
								</div>
								<!-- The extended global progress information -->
								<div class="progress-extended"> &nbsp; </div>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div class="modal-body" style="height:500px">
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN FORM-->
					<div class="form-body">
						<div class="row">
						<center>
							<table role="presentation" class="table table-striped table-bordered table-hover" style="width:97%;text-align: center;">
								<thead>
									<tr>
										<th style="width:20%;text-align: center;"> Preview </th>
										<th style="width:30%;text-align: center;"> File Name </th>
										<th style="width:20%;text-align: center;"> Size/Process </th>
										<th style="width:30%;text-align: center;"> Actions </th>
									</tr>
								</thead>
								<tbody class="files">
								</tbody>
							</table>
						</center>
					</div>
					<!-- END FORM-->
					<!-- The blueimp Gallery widget -->
					<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
						<div class="slides"> </div>
						<h3 class="title"></h3>
						<a class="prev"> ‹ </a>
						<a class="next"> › </a>
						<a class="close white"> </a>
						<a class="play-pause"> </a>
						<ol class="indicator"> </ol>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!--****************Script*****************-->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script id="template-upload" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
	<tr class="template-upload fade">
		<td>
			<span class="preview"></span>
		</td>
		<td>
			<p class="name">{%=file.name%}</p>
			<strong class="error label label-danger"></strong>
		</td>
		<td>
			<p class="size">Processing...</p>
			<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
				<div class="progress-bar progress-bar-success" style="width:0%;"></div>
			</div>
		</td>
		<td> {% if (!i && !o.options.autoUpload) { %}
			<button class="btn blue start" disabled>
				<i class="fa fa-upload"></i>
				<span>Start</span>
			</button> {% } %} {% if (!i) { %}
			<button class="btn red cancel">
				<i class="fa fa-ban"></i>
				<span>Cancel</span>
			</button> {% } %} </td>
	</tr> {% } %} 
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
	<tr class="template-download fade">
		<td>
			<span class="preview"> {% if (file.thumbnailUrl) { %}
				<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery>
					<img src="{%=file.thumbnailUrl%}">
				</a> {% } %} </span>
		</td>
		<td>
			<p class="name"> {% if (file.url) { %}
				<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
				<span>{%=file.name%} </span> {% } %} </p> {% if (file.error) { %}
			<div>
				<span class="label label-danger">Error</span> {%=file.error%}</div> {% } %} 
		</td>
		<td>
			<span class="size">{%=o.formatFileSize(file.size)%}</span>
		</td>
		<td> {% if (file.deleteUrl) { %}
			<span class="btn green btn-sm" data-name="{%=file.name%}" onclick="
			mediaSelect(this.getAttribute('data-name'))">
				<i class="fa fa-check"></i>
				<span>Select</span>
			</span>
			<button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
				<i class="fa fa-trash-o"></i>
				<span>Delete</span>
			</button>
			<!--<input type="checkbox" name="delete" value="1" class="toggle">--> {% } else { %}
			<button class="btn yellow cancel btn-sm">
				<i class="fa fa-ban"></i>
				<span>Cancel</span>
			</button> {% } %} </td>
	</tr> {% } %} 
</script>


<script type="text/javascript">
  function openMediaModal(media_field_id)
  {
	 $('#mediaManager').modal('show');
	 sessionStorage.setItem("media_field_id", media_field_id);
  }
	
function mediaSelect(fileName){
	document.getElementById(sessionStorage.getItem("media_field_id")).value='<?=$this->session->userdata("admin_session_dir");?>/' + fileName;
	$('#mediaManager').modal('hide');
	document.getElementById("image_preview").src = '<?=file_upload_base_url($this->session->userdata("admin_session_dir").'/');?>' + fileName;
}
	
function mediaRemove(media_field_id){
	document.getElementById(media_field_id).value="";
}
</script>

