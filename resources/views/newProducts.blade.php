<div class="container">
    <div class="row">
        <div class="col-md-12 no0-padding">
            <div class="owl-carousel owl-theme  mt-4">
                @foreach($newFiles as $newFile)
                    <div class="item">
                        <div class="card mt-3">
                            <img src="{{asset($newFile->images()->first()->image_path.'/'.$newFile->images()->first()->image_name)}}" alt="product image" class="card-img-top">
                            <div class="card-body">
                                <p>{{$newFile->file_name}}</p>
                                <p>{{$newFile->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="item">
                    <div class="card">
                        <img src="/assets/img/12.jpg" alt="">
                        <div class="card-body">
                            <h3>T-shirt</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="/assets/img/12.jpg" alt="">
                        <div class="card-body">
                            <h3>T-shirt</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="/assets/img/12.jpg" alt="">
                        <div class="card-body">
                            <h3>T-shirt</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="/assets/img/12.jpg" alt="">
                        <div class="card-body">
                            <h3>T-shirt</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="/assets/img/12.jpg" alt="">
                        <div class="card-body">
                            <h3>T-shirt</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="/assets/img/12.jpg" alt="">
                        <div class="card-body">
                            <h3>T-shirt</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="/assets/img/12.jpg" alt="">
                        <div class="card-body">
                            <h3>T-shirt</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="/assets/img/12.jpg" alt="">
                        <div class="card-body">
                            <h3>T-shirt</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="/assets/img/12.jpg" alt="">
                        <div class="card-body">
                            <h3>T-shirt</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="/assets/img/12.jpg" alt="">
                        <div class="card-body">
                            <h3>T-shirt</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card">
                        <img src="/assets/img/12.jpg" alt="">
                        <div class="card-body">
                            <h3>T-shirt</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- end /.featured__preview-img -->
</div>
