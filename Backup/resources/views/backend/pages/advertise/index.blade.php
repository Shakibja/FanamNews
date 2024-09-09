@extends('backend.mastering.master')
@section('shakib')
<div class="main-panel">
    <div class="content-wrapper">
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('advertise_success'))
        <div class="alert alert-success">
            {{ session('advertise_success') }}
        </div>
    @endif
        <div class="page-header">
            <h3 class="page-title"> Advertise</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Advertise</a></li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Horizontal Two column</h4> -->
                        
                        <form action="@if(Auth::guard('admin')->check()){{ isset($advertises) ? route('admin.update_advertise', $advertises->id_advertise) : route('admin.store_advertise') }}@else{{ isset($advertises) ? route('staff.update_advertise', $advertises->id_advertise) : route('staff.store_advertise') }}@endif" method="post" class="form-sample" enctype="multipart/form-data">
                            @csrf
                            @isset($advertises)
                                @method('PUT')
                            @endisset
                            <!-- <p class="card-description"> Personal info </p> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Select Type</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="type" id="type">
                                                @isset($advertises)
                                                <option value="1" {{ isset($advertises) && $advertises->type == "1" ? 'selected' : '' }}>Main Page Banner </option>
                                                <option value="2" {{ isset($advertises) && $advertises->type == "2" ? 'selected' : '' }}>Main Page Right Side Banner</option>
                                                <option value="3" {{ isset($advertises) && $advertises->type == "3" ? 'selected' : '' }}>Category Main Banner 1</option>
                                                <option value="4" {{ isset($advertises) && $advertises->type == "4" ? 'selected' : '' }}>Category Page Right Banner</option>
                                                <option value="5" {{ isset($advertises) && $advertises->type == "5" ? 'selected' : '' }}>Category Main Banner 2</option>
                                                <option value="6" {{ isset($advertises) && $advertises->type == "6" ? 'selected' : '' }}>Details Page Right Banner 1</option>
                                                >Category Main Banner 2</option>
                                                <option value="7" {{ isset($advertises) && $advertises->type == "7" ? 'selected' : '' }}>Details Page Right Banner 2</option>
                                                <option value="8" {{ isset($advertises) && $advertises->type == "8" ? 'selected' : '' }}>Details Page Right Banner 8</option>
                                                <option value="9" {{ isset($advertises) && $advertises->type == "9" ? 'selected' : '' }}>Details Page Main Banner 1</option>
                                                @else
                                                <option>Select Type</option>
                                                <option value="1">Main Page Banner </option>
                                                <option value="2">Main Page Right Side Banner</option>
                                                <option value="3">Category Main Banner 1</option>
                                                <option value="4">Category Page Right Banner</option>
                                                <option value="5">Category Main Banner 2</option>
                                                <option value="6">Details Page Right Banner 1</option>
                                                <option value="7">Details Page Right Banner 2</option>
                                                <option value="8">Details Page Right Banner 3</option>
                                                <option value="9">Details Page Main Banner 1</option>
                                                @endisset

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Select Ad Size</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="size" id="size">
                                                @isset($advertises)
                                                <option value="1250x150" {{ isset($advertises) && $advertises->size == "1250x150" ? 'selected' : '' }}>1250x150</option>
                                                <option value="300x250" {{ isset($advertises) && $advertises->size == "300x250" ? 'selected' : '' }}>300x250</option>
                                                <option value="980x120" {{ isset($advertises) && $advertises->size == "980x120" ? 'selected' : '' }}>980x120</option>
                                                <option value="300x250" {{ isset($advertises) && $advertises->size == "300x250" ? 'selected' : '' }}>300x250</option>
                                                <option value="300x600" {{ isset($advertises) && $advertises->size == "300x600" ? 'selected' : '' }}>300x250</option>
                                                @else
                                                <option>Select Ad Size</option>
                                                <option value="1250x150">1250x150</option>
                                                <option value="300x246">300x250</option>
                                                <option value="980x120">980x120</option>
                                                <option value="300x250">300x250</option>
                                                <option value="300x600">300x250</option>
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Redirect Url</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" class="form-control" placeholder="Enter http/https://example.com" name="redirect_url" value="{{ old('redirect_url',isset($advertises) ? $advertises->redirect_url : '' )}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Ad Image</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" name="adimage" id="adimage" @empty($advertises) required @endempty  />
                                                @isset($advertises)
                                                <a class="btn btn-sm btn btn-gradient-success mt-3" href="{{ asset('backend/images/advertise/'.$advertises->adimage) }}">Show Image</a>
                                                @endisset
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Select Status</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="status" id="status">
                                                @isset($advertises)
                                                <option value="1" {{ isset($advertises) && $advertises->status == "1" ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ isset($advertises) && $advertises->status == "0" ? 'selected' : '' }}>Inactive</option>
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

                            <div class="text-center">
                                @isset($advertises)
                                <button type="submit" class="btn btn-gradient-success me-2">Update</button>
                                @else
                                <button type="submit" class="btn btn-gradient-primary me-2">Add Advertise</button>
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
                                    <th class=" text-center"> Advertisement Type </th>
                                    <th class=" text-center"> Ad Size </th>
                                    <th class=" text-center"> Ad Image </th>
                                    <th class=" text-center"> Status </th>
                                    <th class=" text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advertise as $key=>$advertise)
                                <tr>
                                    <td class=" text-center">{{$key+1}}</td>
                                    <td class=" text-center">
                                        

                                        @if($advertise->type == 1)
                                        <span class="badge badge-pill badge-success" style="font-weight: bolder;color: black;">Banner</span>
                                        @elseif($advertise->type == 2)
                                        <span class="badge badge-pill badge-success" style="font-weight: bolder;color: black;">Right Side Banner</span>
                                        @elseif($advertise->type == 3)
                                        <span class="badge badge-pill badge-success" style="font-weight: bolder;color: black;">Category Page Main Banner</span>
                                        @elseif($advertise->type == 4)
                                        <span class="badge badge-pill badge-success" style="font-weight: bolder;color: black;">Category Page Right Banner</span>
                                        @elseif($advertise->type == 5)
                                        <span class="badge badge-pill badge-success" style="font-weight: bolder;color: black;">Category Page Main Banner 2</span>
                                        @elseif($advertise->type == 6)
                                        <span class="badge badge-pill badge-success" style="font-weight: bolder;color: black;">Details Page Right Banner 1</span>
                                        @elseif($advertise->type == 7)
                                        <span class="badge badge-pill badge-success" style="font-weight: bolder;color: black;">Details Page Right Banner 2</span>
                                        @elseif($advertise->type == 8)
                                        <span class="badge badge-pill badge-success" style="font-weight: bolder;color: black;">Details Page Right Banner 3</span>
                                        @elseif($advertise->type == 9)
                                        <span class="badge badge-pill badge-success" style="font-weight: bolder;color: black;">Details Page Main Banner 1</span>
                                        @endif
                                    </td>

                                    <td class=" text-center">
                                        <span class="badge badge-pill badge-primary" style="font-weight: bolder;color: black;">{{ $advertise->size }}</span>
                                    </td>

                                    <td class=" text-center">
                                        <a class="btn btn-sm btn btn-gradient-success" href="{{ asset('backend/images/advertise/'.$advertise->adimage) }}">see</a>
                                    </td>

                                    <td class=" text-center">
                                        @if($advertise->status == 1)
                                        <div class="badge badge-success">Active</div>
                                        @else
                                        <div class="badge badge-warning">Inative</div>
                                        @endif
                                    </td>

                                    <td class=" text-center">
                                        <a href="@if(Auth::guard('admin')->check()){{route('admin.edit_advertise',$advertise->id_advertise)}}@else{{route('staff.edit_advertise',$advertise->id_advertise)}}@endif" class="btn btn-sm btn btn-gradient-info">Edit</a>
                                        
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