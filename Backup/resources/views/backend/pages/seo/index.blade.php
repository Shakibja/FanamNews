@extends('backend.mastering.master')
@section('shakib')
<div class="main-panel">
    <div class="content-wrapper">
    @if (session('seo_success'))
        <div class="alert alert-success">
            {{ session('seo_success') }}
        </div>
    @endif
        <div class="page-header">
            <h3 class="page-title"> SEO Configuration</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">SEO Configuration</a></li>
                </ol>
            </nav>
        </div>
      {{--  <div class="row">
            <div class="col-12 col-md-12">
            <a href="{{ route('admin.manage_seo_page') }}" class="btn btn-gradient-primary me-2 mb-3" style="float: right;">View All SEO Configuration</a>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-12 col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Horizontal Two column</h4> -->
                        <form action="{{ isset($seo_datas) ? route('admin.update_seo', $seo_datas->id) : route('admin.store_seo') }}" method="post" class="form-sample" enctype="multipart/form-data">
                            @csrf
                            @isset($seo_datas)
                                @method('PUT')
                            @endisset
                            
                            <!-- <p class="card-description"> Personal info </p> -->
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Meta Image</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" name="meta_image" id="meta_image" @empty($seo_datas) required @endempty />
                                                @isset($seo_datas)
                                                <a class="btn btn-sm btn btn-gradient-success mt-3" href="{{ asset('backend/images/seo-images/'.$seo_datas->meta_image) }}">Show Image</a>
                                                @endisset
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Meta Keywords </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Meta Keywords" name="meta_keywords" value="{{ old('meta_keywords',isset($seo_datas) ? $seo_datas->meta_keywords : '' )}}" />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Meta Description</label>
                                        <div class="col-sm-12">
                                            <textarea  name="meta_desc" class="ckeditor form-control" cols="30" rows="5">{{ old('meta_desc',isset($seo_datas) ? $seo_datas->meta_desc : '' )}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Social Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Social Title" name="social_title" value="{{ old('social_title',isset($seo_datas) ? $seo_datas->social_title : '' )}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Social Description</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Social Description" name="social_desc" value="{{ old('social_desc',isset($seo_datas) ? $seo_datas->social_desc : '' )}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="text-center">
                                @isset($seo_datas)
                                <button type="submit" class="btn btn-gradient-success me-2">Update</button>
                                @else
                                <button type="submit" class="btn btn-gradient-primary me-2">Add Seo</button>
                                @endisset
                            </div>
                        </form>
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