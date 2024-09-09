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
    @if (session('add_news_success'))
        <div class="alert alert-success">
            {{ session('add_news_success') }}
        </div>
    @endif
        <div class="page-header">
            <h3 class="page-title"> Post news</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Post news</a></li>
                </ol>
            </nav>
        </div>
        

        <div class="row">
            <div class="col-12 col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Horizontal Two column</h4> -->
                        <form action="@if(Auth::guard('admin')->check()){{ isset($post_news_data) ? route('admin.update_news', $post_news_data->slug) : route('admin.store_news') }}@else{{ isset($post_news_data) ? route('staff.update_news', $post_news_data->slug) : route('staff.store_news') }}@endif" method="post" class="form-sample" enctype="multipart/form-data">
                            @csrf
                            @isset($post_news_data)
                                @method('PUT')
                            @endisset
                            
                            <!-- <p class="card-description"> Personal info </p> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">News Head Line </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter News Headline" name="news_headline" value="{{ old('news_headline',isset($post_news_data) ? $post_news_data->news_headline : '' )}}" />
                                        </div>
                                    </div>
                                </div>
                                


                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">News Sub-heading</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter News Sub-heading" name="news_shoulder" value="{{ old('news_shoulder',isset($post_news_data) ? $post_news_data->news_shoulder : '' )}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">News Category</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="category_slug" id="category_slug">
                                                <option>Select Category</option>
                                                @foreach ($news_category as $news_category)
                                                <option value="{{ $news_category->category_slug }}"
                                                {{ (old('category_slug') && old('category_slug') == $news_category->category_slug) || (isset($post_news_data) && $post_news_data->category_slug == $news_category->category_slug) ? 'selected' : '' }}>
                                                {{$news_category->category_name}}
                                            </option>
                                                @endforeach
                                            </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Author Name</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="author_name" id="author_name">
                                                <option>Select Category</option>
                                                @if(Auth::guard('admin')->check())
                                                @foreach([$admin] as $adminOption) 
                                                    <option value="{{ $adminOption->name }}"
                                                        {{ (old('author_name') && old('author_name') == $adminOption->name) || (isset($post_news_data) && $post_news_data->author_name == $adminOption->name) ? 'selected' : '' }}>
                                                        {{ $adminOption->name }}
                                                    </option>
                                                @endforeach
                                                @else
                                                @foreach($users as $userOption) 
                                                    <option value="{{ $userOption->name }}"
                                                        {{ (old('author_name') && old('author_name') == $userOption->name) || (isset($post_news_data) && $post_news_data->author_name == $userOption->name) ? 'selected' : '' }}>
                                                        {{ $userOption->name }}
                                                    </option>
                                                @endforeach
                                                @endif
                                            </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Select News Status</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="news_status" id="news_status">
                                            @isset($post_news_data)
                                                <option value="1" {{ isset($post_news_data) && $post_news_data->news_status == "1" ? 'selected' : '' }}>Published</option>
                                                <option value="0" {{ isset($post_news_data) && $post_news_data->news_status == "0" ? 'selected' : '' }}>Draft</option>
                                                @else
                                                <option>Select News Status</option>
                                                <option value="1">Published</option>
                                                <option value="0">Draft</option>
                                                @endisset
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">News Headline Image</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" name="news_title_image" id="news_title_image" @empty($post_news_data) required @endempty />
                                                @isset($post_news_data)
                                                <a class="btn btn-sm btn btn-gradient-success mt-3" href="{{ asset('backend/images/news-himages/'.$post_news_data->news_title_image) }}">Show Image</a>
                                                @endisset
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Image Alter Tag </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Image Alter Tag " name="title_image_courtecy" value="{{ old('title_image_courtecy',isset($post_news_data) ? $post_news_data->title_image_courtecy : '' )}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Meta Key Words</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Enter Meta Key Words" name="news_keywords" value="{{ old('news_keywords',isset($post_news_data) ? $post_news_data->news_keywords : '' )}}" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    
                                    <div class="col-md-12">
                                @if (isset($post_news_data) && $post_news_data->lead_news_status == '1')
                                    <div class="form-group row">
                                        <div class="col-md-2 px-0">
                                            <input type="checkbox" name="lead_news_status" id="lead_news_status" value="1" checked>
                                        </div>
                                        <div class="col-md-10">
                                            <label for="lead_news_status" class="ml-1 font-16-bold fw-bold">লিড নিউজ</label>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group row">
                                        <div class="col-md-2 mr-3">
                                            <input type="checkbox" name="lead_news_status" id="lead_news_status" value="1" >
                                        </div>
                                        <div class="col-md-10">
                                            <label for="lead_news_status" class="ml-1 font-16-bold fw-bold">লিড নিউজ</label>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                @if (isset($post_news_data) && $post_news_data->tot_status == '1')
                                    <div class="form-group row">
                                        <div class="col-md-2 mr-3">
                                            <input type="checkbox" name="tot_status" id="tot_status" value="1" checked>
                                        </div>
                                        <div class="col-md-10">
                                            <label for="tot_status" class="ml-1 font-16-bold fw-bold">আলোচনার শীর্ষে</label>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group row">
                                        <div class="col-md-2 mr-3">
                                            <input type="checkbox" name="tot_status" id="tot_status" value="1" >
                                        </div>
                                        <div class="col-md-10">
                                            <label for="tot_status" class="ml-1 font-16-bold fw-bold">আলোচনার শীর্ষে</label>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                @if (isset($post_news_data) && $post_news_data->elected_status == '1')
                                    <div class="form-group row">
                                        <div class="col-md-2 mr-3">
                                            <input type="checkbox" name="elected_status" id="elected_status" value="1"checked>
                                        </div>
                                        <div class="col-md-10">
                                            <label for="elected_status" class="ml-1 font-16-bold fw-bold">নির্বাচিত</label>
                                        </div>
                                    </div>

                                    @else
                                    <div class="form-group row">
                                        <div class="col-md-2 mr-3">
                                            <input type="checkbox" name="elected_status" id="elected_status" value="1">
                                        </div>
                                        <div class="col-md-10">
                                            <label for="elected_status" class="ml-1 font-16-bold fw-bold">নির্বাচিত</label>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                    
                                </div>    
                                
                                
                            </div>

                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">News Highlights</label>
                                        <div class="col-sm-12">
                                            <textarea id="newsHighlightEditor" name="news_highlights" class="ckeditor form-control" cols="30" rows="5">{{ old('news_highlights',isset($post_news_data) ? $post_news_data->news_highlights : '' )}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">News Body </label>
                                        <div class="col-sm-12">
                                            <textarea id="newsBodyEditor" name="news_body" class="ckeditor form-control" cols="30" rows="2">{{ old('news_body',isset($post_news_data) ? $post_news_data->news_body : '' )}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Meta Description </label>
                                        <div class="col-sm-12">
                                            <textarea id="" name="meta_description" class="ckeditor form-control" cols="30" rows="6">{{ old('meta_description',isset($post_news_data) ? $post_news_data->meta_description : '' )}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
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
                                </div> -->
                            </div>

                            

                            

                            <div class="text-center">
                                @isset($post_news_data)
                                <button type="submit" class="btn btn-gradient-success me-2">Update</button>
                                @else
                                <button type="submit" class="btn btn-gradient-primary me-2">Add News</button>
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