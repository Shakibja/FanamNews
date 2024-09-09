@extends('backend.mastering.master')
@section('shakib')
@php
use App\Models\Backend\Category;
use Carbon\Carbon;
@endphp
<style>
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        z-index: 1000;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.5);
        /* Black with opacity */
    }

    /* Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Modal Content */
    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        /* Centered */
        padding: 20px;
        border: 1px solid #888;
        width: 40%;
        /* Could be more or less, depending on screen size */
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        /* Stack children vertically */
        align-items: center;
        /* Center items horizontally */
    }

    .modal-footer {
        display: flex;
        /* Align children on the same row */
        justify-content: center;
        /* Center children horizontally */
        gap: 10px;
        /* Space between buttons */
        margin-top: 20px;
        /* Space above the buttons */
    }

    .modal-footer button {
        width: 100px;
        /* Fixed width for buttons */
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Breaking News List</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Breaking News List</a></li>
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
                                    <th class="text-center"> Sl No.</th>
                                    <th class="text-center"> Headline</th>
                                    <th class="text-center"> Category </th>
                                    <th class="text-center"> Post Date </th>
                                    <th class="text-center"> Status </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($breaking_news as $key=>$post_news)
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
                                        <button class="btn btn-sm btn-gradient-info" onclick="openCustomModal('{{ $post_news->slug }}', '{{ $post_news->news_headline }}')">Delete</button>


                                    </td>

                                </tr>


                                <!-- Container for modals -->
                                <div id="modals-container"></div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openCustomModal(slug, news_headline) {
            // Create modal HTML
            const modalHTML = `
                                            <div class="modal" id="modal-${slug}">
                                                <div class="modal-content">
                                                    <h2>Confirmation Message !</h2>
                                                    <p>Are you sure you want to delete this news: ${news_headline}?</p>
                                                    <div class="modal-footer">
                                                        <a href="${getDeleteUrl(slug)}" class="btn btn-sm btn-gradient-danger" style="width:100px;">Delete</a>
                                                        <button class="btn btn-sm btn-gradient-success" onclick="closeCustomModal('${slug}')" style="width:100px;">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        `;

            // Append modal to container
            document.getElementById('modals-container').innerHTML = modalHTML;

            // Show modal
            document.getElementById(`modal-${slug}`).style.display = 'block';
        }

        function closeCustomModal(slug) {
            // Hide modal
            const modal = document.getElementById(`modal-${slug}`);
            if (modal) {
                modal.style.display = 'none';
                // Remove modal from DOM
                modal.remove();
            }
        }

        // Function to get the delete URL based on authentication
        function getDeleteUrl(slug) {
            // Determine the delete URL based on the authentication status
            const isAdmin = @json(Auth::guard('admin') -> check());
            const baseUrl = isAdmin ? "{{ route('admin.delete_news', ['slug' => 'slug']) }}" : "{{ route('staff.delete_news', ['slug' => 'slug']) }}";
            return baseUrl.replace('slug', slug);
        }

        // Close modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal')) {
                closeCustomModal(event.target.id.split('-')[1]);
            }
        });
    </script>


    <!-- footer starts  -->
    @include('backend.includes.footer')
    <!-- footer ends  -->
</div>
@endsection
