<div class="container-fluid mt-5 py-3" style="background-color: #383A3A;">
    <h6 class="ml-2" style="color:white;">دوره های پیشنهادی</h6>
    <div class="row">
        <div class="col-md-12 no0-padding">
            <div class="owl-carousel owl-theme mt-4" id="owl-two">
                @foreach($productsArray as $file)
                    <div class="item">
                        <div class="card mt-3" style="max-height:75vh;">
                            {{-- <img src="{{asset($file->images()->first()->image_path.'/'.$file->images()->first()->image_name)}}" alt="product image" class="card-img-top"> --}}
                            <img src="{{asset($file->images()->where('type', 'o')->first()->image_path.'/'.$file->images()->where('type', 'o')->first()->image_name)}}" alt="product image" class="mx-auto card-img-top" style="width:200px;height:200px;">
                            <div class="card-body">
                                <a href="{{route('showProduct', ['id' => $file->id])}}"><p class="card-text text-center font-weight-bold">{{$file->file_name}}</p></a>
                                <small>{!!$file->short_description!!}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
