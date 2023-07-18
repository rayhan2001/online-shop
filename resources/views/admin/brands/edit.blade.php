@extends('layouts.admin_app')
@section('title')
    Edit Brand
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-9 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Edit a Brand</h5>
                            </div>
                            <hr/>
                            <form id="edit-brand" data-url="{{ route('brand.update', $brand->id) }}">
                                @csrf
                                @method('put')
                                <input type="hidden" name="brand_id" id="brand_id" value="{{$brand->id}}">
                                <div class="row mb-3">
                                    <label for="category_name" class="col-sm-3 col-form-label">Brand Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{$brand->brand_name}}" id="brand_name" name="brand_name" placeholder="Enter a brand name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{$brand->slug}}" name="slug" id="slug" class="form-control" placeholder="Enter your slug here">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{$brand->status==1? 'selected':''}}>Active</option>
                                            <option value="0" {{$brand->status==0? 'selected':''}}>Inactive</option>
                                        </select>
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
        $('#edit-brand').submit(function(e) {
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
                        toastr.success('Brand updated successfully.');
                        $(location).prop('href', '{{route('brand.index')}}');
                        $('#updateBtn').attr("disabled", false);
                        $('#updateBtn').html("Update");
                    }
                },
                error: function(error) {
                    $('#updateBtn').attr("disabled", false);
                    $('#updateBtn').html("Update");
                }
            });
        });
    });
</script>
