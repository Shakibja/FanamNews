@extends('backend.mastering.master')
@section('shakib')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Category</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Category</a></li>

                </ol>
            </nav>
        </div>
        <div class="row">

            <div class="col-12 col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Horizontal Two column</h4> -->
                        <form action="{{ isset($categories) ? route('admin.update_category', $categories->category_slug) : route('admin.store_category') }}" method="post" class="form-sample">
                            @csrf
                            @isset($categories)
                                @method('PUT')
                            @endisset
                            <!-- <p class="card-description"> Personal info </p> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Category Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" value="{{ old('category_name',isset($categories) ? $categories->category_name : '' )}}" required />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Select Category Status</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="category_status" id="category_status">
                                            @isset($categories)
                                                <option value="1" {{ isset($categories) && $categories->category_status == "1" ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ isset($categories) && $categories->category_status == "0" ? 'selected' : '' }}>Inactive</option>
                                            @else
                                            <option>Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            @endisset
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Category Slug</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" class="form-control" placeholder="Enter Category Slug" name="category_slug" value="{{ old('category_slug',isset($categories) ? $categories->category_slug : '' )}}" @isset($categories)readonly @endisset/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Priority</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter priority" name="priority" value="{{ old('priority',isset($categories) ? $categories->priority : '' )}}" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                @isset($categories)
                                <button type="submit" class="btn btn-gradient-success me-2">Update</button>
                                @else
                                <button type="submit" class="btn btn-gradient-primary me-2">Add Category</button>
                                @endisset
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 grid-margin stretch-card">
                <div class="card" style="overflow-x: auto">
                    <div class="card-body">
                        <h4 class="card-title">Category List</h4>
                        
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th> Serial No.</th>
                                    <th> Category Name </th>
                                    <!-- <th> Category Slug </th> -->
                                    <th> Priority </th>
                                    <th>  Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($category as $key=>$category)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <!-- <td>{{ $category->category_slug }}</td> -->
                                    <td>{{ $category->priority }}</td>
                                    <td>
                                    @if($category->category_status == 1)
                                    <div class="badge badge-success">Active</div>
                                    @else
                                    <div class="badge badge-warning">Inative</div>
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.edit_category',$category->category_slug)}}" class="btn btn-sm btn btn-gradient-info">Edit</a>
                                        <!-- <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategoryModal{{$category->category_id}}">Delete</button> -->
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
    <!-- footer starts  -->
    @include('backend.includes.footer')
    <!-- footer ends  -->
</div>

@endsection