@extends('backend.mastering.master')
@section('shakib')
<style>
    select.form-select {
    padding: 0.4375rem 0.75rem;
    border: 0;
    outline: 1px solid #ebedf2;
    color: black;
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
    @if (session('site_settings_success'))
        <div class="alert alert-success">
            {{ session('site_settings_success') }}
        </div>
    @endif
        <div class="page-header">
            <h3 class="page-title"> Site Settings</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Site Settings</a></li>
                </ol>
            </nav>
        </div>
        

        <div class="row">
            <div class="col-12 col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Horizontal Two column</h4> -->
                        <form action="{{ isset($site_set) ? route('admin.update_site_settings', $site_set->id) : route('admin.store_site_settings_page') }}" method="post" class="form-sample" enctype="multipart/form-data">
                            @csrf
                            @isset($site_set)
                                @method('PUT')
                            @endisset
                            <!-- <p class="card-description"> Personal info </p> -->
                            <h3 class="page-title"> Header</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Site Title </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Site Title" name="site_title" value="{{ old('site_title',isset($site_set) ? $site_set->site_title : '' )}}" />
                                        </div>
                                    </div>
                                </div>
                                


                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Meta Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Meta Title" name="meta_title" value="{{ old('meta_title',isset($site_set) ? $site_set->meta_title : '' )}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Header Logo</label>
                                        <div class="col-sm-12">
                                        <input type="file" class="form-control" name="header_logo" id="header_logo"  />
                                        @isset($site_set)
                                                <a class="btn btn-sm btn btn-gradient-success mt-3" href="{{ asset('backend/images/site_settings/'.$site_set->header_logo) }}">Show Header Logo</a>
                                                @endisset
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Favicon</label>
                                        <div class="col-sm-12">
                                        <input type="file" class="form-control" name="favicon" id="favicon"  />
                                        @isset($site_set)
                                                <a class="btn btn-sm btn btn-gradient-success mt-3" href="{{ asset('backend/images/site_settings/'.$site_set->favicon) }}">Show Favicon</a>
                                                @endisset
                                        </div>
                                    </div>
                                </div>

                                <h3 class="page-title"> Footer</h3>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Editor & Publisher Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Editor & Publisher Name" name="editor_name" value="{{ old('editor_name',isset($site_set) ? $site_set->editor_name : '' )}}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Phone Number</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone_number" value="{{ old('phone_number',isset($site_set) ? $site_set->phone_number : '' )}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email',isset($site_set) ? $site_set->email : '' )}}" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Address</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Address" name="address" value="{{ old('address',isset($site_set) ? $site_set->address : '' )}}" />
                                        </div>
                                    </div>
                                </div>  
                                
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Copyright</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Copyright" name="copyright" value="{{ old('copyright',isset($site_set) ? $site_set->copyright : '' )}}" />
                                        </div>
                                    </div>
                                </div> 
                                
                                
                            </div>


                            <div class="text-center">
                            @isset($site_set)
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