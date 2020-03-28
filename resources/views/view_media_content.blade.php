@foreach ($mediacontent as $mediacontents)
<div class="widget" >
	<header class="widget-header">
		<h4 class="widget-title pull-left">{{ $mediacontents->categories }}</h4>
	</header><!-- .widget-header -->
	<hr class="widget-separator">
	<div class="widget-body">
		<h1 class="widget-title pull-left">{{ $mediacontents->title }}</h1>
		<br>
		@if ($mediacontents->filetype == "video")
		<video width="400" controls>
		  <source src="uploads/{{$mediacontents->file_name}}" type="video/mp4">
		</video>
		@elseif($mediacontents->filetype == "image")
			<img class="img-responsive" src="uploads/{{$mediacontents->file_name}}">
		@elseif($mediacontents->filetype == "music")
			<audio controls>
			  <source src="uploads/{{$mediacontents->file_name}}" type="audio/mpeg">
			</audio>
		@endif
		<hr class="widget-separator">
		<p>{!! $mediacontents->description !!}</p>
	</div>
</div>
@endforeach

@if($mediacontent->isEmpty())

<div class="widget" >
	<header class="widget-header">
		<h4 class="widget-title pull-left">Empty Content</h4>
	</header><!-- .widget-header -->
	<hr class="widget-separator">
	<div class="widget-body">
		<br>
			<img class="img-responsive" src="uploads/empty.jpg">
		<hr class="widget-separator">
		
	</div>
</div>

@endif
