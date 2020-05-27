@extends('layout.master')

@section('content')

<div class="container-fluid bg-lightGray my-2 py-3 px-5" dir="rtl">
    <div class="row my-1">
        @isset($query)
            <h6 class="ml-2" style="color:darkslateblue">عبارت سرچ شده:  <span class="bg-lightPurple floralwhiteText px-2 py-1" style="border-radius: 10px;">{{$query}}</span></h6>
        @endisset
    </div>

    <div class="row my-3">
        @if($resultNumber != 0)

            <div class="col-12 my-2">
                <p style="background-color:lightblue;padding:2px;display:inline-block;width:150px;text-align:center;"><span style="color:darkmagenta;">{{$resultNumber}}</span> نتیجه یافت شد.</p>
            </div>

            <div class="container">
                <div class="row">
                @foreach($results as $item)
                    <div class="col-lg-3 col-md-6 col-9 my-4  mx-auto mx-lg-0">
                        <div class="card shadow" style="min-height:70vh;">
                            <img src="{{asset($item->images()->where('type', 'o')->first()->image_path.'/'.$item->images()->where('type', 'o')->first()->image_name)}}" alt="product image" class="card-img-top mx-auto" style="width:300px;height:200px;">
                            <div class="card-body">
                                <a href="{{route('showProduct', ['id' => $item->id])}}"><h5 class="card-title text-center">{{$item->file_name}}</h5></a>
                                <p class="card-text text-center">{!!$item->short_description!!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>

        @else
            <div class="container align-middle" style="min-height: 20vh;">
                @isset($query)
                    <p class="text-center  my-5">هیچ نتیجه ایی برای عبارت موردجستجو یافت نشد.</p>
                @else
                    <p class="text-center my-5">هیچ نتیجه ایی برای دسته موردنظر یافت نشد.</p>
                @endisset
            </div>
        @endif
    </div>
</div>

@endsection
