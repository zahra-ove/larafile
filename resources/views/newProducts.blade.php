<div class="container">
    <div class="row">
        <div class="col-md-12 no0-padding">
            <div class="owl-carousel owl-theme  mt-4">
                @foreach($newFiles as $newFile)
                    <div class="item">
                        <div class="card mt-3" style="height:75vh;">
                            {{-- <img src="{{asset($newFile->images()->first()->image_path.'/'.$newFile->images()->first()->image_name)}}" alt="product image" class="card-img-top"> --}}
                            <img src="{{asset($newFile->images()->where('type', 'o')->first()->image_path.'/'.$newFile->images()->where('type', 'o')->first()->image_name)}}" alt="product image" class="card-img-top">
                            <div class="card-body">
                                <a href="{{route('showProduct', ['id' => $newFile->id])}}" ><h5 class="text-center my-3" style="color:darkslategrey">{{$newFile->file_name}}</h5></a>
                                <small>{!!$newFile->short_description!!}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
