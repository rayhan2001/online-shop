@extends('layouts.admin_app')
@section('title')
    Categories
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
                                    <th>Category Name</th>
                                    <th>Parent Category</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                <tr class="text-center">
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->parent_cat_id}}</td>
                                    <td>{{ substr($category->slug, 0, 25) . '...' }}</td>
                                    <td>
                                        <img src="{{$category->image}}" class="img-thumbnail" alt="product img" width="50" height="50">
                                    </td>
                                    <td>
                                        @if($category->status==1)
                                            <a href="#" class="btn-success"><i class="bi bi-check-circle"></i>Active</a>
                                        @else
                                            <a href="#" class="btn btn-warning"><i class="bi bi-x-circle"></i>Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn btn-danger"><i class="bi bi-x-square"></i></a>
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
