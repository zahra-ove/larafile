@extends('layout.master')

@section('title')
   {{"فروشگاه"}}
@endsection

@section('content')

<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-10">
            @forelse ($products->chunk(3) as $items)
                <div class="row">

                    @foreach($items as $product)
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card mt-3 mb-2 test" style="max-height:75vh;min-height:40vh;">
                                <img src="{{asset($product->images()->where('type', 'o')->first()->image_path.'/'.$product->images()->where('type', 'o')->first()->image_name)}}" alt="product image" class="card-img-top mx-auto" style="height:200px;">
                                <div class="card-body">
                                    <a href="{{route('showProduct', ['id' => $product->id])}}"><p class="card-text text-center font-weight-bold">{{$product->file_name}}</p></a>
                                    <small class="text-center d-block mb-3">{!!$product->short_description!!}</small>

                                    {{-- @isset($rates[$product->id]) {{$rates[$product->id]}} @else {{'0'}} @endisset --}}

                                    <span class="float-right ml-1" style="color:red; font-size:12px;">تومان</span> <span class="float-right font-weight-bold" style="color:red; font-size:12px;"> {{$product->price}}</span>
                                    <span class="float-left font-weight-bold d-clock" style="color:red; font-size:12px;"> :امتیاز <div class="float-left rateyo2 mt-1"></div></span>
                                    <input type="hidden" class="info"  data-avg="@isset($rates[$product->id]) {{$rates[$product->id]}} @else {{'0'}} @endisset"  /><br/>
                                    <span class="float-left font-weight-lighter ml-4" style="color:darkred; font-size:10px;"> @isset($rates[$product->id]) {{$rates[$product->id]}} @else {{'0'}} @endisset</span><span class="float-left ml-1" style="color:darkred; font-size:10px;">امتیاز</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @empty
                <p>هیچ محصولی وجود ندارد.</p>
            @endforelse

        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mb-3 justify-content-center">
        {{$products->links()}}
    </div>
</div>

@endsection
