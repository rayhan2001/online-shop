@extends('layouts.admin_app')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Edit a category</h5>
                            </div>
                            <hr/>
                            <form id="edit-category" data-url="{{ route('category.update', $category->id) }}">
                                @csrf
                                @method('put')
                                <input type="hidden" name="cat_id" id="cat_id" value="{{$category->id}}">
                                <div class="row mb-3">
                                    <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{$category->category_name}}" id="category_name" name="category_name" placeholder="Enter a category name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="parent_cat_id" class="col-sm-3 col-form-label">Parent Category</label>
                                    <div class="col-sm-9">
                                        <select class="single-select form-control" id="parent_cat_id" name="parent_cat_id">
                                            <option disabled selected value="">Select a category</option>
                                            @if($category->parent_cat_id)
                                                @foreach($categories as $categoryItem)
                                                    <option value="{{$categoryItem->id}}" {{ $categoryItem->id == $category->parent_cat_id ? 'selected' : '' }}>
                                                        {{$categoryItem->category_name}}
                                                    </option>
                                                @endforeach
                                            @else
                                                @foreach($categories as $categoryItem)
                                                    <option value="{{$categoryItem->id}}">{{$categoryItem->category_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$category->slug}}" name="slug" id="slug" class="form-control" placeholder="Enter your slug here">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{$category->status==1? 'selected':''}}>Active</option>
                                            <option value="0" {{$category->status==0? 'selected':''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="slug" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" id="image" class="form-control">
                                        <img id="categoryImage" src="{{asset($category->image)}}" alt="" width="100" class="img-thumbnail mt-2">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button id="updateBtn" type="submit" class="btn btn-primary">
                                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#edit-category').submit(function(e) {
            e.preventDefault();
            $('#updateBtn').attr("disabled", true);
            $('#updateBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');
            var url = $(this).data('url');
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status==200){
                        toastr.success('Category updated successfully.');
                        $(location).prop('href', '{{route('category.index')}}');
                        $('#updateBtn').attr("disabled", false);
                        $('#updateBtn').html("Update");
                    }
                },
                error: function(error) {
                    $('#updateBtn').attr("disabled", false);
                    $('#updateBtn').html("Update");
                }
            });

            // Update the image URL
            var fileInput = document.getElementById('image');
            var file = fileInput.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $('#categoryImage').attr('src', event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
    document.getElementById('image').addEventListener('change', function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('categoryImage').src = e.target.result;
        }
        reader.readAsDataURL(file);
    });
</script>
