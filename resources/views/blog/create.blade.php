@extends('layouts.app')
@push('head.styles')
	<style>
		.upload-btn-wrapper {
		    position: relative;
		    overflow: hidden;
		}

		.upload-btn {
		    border: 2px solid gray;
		    color: gray;
		    background-color: white;
		    padding: 8px 20px;
		    border-radius: 8px;
		    font-size: 20px;
		    font-weight: bold;
		}

		.upload-btn-wrapper input[type=file] {
		    font-size: 100px;
		    position: absolute;
		    left: 0;
		    top: 0;
		    opacity: 0;
		    width: 100%;
		}
	</style>
@endpush
@push('head.scripts')
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=re1puig8wwns5dt6o4ys4k2pmzmltdnmw4xhbctutrdcazl4"></script>
    <script>
		tinymce.init({
		    selector: '#content',
		    plugins : 'autolink link image imagetools lists charmap preview table emoticons checklist wordcount advcode',
		    toolbar: "numlist bullist checklist emoticons wordcount code",
		    images_upload_url : '/upload.php',
		    automatic_uploads : false,
		    relative_urls: false,
		    min_height: 500,
		    entity_encoding: "numeric", 

			images_upload_handler: function (blobInfo, success, failure) {
				var xhr, formData;

				xhr = new XMLHttpRequest();
				xhr.withCredentials = false;
				xhr.open('POST', '/upload.php');

				xhr.onload = function() {
				  var json;

				  if (xhr.status < 200 || xhr.status >= 300) {
					failure('HTTP Error: ' + xhr.status);
					return;
				  }

				  json = JSON.parse(xhr.responseText);

				  if (!json || typeof json.location != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				  }

				  success(json.location);
				};

				formData = new FormData();
				formData.append('file', blobInfo.blob(), blobInfo.filename());

				xhr.send(formData);
			}
		});

  </script>
@endpush

@section('content')
	@php 
		$isEdit = isset($post);
		$action = $isEdit ? route('blog.update', $post->id) : route('blog.store');
	@endphp

	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-content">
			@if ($errors->any())
			 	<div class="alert alert-danger" role="alert">
			  		<ul>
			     		@foreach ($errors->all() as $error)
			  				<li><span>{{$error}}</span></li>
			     		@endforeach
			  		</ul>
				</div>
			@endif
            @if(session()->has('message'))
                <div class="alert alert-success">
                {{ session()->get('message')}}
                </div>
            @endif
			<div class="row">
				<div class="col-xl-12">
					<div class="m-portlet">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text" id="imprint">
										Page creation a new post
									</h3>
								</div>
								@if($isEdit)
									<div class="m-portlet__head-title">
										<a class="btn btn-link" href="{{ route('blog.show', $post->slug) }}">Show post</a>
									</div>
								@endif
								
							</div>
						</div>

                        <form method="POST" action="{{ $action }}" enctype="multipart/form-data"> 
                        	{{ csrf_field() }}

                        	@if($isEdit)
								{{ method_field('PUT') }}
							@endif

							<input type="hidden" id="image" name="image" value="{{ $isEdit ? $post->image : '' }}">

							<div class="container">
								<div class="row">
									<div class="col-md-8">
									  	<div class="form-group">
									    	<label for="title">Title</label>
									    	<input 
									    		type="text" 
									    		class="form-control" 
									    		id="title" 
									    		name="title" 
									    		placeholder="Enter title"
									    		value="{{$isEdit ? $post->title : ''}}"
								    		>
									  	</div>
										<div class="custom-control custom-checkbox mb-3">
										  	<input 
										    	type="checkbox" 
										    	class="custom-control-input" 
										    	id="active" 
										    	name="active"
									    	>
										  	<label class="custom-control-label" for="active">Active</label>
										</div>
										<div class="form-group">
										    <label for="content">Content</label>
										    <textarea name="content" id="content">
										    </textarea>
										</div>
										<div class="form-group">
											@if($isEdit)
											<button type="submit" class="btn btn-primary">Update</button>
											@else
												<button type="submit" class="btn btn-primary">Submit</button>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
									        <label class="panel-heading">Preview image:</label>
									        <div class="upload-btn-wrapper">
											  	<button class="upload-btn" >Upload a file</button>
											  	<input type="file" accept="image/*" onchange="loadPreview(event)"/>
											</div>
									        <img id='output' height="100" class="mt-4" src="{{ $isEdit ? $post->image : '' }}"/>
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

@push('footer.scripts')
	<script>
		@if (isset($post))
			$('#content').html('{!! $post->content !!}');
			$('#active').prop('checked', "{{ $post->active }}" == true ? true : false);
		@else
			$('#active').prop('checked', true);
		@endif
		

		var loadPreview = function(event) {
			event.preventDefault();
			var formData, file;
	    	var output = document.getElementById('output');
	    	// var imageInput = document.getElementById('image');

	    	var xhr = new XMLHttpRequest();
			xhr.open("POST", "/upload.php");
			xhr.onload = function() {
			  	var json;

			  	if (xhr.status < 200 || xhr.status >= 300) {
					failure('HTTP Error: ' + xhr.status);
					return;
			  	}

			  	json = JSON.parse(xhr.responseText);

			  	if (!json || typeof json.location != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
			  	}
		    	output.src = json.location;
		    	document.getElementById("image").value = json.location;
			}
			formData = new FormData();
			file = event.target.files[0];
			formData.append('file', file, file.name);
			xhr.send(formData);
		};
	</script>
@endpush
