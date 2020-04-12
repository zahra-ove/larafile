<div class="container">
    <div class="row">
        <div class="col-md-12 no0-padding">
            <div class="owl-carousel owl-theme  mt-4">
                @foreach($productsArray as $file)
                    <div class="item">
                        <div class="card mt-3" style="height:75vh;">
                            {{-- <img src="{{asset($file->images()->first()->image_path.'/'.$file->images()->first()->image_name)}}" alt="product image" class="card-img-top"> --}}
                            <img src="{{asset($file->images()->where('type', 'o')->first()->image_path.'/'.$file->images()->where('type', 'o')->first()->image_name)}}" alt="product image" class="card-img-top">
                            <div class="card-body">
                                <a href="{{route('showProduct', ['id' => $file->id])}}"><p>{{$file->file_name}}</p></a>
                                <small>{!!$file->short_description!!}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
