@extends('site.layouts.app')

@section('content')
    <div class="container p-0">
        <div class="row position-relative">
            <div class="col-12 border-white">
                <div class="search-main-wrap mb-3">
                    <div class="search-tool-wrap">
                        <form action="{{ route('site.search.index') }}" method="GET">
                            <input type="text" placeholder="Type what you search" name="search" value="{{ request('search') }}">
                            <button>
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-none d-lg-block d-xl-block col-lg-4 col-xl-3 category-list-wrap">
                        <p><i class="fa-solid fa-sliders me-1"></i>Filter with Category</p>
                        <div class="category-list">
                            <ul>
                                <li class="d-flex justify-content-between align-items-center">
                                        <input type="radio" name="category_id" id="category1" class="me-3">
                                        <label for="category1" class="category-label pb-0">Media and Entertainment</label>
                                    <a class="badge bg-info">
                                        22
                                    </a>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                        <input type="radio" name="category_id" id="category2" class="me-3">
                                        <label for="category2" class="category-label pb-0">Political</label>
                                    <a class="badge bg-info">
                                        22
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-xl-9 blog-list-wrap">
                        <div class="mb-3">
                            <button 
                                class="btn btn-info btn-md shadow-none d-block d-lg-none d-xl-none" 
                                @click="openCategoryFloat=!openCategoryFloat"
                                x-init="$watch('openCategoryFloat', toggleOverflow)"    
                            >
                                <i class="fa-solid fa-sliders me-1"></i>
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3 px-0">
                                <div class="blog-card">
                                    <img src="{{ asset('site/img/brooke-cagle-g1Kr4Ozfoac-unsplash.jpg') }}" width="100%" height="170px" style="object-fit: cover" alt="" class="">
                                    <div class="blog-text pb-3 px-2">
                                        <div class="mb-3 gap-2">
                                            <span class="badge bg-info text-dark">Political</span>
                                            <span class="badge bg-info text-dark">Political</span>
                                            <span class="badge bg-info text-dark">Political</span>
                                        </div>
                                        <h5>
                                            Animation And Editing
                                        </h5>
                                        <a href="" class="btn btn-sm btn-link ps-0 text-decoration-none text-info me-auto shadow-none outline-none mt-3 d-flex gap-2 align-items-center">
                                            See more<i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('site.layouts.responsive-menu')
        </div>
    </div>
    <div 
        class="category-list-float" 
        x-cloak @click.away="openCategoryFloat=false" 
        x-show="openCategoryFloat"
        @keyup.escape.window="openCategoryFloat=false"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.400ms
    >
        <p><i class="fa-solid fa-sliders me-1"></i>Filter with Category</p>
        <div class="category-list">
            <ul>
                <li class="d-flex justify-content-between align-items-center">
                        <input type="radio" name="category_id" id="category1" class="me-3">
                        <label for="category1" class="category-label pb-0">Media and Entertainment</label>
                    <a class="badge bg-info">
                        22
                    </a>
                </li>
                <li class="d-flex justify-content-between align-items-center">
                        <input type="radio" name="category_id" id="category2" class="me-3">
                        <label for="category2" class="category-label pb-0">Political</label>
                    <a class="badge bg-info">
                        22
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#flipButton").click(function() {
                $("#card-front").toggleClass("flipped");
                $("#card-back").toggleClass("flipped");
                $("#card-front").css('display', 'none');
                $("#card-back").css('display', 'block !important')
            });

            $("#flipButtonBack").click(function() {
                $("#card-front").toggleClass("flipped");
                $("#card-back").toggleClass("flipped");
            });
        });
    </script>
@endpush