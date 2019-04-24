@extends('layouts.app')
@push('head.scripts')
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=re1puig8wwns5dt6o4ys4k2pmzmltdnmw4xhbctutrdcazl4"></script>
    <script>
		tinymce.init({
		    selector: '#content',
		    plugins : 'autolink link image imagetools lists charmap preview table emoticons checklist wordcount',
		    toolbar: "numlist bullist checklist emoticons wordcount",
		    images_upload_url : '/upload.php',
		    automatic_uploads : false,

			images_upload_handler : function(blobInfo, success, failure) {
				var xhr, formData;

				xhr = new XMLHttpRequest();
				xhr.withCredentials = false;
				xhr.open('POST', '/upload.php');

				xhr.onload = function() {
					var json;

					if (xhr.status != 200) {
						failure('HTTP Error: ' + xhr.status);
						return;
					}

					json = JSON.parse(xhr.responseText);

					if (!json || typeof json.file_path != 'string') {
						failure('Invalid JSON: ' + xhr.responseText);
						return;
					}

					success(json.file_path);
				};

				formData = new FormData();
				formData.append('file', blobInfo.blob(), blobInfo.filename());

				xhr.send(formData);
			},
		});
		var loadFile = function(event) {
	    var output = document.getElementById('output');
		    output.src = URL.createObjectURL(event.target.files[0]);
		};
  </script>
@endpush

@section('content')
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-content">
			<div class="row">
				<div class="col-xl-12">
					<div class="m-portlet">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text" id="imprint">
										Page creation posts
									</h3>
								</div>
							</div>
						</div>

                        <form method="POST" action="{{ route('blog.store')}}"> 
                        	{{ csrf_field() }}
							<div class="container">
								<div class="row">
									<div class="col-md-8">
									  	<div class="form-group">
									    	<label for="title">Title</label>
									    	<input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
									  	</div>
										 <div class="form-group form-check">
										    <input type="checkbox" class="form-check-input" id="active" name="active" checked="true">
										    <label class="form-check-label" for="active">Active</label>
										 </div>
										 <div class="form-group">
										    <label for="content">Content</label>
										    <textarea name="content" id="content">Next, use our Get Started docs to setup Tiny!</textarea>
										 </div>
										 <button type="submit" class="btn btn-primary">Submit</button>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
										  	<div class="panel-heading">Preview image:</div>
										  	<div class="panel-body">
										    	<div>
													<img id="output"/ height="100">
										  			<input type="file" accept="image/*" onchange="loadFile(event)" name="image">
												</div>
										  </div>
										</div>
									</div>
								</div>
	                        </div>
						</form>

					</div>
				</div>   
			</div>
		</div>
	</div>
	
@endsection