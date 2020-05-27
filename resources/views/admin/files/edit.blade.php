@extends('admin.layout.master')
{{-- @dd($file->tags->pluck('id')) --}}
@section('title', 'ویرایش محصول')

@section('content')

    @include('admin.layout.notifications')
    <div class="card">

        <div class="card-header text-center" style="background-color: lightseagreen">
            <h2 class="text-white align-middle m-0">ویرایش محصول</h2>
        </div>

        <div class="card-body">
            <form action="{{route('admin.files.update', ['file' => $file])}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                {{-- first row --}}
                <div class="form-row justify-content-center">
                    <div class="form-group col-3">
                        <label class="control-label" for="file_code" >کد محصول</label>
                        <input type="text"  name="file_code"    id="file_code" class="form-control" value="{{$file->file_code}}" disabled/>
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="file_name" >نام محصول</label>
                        <input type="text"  name="file_name"  placeholder="example"  id="file_name" class="form-control" value="{{$file->file_name}}" required/>
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="price" >قیمت به تومان</label>
                        <input type="text"  name="price"  placeholder="example"  id="price" class="form-control" value="{{$file->price}}" required/>
                    </div>
                </div>

                {{--  second row --}}
                <div class="form-row justify-content-center mt-4">
                    <div class="form-group col-3">
                        <label class="control-label" for="type" >نوع محصول</label>
                        <select name="type_id" id="type" class="custom-select">
                            @foreach ($types as $type)
                                <option value="{{$type->id}}" {{($file->type_id == $type->id) ? 'selected' : ''}}>{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="cat" >دسته بندی</label>
                        <select name="category_id" id="cat" class="custom-select">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"  {{($category->id == $file->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="size" > حجم فایل بر حسب مگابایت</label>
                        <input type="text"  name="file_size"  id="size" class="form-control" value="{{$file->file_size}}" />
                    </div>
                </div>

                {{-- third row --}}
                <div class="form-row justify-content-center mt-4">
                    <div class="form-group col-3">
                        <label class="control-label" for="time" >مدت زمان به دقیقه</label>
                        <input type="text"  name="time"  id="time" class="form-control" value="{{$file->time}}" />
                    </div>


                    <div class="form-group col-3 justify-content-center text-center mr-2">
                        <label for="image">آپلود تصویر شاخص</label>
                        <input type="file" name="image" id="image" class="form-control p-0">
                    </div>
                </div>


                {{-- Forth row  -- description --}}
                <div class="form-row justify-content-center mt-4">
                    <div class="form-group">
                        <label for="desc_ck" class="control-label">توضیحات محصول:</label>
                        <textarea name="description" id="desc_ck" cols="30" rows="20">{{$file->description}}</textarea>
                    </div>
                </div>

                <!-- Fifth row ---- selecting tags for this file  -->
                <div class="form-group required">
                    <label for="tags" class="col-sm-1 control-label">تگ</label>
                    <select class="tags-list form-control" name="tags[]" id="tags" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}"  @if($file->tags->pluck('id')->contains($tag->id)) selected @endif>{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>


                {{-- buttons --}}
                <div class="row justify-content-center mt-5">
                    <div class="col-4 text-center">
                        <button type="submit" class="btn btn-secondary btn-sm">ویرایش</button>
                        <a href="{{route('admin.files.index')}}" class="btn btn-primary btn-sm">بازگشت</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
