@extends('layouts.admin_app')
@section('title')
    Edit Product
@endsection
@section('content')
    <style>
        input[type="file"] {
            display: block;
        }

        .imageContainer {
            display: inline-block;
            position: relative;
        }

        .imageThumb {
            max-height: 80px;
            border: 3px solid;
            margin: 15px 15px 0 0;
            padding: 1px;
        }

        .removeImage {
            position: absolute;
            top: 18px;
            right: 19px;
            width: 15px;
            height: 15px;
            background-color: red;
            border-radius: 50%;
            color: white;
            text-align: center;
            font-size: 10px;
            line-height: 15px;
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <form action="" method="post" id="productForm">
                        @csrf
                        <div class="card-header py-3 bg-transparent">
                            <div class="d-sm-flex align-items-center">
                                <h5 class="mb-2 mb-sm-0">Edit a Product</h5>
                                <div class="ms-auto">
                                    <button id="productBtn" type="submit" class="btn btn-outline-secondary">
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12 col-lg-8">
                                    <div class="card shadow-none bg-light border">
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="title" name="title" value="{{$product->title}}">
                                                    <span id="title_error" class="text-danger"></span>
                                                </div>
                                                <div class="col-6">
                                                    <label for="slug" class="form-label">Slug<span class="text-danger">*</span></label>
                                                    <input type="text" name="slug" id="slug" class="form-control" value="{{$product->slug}}">
                                                    <span id="slug_error" class="text-danger"></span>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <label class="form-label">SKU<span class="text-danger">*</span></label>
                                                    <input type="text" name="sku" id="sku" class="form-control" value="{{$product->sku}}">
                                                    <span id="sku_error" class="text-danger"></span>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <label for="category_name" class="form-label">Barcode</label>
                                                    <input type="number" class="form-control" id="barcode" name="barcode" value="{{$product->barcode}}">
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <label class="form-label">Track Quantity<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="track_quantity" name="track_quantity" value="{{$product->track_quantity}}">
                                                    <span id="track_quantity_error" class="text-danger"></span>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Product Image</label>
                                                    <input class="form-control" type="file" id="files" name="files[]" multiple />
                                                    @php
                                                     $images = explode('|',$product->image);
                                                    @endphp
                                                    @foreach($images as $image)
                                                        <img src="{{asset($image)}}" alt="" class="form-control mt-2 img-thumbnail" style="width: 50px; height: 50px;">
                                                    @endforeach
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" id="descriptionText" class="form-control">{!! $product->description !!}</textarea>
                                                    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
                                                    <script>
                                                        CKEDITOR.replace('description', {
                                                            height: '150px'
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="card shadow-none bg-light border">
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label class="form-label">Price<span class="text-danger">*</span></label>
                                                    <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}">
                                                    <span id="price_error" class="text-danger"></span>
                                                </div>
                                                <div class="col-12">
                                                    <label for="category_name" class="form-label">Compare at Price</label>
                                                    <input type="text" class="form-control" id="compare_price" name="compare_price" value="{{$product->compare_price}}">
                                                </div>
                                                <div class="col-12">
                                                    <label for="cat_id" class="form-label">Category<span class="text-danger">*</span></label>
                                                    <select class="single-select form-control" id="cat_id" name="cat_id">
                                                        <option disabled selected value="">--</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}" {{$product->cat_id==$category->id? 'selected':''}}>{{$category->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="cat_id_error" class="text-danger"></span>
                                                </div>
                                                <div class="col-12">
                                                    <label for="subcat_id" class="form-label">Sub Category<span class="text-danger">*</span></label>
                                                    <select class="single-select form-control" id="subcat_id" name="subcat_id">
                                                        <option disabled selected value="">--</option>
                                                    </select>
                                                    <span id="subcat_id_error" class="text-danger"></span>
                                                </div>
                                                <div class="col-12">
                                                    <label for="cat_id" class="form-label">Brand<span class="text-danger">*</span></label>
                                                    <select class="single-select form-control" id="brand_id" name="brand_id">
                                                        <option disabled selected value="">--</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{$brand->id}}" {{$product->brand_id==$brand->id? 'selected':''}}>{{$brand->brand_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="brand_id_error" class="text-danger"></span>
                                                </div>
                                                <div class="col-12">
                                                    <label for="cat_id" class="form-label">Featured Product<span class="text-danger">*</span></label>
                                                    <select class="single-select form-control" id="featured_product" name="featured_product">
                                                        <option disabled selected value="">--</option>
                                                        <option value="1" {{$product->featured_product==1? 'selected':''}}>Yes</option>
                                                        <option value="0" {{$product->featured_product==0? 'selected':''}}>No</option>
                                                    </select>
                                                    <span id="featured_product_error" class="text-danger"></span>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-select" name="status" id="status">
                                                        <option disabled selected value="">--</option>
                                                        <option value="1" {{$product->status==1? 'selected':''}}>Published</option>
                                                        <option value="0" {{$product->status==0? 'selected':''}}>Draft</option>
                                                    </select>
                                                </div>

                                            </div><!--end row-->
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/avrophonetic@0.0.5/avrophonetic.min.js"></script>
<script>
    $(document).ready(function() {
        $('#productBtn').click(function (e) {
            e.preventDefault();
            $('#productBtn').attr("disabled", true);
            $('#productBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

            var description = CKEDITOR.instances.descriptionText.getData();
            var data = new FormData();
            data.append('_token', "{{ csrf_token() }}");
            data.append('title', document.getElementById("title").value);
            data.append('slug', document.getElementById("slug").value);
            data.append('sku', document.getElementById("sku").value);
            data.append('barcode', document.getElementById("barcode").value);
            data.append('track_quantity', document.getElementById("track_quantity").value);
            data.append('price', document.getElementById("price").value);
            data.append('compare_price', document.getElementById("compare_price").value);
            data.append('cat_id', document.getElementById("cat_id").value);
            data.append('subcat_id', document.getElementById("subcat_id").value);
            data.append('brand_id', document.getElementById("brand_id").value);
            data.append('featured_product', document.getElementById("featured_product").value);
            data.append('status', document.getElementById("status").value);
            data.append('description', description);

            var files = $('#files')[0].files;
            for (var i = 0; i < files.length; i++) {
                data.append('product_images[]', files[i]);
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('product.store')}}",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (response) {
                    window.location.reload();
                    $('#productForm').trigger("reset");
                    toastr.success('Product Added Successfully');
                    $('#productBtn').attr("disabled", false);
                    $('#productBtn').html("Submit");
                },
                error: function(error) {
                    if(error.responseJSON.errors.title){
                        $('#title_error').text(error.responseJSON.errors.title);
                    }else{
                        $('#title_error').text('');
                    }
                    if(error.responseJSON.errors.slug){
                        $('#slug_error').text(error.responseJSON.errors.slug);
                    }else{
                        $('#slug_error').text('');
                    }if(error.responseJSON.errors.sku){
                        $('#sku_error').text(error.responseJSON.errors.sku);
                    }else{
                        $('#sku_error').text('');
                    }if(error.responseJSON.errors.track_quantity){
                        $('#track_quantity_error').text(error.responseJSON.errors.track_quantity);
                    }else{
                        $('#track_quantity_error').text('');
                    }if(error.responseJSON.errors.price){
                        $('#price_error').text(error.responseJSON.errors.price);
                    }else{
                        $('#price_error').text('');
                    }if(error.responseJSON.errors.cat_id){
                        $('#cat_id_error').text(error.responseJSON.errors.cat_id);
                    }else{
                        $('#cat_id_error').text('');
                    }if(error.responseJSON.errors.subcat_id){
                        $('#subcat_id_error').text(error.responseJSON.errors.subcat_id);
                    }else{
                        $('#subcat_id_error').text('');
                    }if(error.responseJSON.errors.brand_id){
                        $('#brand_id_error').text(error.responseJSON.errors.brand_id);
                    }else{
                        $('#brand_id_error').text('');
                    }if(error.responseJSON.errors.featured_product){
                        $('#featured_product_error').text(error.responseJSON.errors.featured_product);
                    }else{
                        $('#featured_product_error').text('');
                    }
                    $('#productBtn').attr("disabled", false);
                    $('#productBtn').html("Submit");

                }
            });
        });
    });

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');

        titleInput.addEventListener('input', function () {
            const title = titleInput.value.trim();
            const slug = generateSlug(title);
            slugInput.value = slug;
            slugInput.setAttribute('readonly', true);
        });

        function generateSlug(title) {
            return title
                .toLowerCase()
                .replace(/[^a-z0-9-]/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
        }
    });
    $(document).ready(function() {
        if(window.File && window.FileList && window.FileReader) {
            $("#files").on("change",function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i];
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        var imageContainer = $("<div></div>", {
                            class: "imageContainer"
                        }).insertAfter("#files");
                        $("<img></img>", {
                            class: "imageThumb",
                            src: e.target.result,
                            title: file.name
                        }).appendTo(imageContainer);
                        $("<div></div>", {
                            class: "removeImage",
                            text: "X"
                        }).appendTo(imageContainer).click(function() {
                            $(this).parent(".imageContainer").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else { alert("Your browser doesn't support to File API") }
    });
    $(document).ready(function () {
        $('#cat_id').change(function () {
            var cat_id = $(this).val();
            if (cat_id) {
                $.ajax({
                    url: '/products/get-sub-category/' + cat_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (index, subcat_id) {
                            $('#subcat_id').append('<option value="' + subcat_id.id + '">' + subcat_id.category_name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcat_id').empty();
            }
        });
    });
</script>
