@extends('layouts.admin_app')
@section('title')
    Create Category
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Add a category</h5>
                            </div>
                            <hr/>
                            <form action="" method="post" id="store-category">
                                @csrf
                                <div class="row mb-3">
                                    <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter a category name">
                                        <span id="category_name_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="parent_cat_id" class="col-sm-3 col-form-label">Parent Category</label>
                                    <div class="col-sm-9">
                                        <select class="single-select form-control" id="parent_cat_id" name="parent_cat_id">
                                            <option disabled selected value="">Select a category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter your slug here">
                                        <span id="slug_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="slug" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button id="submitBtn" type="submit" class="btn btn-primary">
                                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                            Submit
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
        $('#submitBtn').click(function (e) {
            e.preventDefault();
            $('#submitBtn').attr("disabled", true);
            $('#submitBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

            var data = new FormData();
            data.append('_token', "{{ csrf_token() }}");
            data.append('category_name', document.getElementById("category_name").value);
            data.append('parent_cat_id', document.getElementById("parent_cat_id").value);
            data.append('slug', document.getElementById("slug").value);
            data.append('image', $('input[type=file]')[0].files[0]);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('category.store')}}",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#store-category').trigger("reset");
                    toastr.success('Category Added Successfully');
                    window.location.reload();
                    $('#submitBtn').attr("disabled", false);
                    $('#submitBtn').html("Submit");
                },
                error: function(error) {
                    if(error.responseJSON.errors.category_name){
                        $('#category_name_error').text(error.responseJSON.errors.category_name);
                    }else{
                        $('#category_name_error').text('');
                    }
                    if(error.responseJSON.errors.slug){
                        $('#slug_error').text(error.responseJSON.errors.slug);
                    }else{
                        $('#slug_error').text('');
                    }
                    $('#submitBtn').attr("disabled", false);
                    $('#submitBtn').html("Submit");

                }
            });
        });
    });
</script>
