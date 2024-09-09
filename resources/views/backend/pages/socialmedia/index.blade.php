@extends('backend.mastering.master')
@section('shakib')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<div class="main-panel">
    <div class="content-wrapper">
        @if (session('social_media_success'))
        <div class="alert alert-success">
            {{ session('social_media_success') }}
        </div>
        @endif
        <div class="page-header">
            <h3 class="page-title"> Social Icons</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Social Icons</a></li>

                </ol>
            </nav>
        </div>
        <div class="row">

            <div class="col-12 col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Horizontal Two column</h4> -->
                        <form action="{{ isset($social_medias) ? route('admin.update_social_page', $social_medias->id) : route('admin.store_social_page') }}" method="post" class="form-sample">
                            @csrf
                            @isset($social_medias)
                            @method('PUT')
                            @endisset
                            <!-- <p class="card-description"> Personal info </p> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Social Media Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Social Media Name" name="social_name" value="{{ old('social_name',isset($social_medias) ? $social_medias->social_name : '' )}}" @isset($social_medias)readonly @endisset @empty($social_medias) required @endempty />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Social Media Link</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Social Media Link" name="social_link" value="{{ old('social_name',isset($social_medias) ? $social_medias->social_link : '' )}}" @isset($social_medias)readonly @endisset @empty($social_medias) required @endempty />
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Social Media URL</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Social Media URL" name="social_url" value="{{ old('social_name',isset($social_medias) ? $social_medias->social_url : '' )}}" required />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Select Status</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="social_status" id="social_status">
                                                @isset($social_medias)
                                                <option value="1" {{ isset($social_medias) && $social_medias->social_status == "1" ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ isset($social_medias) && $social_medias->social_status == "0" ? 'selected' : '' }}>Inactive</option>
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
                                @isset($social_medias)
                                <button type="submit" class="btn btn-gradient-success me-2">Update</button>
                                @else
                                <button type="submit" class="btn btn-gradient-primary me-2">Add</button>
                                @endisset
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 grid-margin stretch-card">
                <div class="card" style="overflow-x: auto">
                    <div class="card-body">
                        <h4 class="card-title">Social List</h4>
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th> Serial No.</th>
                                    <th> Title </th>
                                    <th> Social icon </th>
                                    <th> Url </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($social_media as $key=>$social)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $social->social_name }}</td>
                                    <td class="text-center"><i class="{{ $social->social_link }}"></i></td>
                                    <td>{{ $social->social_url }}</td>
                                    <td>
                                        @if($social->social_status == 1)
                                        <div class="badge badge-success">Active</div>
                                        @else
                                        <div class="badge badge-warning">Inative</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.edit_social_page',$social->id)}}" class="btn btn-sm btn btn-gradient-info">Edit</a>                                        
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