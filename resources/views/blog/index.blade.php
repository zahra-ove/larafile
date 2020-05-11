@extends('layout.master')

@section('content')

<div class="container mt-5">
    <h4>مقالات آموزشی</h4>
    <div class="row mb-3">
        <div class="col-10">
            @forelse ($articles->chunk(3) as $items)
                <div class="row">

                    @foreach($items as $article)
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card mt-3 mb-2 test shadow" style="max-height:75vh;min-height:40vh;border-radius:20px;">
                                <img src="{{asset($article->images()->where('type', 'o')->first()->image_path.'/'.$article->images()->where('type', 'o')->first()->image_name)}}" alt="article image" class="card-img-top mx-auto" style="height:200px;border-radius:20px;">
                                <div class="card-body" style="border-radius:10px;">
                                    <a href="{{route('blog.show', ['slug' => $article->slug])}}"><p class="card-text text-center font-weight-light">{{$article->title}}</p></a>

                                    {{-- @isset($rates[$product->id]) {{$rates[$product->id]}} @else {{'0'}} @endisset --}}

                                    {{-- <span class="float-right ml-1" style="color:red; font-size:12px;">تومان</span> <span class="float-right font-weight-bold" style="color:red; font-size:12px;"> {{$product->price}}</span> --}}
                                    {{-- <span class="float-left font-weight-bold d-clock" style="color:red; font-size:12px;"> :امتیاز <div class="float-left rateyo2 mt-1"></div></span> --}}
                                    {{-- <input type="hidden" class="info"  data-avg="@isset($rates[$product->id]) {{$rates[$product->id]}} @else {{'0'}} @endisset"  /><br/> --}}
                                    {{-- <span class="float-left font-weight-lighter ml-4" style="color:darkred; font-size:10px;"> @isset($rates[$product->id]) {{$rates[$product->id]}} @else {{'0'}} @endisset</span><span class="float-left ml-1" style="color:darkred; font-size:10px;">امتیاز</span> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @empty
                <p>هیچ مقاله ایی وجود ندارد.</p>
            @endforelse

        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mb-3 justify-content-center">
        {{$articles->links()}}
    </div>
</div>

@endsection
