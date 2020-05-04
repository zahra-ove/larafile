@extends('layout.master')

@section('title')
   {{$file->file_name}}
@endsection

{{-- this meta tag is needed when using ajax request, because it needed csrf and I dont use form so based on laravel documentation we can use this meta tag for specifying csrf_token --}}
@section('meta_csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<!-- Start Header section -->
<div class="card mt-2" dir="rtl">
    <div class="card-header" style="height:100px;">
        <div class="row justify-content-around mt-4">
            <div class="col-4  text-center">
                <h3 class="font-weight-bold" style="color:#216353">{{$file->file_name}}</h3>
            </div>
            <div class="col-4 text-center">
                <small class="text-muted font-italic">کد محصول: {{$file->file_code}}</small>
            </div>
        </div>
    </div>
</div>
<!-- End Header section -->



<!-- Start Banner section -->
<div class="container">
    <div class="row mt-4">
        {{-- <img src="{{asset($file->images[1]->image_path.'/'.$file->images[1]->image_name)}}" alt="Banner"> --}}
        <img src="{{asset($file->images()->where('type', 'b')->first()->image_path.'/'.$file->images()->where('type', 'b')->first()->image_name)}}" alt="Banner">
    </div>
</div>
<!-- End Banner section -->


<!-- Start Main Content -->
<div class="container mt-3">
    <div class="row" dir="rtl">

        <!-- Start Right section -->
        <div class="col-md-8">

            <!-- Start Course Description section -->
            <div class="card">
                <div class="card-header font-weight-bolder">توضیحات دوره</div>
                <div class="card-body justify-content-center">{!!$file->description!!}</div>
            </div>
             <!-- End Course Description section -->

            <!-- Start Course Episode section -->
            <div class="card">
                <div class="card-header font-weight-bold"><span>سرفصل ها</span></div>
                <div class="card-body mb-5"></div>
            </div>
            <!-- Start Course Episode section -->
        </div>
        <!-- End Right section -->

        <!-- Start Left section -->
        <div class="col-md-4">

            <div class="card">
                <div class="card-header font-weight-bolder text-center">خرید دوره</div>
                <div class="card-body text-center">
                    <p>قیمت: <span>{{$file->price}} تومان</span></p>
                    {{-- <a href="{{route('addToCart', ['type' => 'file', 'id' => $file->id])}}" class="btn btn-success p-3 font-weight-bold" id="fileAdd2Cart" data-id={{$file->id}}>افزودن به سبد خرید<i class="fas fa-shopping-cart ml-2"></i></a>  <!-- using normal route  --> --}}
                    <a href="" class="btn btn-success p-3 font-weight-bold" id="fileAdd2Cart" data-id={{$file->id}}>افزودن به سبد خرید<i class="fas fa-shopping-cart ml-2"></i></a>    <!-- using ajax  -->
                    {{-- <p class="mt-5 pt-3" style="border-top:1px solid lightgray;"><i class="far fa-heart mr-2 fa-2x" id="heart"></i>افزودن علاقمندی</p> --}}
                    <div class="mt-4 pt-3" style="border-top:1px solid lightgray;">
                        <i class="far fa-heart mr-2 fa-2x" id="heart" style="vertical-align: middle"></i><span>افزودن به علاقمندی</span>
                    </div>
                </div>
            </div>

            @include('fiveStarRating', ['type' => "File", 'id' => $file->id])

            <div class="card">
                <div class="card-header font-weight-bolder">اطلاعات دوره</div>
                <div class="card-body">
                    <p>تعداد بازدید: <span>{{$file->view_count}}</span></p>
                    <p>تعداد دانلود: <span>{{$file->download_count}}</span></p>
                    <p>نوع دوره: <span>{{$file->type->name}}</span></p>
                    <p>قیمت: <span>{{$file->price}} تومان</span></p>
                </div>
            </div>

        </div>
        <!-- End Left section -->

    </div>
</div>
<!-- End Main Content -->

<!-- Recommended Items   -->

@if($recommendedItems->count() > 0)
     @include('recommendedProducts', ['productsArray' => $recommendedItems])
@endisset


@endsection
