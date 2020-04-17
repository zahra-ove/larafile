@extends('layout.master')

@section('content')

<!-- Start Header section -->
{{-- <div class="row justify-content-around" dir="rtl"> --}}
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
{{-- </div> --}}
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
                <div class="card-header font-weight-bolder">امتیاز به این دوره</div>
                <div class="card-body">
                    <div class="container">
                        <div class="starrating d-flex justify-content-center ">
                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                        </div>
                  </div>
                  <div class="container">
                      <small style="color:red;">میانگین امتیارها:<span> </span> </small>
                      <small style="color:red">رای<span> </span>از</small>
                  </div>
                </div>
            </div>

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



@endsection
