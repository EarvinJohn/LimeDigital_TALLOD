<!DOCTYPE html>
<html>
@extends('layouts.main')
<head>
	@section('page-title')
	@stop
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
@section('content')
<body>
<div class="alert" id="message" style="display: none"></div>
<div class="col-md-12">
	<div class="widget">
		<header class="widget-header">
			<h4 class="widget-title">Category</h4>
		</header><!-- .widget-header -->
		<hr class="widget-separator">
		<div class="widget-body">
			<div class="m-b-xl">
				<form class="form-inline" id="addCategory">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="category_name">Category Name</label>
						<input type="text" class="form-control" id="category_name" name="category_name">
					</div>
					<button type="submit" class="btn btn-success">Submit</button>
				</form>
			</div>
		</div><!-- .widget-body -->
	</div><!-- .widget -->
</div>

<div class="col-md-12">
	<div class="widget p-lg" id="categories_table">
		<table class="table">
			<tbody>
				<tr>
					<th>ID</th>
					<th>Category Name</th>
					<th>Action</th>
				</tr>
				@foreach ($viewCategory as $viewCategories)
				<tr class="active">
					<td>{{ $viewCategories->id }}</td>
					<td>{{ $viewCategories->category }}</td>
					<td><button class="btn btn-info" data-toggle="modal" data-target="#edit_category" id="delete-media" onclick="editCategory({!! $viewCategories->id !!})"><i class="fa fa-edit"></i></button>&nbsp<button class="btn btn-danger" data-toggle="modal" data-target="#delete-management" id="delete-media" onclick="deleteCategory({!! $viewCategories->id !!})"><i class="fa fa-trash"></i></button></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div><!-- .widget -->
</div>

<!-- modal -->
<div class="modal fade in" id="edit_category" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
            <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <form role="form" method="POST" id="updatecategory">
            <!--Modal body-->
                    <div class="modal-body" id="EditCategory">
                        {{ csrf_field() }}
                    </div>
                <!--Modal footer-->
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-success" type="submit" name="submit" value="{{{ 1 }}}">Update</button>
                    </div>
                </form>
            </div>
    </div>
</div>
</body>

<script type="text/javascript">
	
	$('#addCategory').on('submit', function(e){
		e.preventDefault();
      $.ajax({
        url: '/create-categories' ,
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
 			$("#categories_table").load(location.href + " #categories_table");
 		 }
      });
	});

	//updatecategory
	$('#updatecategory').on('submit', function(e){
		e.preventDefault();
      $.ajax({
        url: '/update-categories' ,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'JSON',
        success: function( data ) {
        	$('#edit_category').modal('hide');
        	$('#message').css('display', 'block');
 			$('#message').html(data.message);
 			$('#message').addClass(data.class_name);
 			$("#categories_table").load(location.href + " #categories_table");
 		 }
      });
	});

	//view edit category
	function editCategory(id){

   	var url = "/view-category/" + id;

        $.ajax({
            url: url,
            type: 'get',            
            success: function(response) {
            $('#edit_category').modal('show');
            $('#EditCategory').html(response);
            }
        });

    return false;

}
	
	//delete category
	function deleteCategory(id){

    var url = "/delete-categories/" + id;

     $.ajax({
       url: url,
       type: 'GET',            
      success: function( data ) {
        	$('#message').css('display', 'block');
 			$('#message').html(data.message);
 			$('#message').addClass(data.class_name);
 			$("#categories_table").load(location.href + " #categories_table");
 		 }
    });

     return false;

}

</script>
@stop
</html>