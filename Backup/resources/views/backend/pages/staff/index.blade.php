@extends('backend.mastering.master')
@section('shakib')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Staffs</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Staffs</a></li>

                </ol>
            </nav>
        </div>
        <div class="row">

            <div class="col-12 col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Horizontal Two column</h4> -->
                        <form action="{{ isset($staffs) ? route('admin.update_staff', $staffs->id) : route('admin.store_staff') }}" method="post" class="form-sample">
                            @csrf
                            @isset($staffs)
                                @method('PUT')
                            @endisset
                            <!-- <p class="card-description"> Personal info </p> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Staff Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Staff Name" name="name" value="{{ old('name',isset($staffs) ? $staffs->name : '' )}}" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Staff Phone Number</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" placeholder="Enter Staff Phone Number" name="phone_no" value="{{ old('phone_no',isset($staffs) ? $staffs->phone_no : '' )}}" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Staff Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" class="form-control" placeholder="Enter Author Email" name="email" value="{{ old('email ',isset($staffs) ? $staffs->email  : '' )}}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Password</label>
                                        <div class="col-sm-12">
                                            <input type="password" class="form-control" class="form-control" placeholder="Enter Password" name="password" value="{{ old('password ',isset($staffs) ? $staffs->password  : '' )}}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Staff Status</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="status" id="status">
                                            @isset($staffs)
                                                <option value="1" {{ isset($staffs) && $staffs->status == "1" ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ isset($staffs) && $staffs->status == "0" ? 'selected' : '' }}>Inactive</option>
                                            @else
                                            <option>Select Staff Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            @endisset
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                @isset($staffs)
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
                                    <th class=" text-center"> Serial No.</th>
                                    <th class=" text-center"> Staff Name </th>
                                    <th class=" text-center"> Staff Phone Number </th>
                                    <th class=" text-center"> Staff Email </th>
                                    <th class=" text-center">  Status </th>
                                    <th class=" text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($staff as $key=>$staff)
                                <tr>
                                    <td class=" text-center">{{$key+1}}</td>
                                    <td class=" text-center">{{ $staff->name }}</td>
                                    <td class=" text-center">{{ $staff->phone_no }}</td>
                                    <td class=" text-center">{{ $staff->email }}</td>
                                    <td class=" text-center">
                                    @if($staff->status == 1)
                                    <div class="badge badge-success">Active</div>
                                    @else
                                    <div class="badge badge-warning">Inative</div>
                                    @endif
                                    </td>
                                    <td class=" text-center">
                                        <a href="{{route('admin.edit_staff',$staff->id)}}" class="btn btn-sm btn btn-gradient-info">Edit</a>
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