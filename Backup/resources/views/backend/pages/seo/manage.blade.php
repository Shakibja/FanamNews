@extends('backend.mastering.master')
@section('shakib')
@php
  use App\Models\Backend\Category;
  use Carbon\Carbon;
@endphp
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Seo Configure List</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Seo Configure List</a></li>
                </ol>
            </nav>
        </div>

        <div class="row">

            <div class="col-12 col-md-12 grid-margin stretch-card">
                <div class="card" style="overflow-x: auto">
                    <div class="card-body">
                        <h4 class="card-title">Seo Configure List</h4>

                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>  ID NO.</th>
                                    <th> Meta Keywords</th>
                                    <th> Meta Description </th>
                                    <th> Social Title </th>
                                    <th> Social Description </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seo_datas as $key=>$seo_data)
                               
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td class=" text-center">
                                    {{ $seo_data->meta_keywords }}
                                    </td>

                                    <td class=" text-center">
                                    {{ $seo_data->meta_desc }}
                                    </td>

                                    <td class=" text-center">
                                    {{ $seo_data->social_title }}
                                    </td>


                                    <td class=" text-center">
                                    {{ $seo_data->social_desc }}
                                    </td>

                                    <td>
                                        <a href="{{route('admin.edit_seo_page',$seo_data->id)}}" class="btn btn-sm btn btn-gradient-info">Edit</a>

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