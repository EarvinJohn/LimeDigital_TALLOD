<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
</head>
@extends('layouts.main')

@section('content')
<body>
 <div class="alert" id="message" style="display: none"></div>
  <div class="col-md-10">
	<div class="panel panel-default new-message">						
		<form enctype="multipart/form-data" name="add_media" id="add_media">
			{{ csrf_field() }}
			<div class="panel-body">
				<div class="form-group">
					<label for="control-demo-1" class="col-sm-3">Title</label>
					<div class="col-sm-9">
						<input type="text" id="title" name="title" class="form-control">
					</div>
				</div>
				<br>
				<div class="form-group">
					<label for="control-demo-6" class="col-sm-3">Categories</label>
					<div id="categories" name="categories" class="col-sm-9">
						<select class="form-control" id="categories" name="categories">
							@foreach ($categories as $category)
							<option>{{ $category->category }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					<label for="control-demo-5" class="col-sm-3">Description</label>
					<div class="col-sm-9">
						<textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
						<br>
						<div class="col-sm-1">
							<input type="file" name="file" id="file">
						</div>
						<br>
						 @if($errors->has('file'))
		                	<strong class="help-block">{{$errors->first('file')}}</strong>
		                @endif 
					</div>
			</div>

			

			<div class="panel-footer clearfix">
				<div class="pull-right">
					<button type="submit" id="send_form" class="btn btn-primary">Submit <i class="fa fa-send"></i></button>
				</div>
			</div>
		</form>
	</div>
</div>
</body>

<script type="text/javascript">
	
	$('#add_media').on('submit', function(e){
		e.preventDefault();
      $.ajax({
        url: '/submit-media-form' ,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'JSON',
        success: function( data ) {
        	$('#message').css('display', 'block');
 			$('#message').html(data.message);
 			$('#message').addClass(data.class_name);
 		 }
      });
	});

</script>
@stop
</html>