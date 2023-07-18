@extends('layouts.admin_app')
@section('title')
    Brands
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
                                    <th>Brand Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr class="text-center">
                                        <td>{{$brand->brand_name}}</td>
                                        <td>{{ substr($brand->slug, 0, 50) . '...' }}</td>
                                        <td>
                                            @if($brand->status==1)
                                                <a href="#" class="btn btn-success statusBtn" data-id="{{ $brand->id }}"><i class="bi bi-check-circle" style="margin-left: 5px; font-size: 15px;"></i>Active</a>
                                            @else
                                                <a href="#" class="btn btn-warning statusBtn" data-id="{{ $brand->id }}"><i class="bi bi-x-circle" style="margin-left: 5px; font-size: 15px;"></i>Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-primary"><i class="bi bi-pencil-square" style="margin-left: 5px; font-size: 15px;"></i></a>
                                            <a href="#" class="btn btn-danger deleteBtn" data-id="{{ $brand->id }}"><i class="bi bi-x-square" style="margin-left: 5px; font-size: 15px;"></i></a>
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
            var url = '{{ route("brand-status", ":id") }}';
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
                            if(response.status==200){
                                swal.fire({
                                    title: 'Changed!',
                                    text: 'The status has been changed successfully.',
                                    icon: 'success',
                                }).then(function() {
                                    window.location.reload();
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
        $('.deleteBtn').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = '{{ route("brand.destroy", ":id") }}';
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
                                }).then(function() {
                                    window.location.reload();
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
