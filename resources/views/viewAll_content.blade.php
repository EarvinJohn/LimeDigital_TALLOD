<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
@extends('layouts.main')

@section('content')

<body>
	<div class="col-md-8" id="mediacontent">
		<!-- .widget-body -->
	</div><!-- .widget -->
	
	<div class="col-md-4">
		<div class="widget countries-widget">
		  <header class="widget-header">
		    <h4 class="widget-title">Categories</h4>
		  </header><!-- .widget-header -->
		  <hr class="widget-separator">
			@foreach($categories as $category)
		  	<div class="widget-body">
				<div class="list-group m-0">
					<button class="list-group-item clearfix" onclick="viewallContent({!! $category->id !!})">
						<input type="hidden" value="{{ $category->category }}">
						<span class="pull-left fw-500 fz-md">{{ $category->category }}</span>
					</button><!-- .list-group-item -->
				</div><!-- .list-group -->
			</div><!-- .widget-body -->
			@endforeach
		</div><!-- .widget -->
	</div>
</body>

<script type="text/javascript">

	function viewallContent(id){
		var url = "/view-all-content/" + id;

	        $.ajax({
	            url: url,
	            type: 'get',            
	            success: function(response) {
	            $('#mediacontent').html(response);
	            }
	        });

	    return false;
	}

</script>

@stop
</html>