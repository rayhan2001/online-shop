@extends('layouts.admin_app')
@section('title')
    Products
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    @php
                                        $images = explode('|', $product->image);
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->category->category_name}}</td>
                                        <td>{{$product->brand->brand_name}}</td>
                                        <td>
                                            @foreach($images as $image)
                                                @if($image)
                                                    <img src="{{$image}}" class="img-thumbnail" alt="product img" width="50" height="50">
                                                @else
                                                    --
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$product->price}}	&#2547;</td>
                                        <td>
                                            @if($product->status==1)
                                                <a href="#" class="btn btn-success statusBtn" data-id="{{ $product->id }}">Active</a>
                                            @else
                                                <a href="#" class="btn btn-warning statusBtn" data-id="{{ $product->id }}">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary"><i class="bi bi-pencil-square" style="margin-left: 5px; font-size: 15px;"></i></a>
                                            <a href="#" class="btn btn-danger productDelete" data-id="{{ $product->id }}"><i class="bi bi-x-square" style="margin-left: 5px; font-size: 15px;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
        $('.statusBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = '{{ route("product-status", ":id") }}';
            url = url.replace(':id', id);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be change the status!",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "Yes, change it!",
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'GET',
                        dataType: 'JSON',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id':id,
                        },
                        success: function(response) {
                            if (response.success == 200) {
                                var statusText = response.status === 1 ? 'Active' : 'Inactive';
                                $('.statusBtn[data-id="' + id + '"]').text(statusText);

                                if (response.status === 1) {
                                    $('.statusBtn[data-id="' + id + '"]').removeClass('btn-warning').addClass('btn-success');
                                } else {
                                    $('.statusBtn[data-id="' + id + '"]').removeClass('btn-success').addClass('btn-warning');
                                }
                                swal.fire({
                                    title: 'Changed!',
                                    text: 'The status has been changed successfully.',
                                    icon: 'success',
                                });
                            }
                        },
                        error: function(response) {
                            swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while changed the item.',
                                icon: 'error',
                            });
                        }
                    });
                }
            });
        })
    })
    $(document).ready(function() {
        $('.productDelete').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = '{{ route("product.destroy", ":id") }}';
            url = url.replace(':id', id);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: 'JSON',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id':id,
                        },
                        success: function(response) {
                            if(response.status==200){
                                swal.fire({
                                    title: 'Deleted!',
                                    text: 'The item has been deleted successfully.',
                                    icon: 'success',
                                }).then(function () {
                                    $(`.productDelete[data-id="${id}"]`).closest('tr').remove();
                                });
                            }
                        },
                        error: function(response) {
                            swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while deleting the item.',
                                icon: 'error',
                            });
                        }
                    });
                }
            });
        });
    });
</script>
