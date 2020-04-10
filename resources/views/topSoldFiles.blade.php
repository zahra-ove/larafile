<div class="container">
    <div class="row">
        <div class="col-md-12 no0-padding">
            <div class="owl-carousel owl-theme  mt-4">
                @foreach($topsoldFiles as $file)
                    <div class="item">
                        <div class="card mt-3">
                            <img src="{{asset($file->images()->first()->image_path.'/'.$file->images()->first()->image_name)}}" alt="product image" class="card-img-top">
                            <div class="card-body">
                                <p>{{$file->file_name}}</p>
                                <p>{{$file->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
