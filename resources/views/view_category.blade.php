<div class="m-b-xl">
{{ csrf_field() }}
	<div class="form-group">
		<label for="category_name">Category Name</label>
		<input type="hidden" name="id" id="id" value="{{$Categories->id}}">
		<input type="text" class="form-control" id="category_name" name="category_name" value="{{$Categories->category}}">
	</div>
</div>