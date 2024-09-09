@extends('backend.mastering.master')
@section('shakib')
@php
  use App\Models\Backend\Category;
  use Carbon\Carbon;
@endphp
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> News List</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">News List</a></li>
                </ol>
            </nav>
        </div>
        
        <div class="row"> 
            <div class="col-12 col-md-12">
            <a href="@if(Auth::guard('admin')->check()){{ route('admin.add_news_page') }}@else{{ route('staff.add_news_page') }}@endif" class="btn btn-gradient-primary me-2 mb-3" style="float: right;">Add News</a>
            </div>
        </div>

        <div class="row">

            <div class="col-12 col-md-12 grid-margin stretch-card">
                <div class="card" style="overflow-x: auto">
                    <div class="card-body">
                        <h4 class="card-title">News List</h4>

                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th class="text-center"> NEWS ID NO.</th>
                                    <th class="text-center"> HEADLINE</th>
                                    <th class="text-center"> CATEGORY </th>
                                    <th class="text-center"> POST DATE </th>
                                    <th class="text-center"> Status </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post_news_datas as $key=>$post_news)
                                @php
                                $eng = array('1','2','3','4','5','6','7','8','9','0');
                                $bng = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
                                $date = Carbon::parse($post_news->created_at)->isoFormat('D MMMM YYYY');
                                @endphp
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td class=" text-left">
                                    {{ $post_news->news_headline }}
                                    </td>

                                    <td class=" text-center">
                                    @php
                                        $categogy = Category::where('category_slug', $post_news->category_slug)->first();
                                        echo $categogy->category_name;
                                    @endphp
                                    </td>

                                    <td class=" text-center">
                                    {{ str_ireplace($eng, $bng, $date) }}
                                    </td>


                                    <td class=" text-center">
                                        @if($post_news->news_status == 1)
                                        <div class="badge badge-success">Active</div>
                                        @else
                                        <div class="badge badge-warning">Inative</div>
                                        @endif
                                    </td>

                                    <td>
                                        <a href=" @if(Auth::guard('admin')->check()){{route('admin.edit_news_page',$post_news->slug)}}@else{{route('staff.edit_news_page',$post_news->slug)}}@endif" class="btn btn-sm btn btn-gradient-info">Edit</a>
                                       

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