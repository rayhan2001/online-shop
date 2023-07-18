@extends('layouts.admin_app')
@section('title')
    Create Brands
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Add a brands</h5>
                            </div>
                            <hr/>
                            <form action="" method="post" id="store-brand">
                                @csrf
                                <div class="row mb-3">
                                    <label for="category_name" class="col-sm-3 col-form-label">Brand Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter a brand name">
                                        <span id="brand_name_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter your slug here">
                                        <span id="slug_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button id="brandBtn" type="submit" class="btn btn-primary">
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
        $('#brandBtn').click(function (e) {
            e.preventDefault();
            $('#brandBtn').attr("disabled", true);
            $('#brandBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

            var data = new FormData();
            data.append('_token', "{{ csrf_token() }}");
            data.append('brand_name', document.getElementById("brand_name").value);
            data.append('slug', document.getElementById("slug").value);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('brand.store')}}",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#store-brand').trigger("reset");
                    toastr.success('Brand Added Successfully');
                    window.location.reload();
                    $('#brandBtn').attr("disabled", false);
                    $('#brandBtn').html("Submit");
                },
                error: function(error) {
                    if(error.responseJSON.errors.brand_name){
                        $('#brand_name_error').text(error.responseJSON.errors.brand_name);
                    }else{
                        $('#brand_name_error').text('');
                    }
                    if(error.responseJSON.errors.slug){
                        $('#slug_error').text(error.responseJSON.errors.slug);
                    }else{
                        $('#slug_error').text('');
                    }
                    $('#brandBtn').attr("disabled", false);
                    $('#brandBtn').html("Submit");

                }
            });
        });
    });
</script>
