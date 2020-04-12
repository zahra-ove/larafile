@extends('admin.layout.master')

@section('title', 'ایجاد محصول جدید')

@section('content')

    @include('admin.layout.notifications')
    <div class="card">

        <div class="card-header text-center" style="background-color: lightseagreen">
            <h2 class="text-white align-middle m-0">اطلاعات محصول جدید</h2>
        </div>

        <div class="card-body">
            <form action="{{route('admin.files.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- first row --}}
                <div class="form-row justify-content-center">
                    <div class="form-group col-3">
                        <label class="control-label" for="file_code" >کد محصول</label>
                        <input type="text"  name="file_code"    id="file_code" class="form-control" value="{{old('file_code')}}" />
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="file_name" >نام محصول</label>
                        <input type="text"  name="file_name"  placeholder="example"  id="file_name" class="form-control" value="{{old('file_name')}}" required/>
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="price" >قیمت به تومان</label>
                        <input type="text"  name="price"  placeholder="example"  id="price" class="form-control" value="{{old('price')}}" required/>
                    </div>
                </div>

                {{--  second row --}}
                <div class="form-row justify-content-center mt-4">
                    <div class="form-group col-3">
                        <label class="control-label" for="type" >نوع محصول</label>
                        <select name="type_id" id="type" class="custom-select">
                            @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="cat" >دسته بندی</label>
                        <select name="category_id" id="cat" class="custom-select">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="size" > حجم فایل بر حسب مگابایت</label>
                        <input type="text"  name="file_size"  id="size" class="form-control" value="{{old('file_size')}}" />
                    </div>
                </div>

                {{-- third row --}}
                <div class="form-row justify-content-center mt-4">
                    <div class="form-group col-3">
                        <label class="control-label" for="time" >مدت زمان به دقیقه</label>
                        <input type="text"  name="time"  id="time" class="form-control" value="{{old('time')}}" />
                    </div>


                    <div class="form-group col-3 justify-content-center text-center mr-2">
                        <label for="image">آپلود تصویر شاخص</label>
                        <input type="file" name="image" id="image" class="form-control p-0">
                    </div>
                </div>

                {{-- Third row  -- description --}}
                <div class="form-row justify-content-center mt-4">
                    <div class="form-group">
                        <label for="desc_ck" class="control-label">توضیحات محصول:</label>
                        <textarea name="description" id="desc_ck" cols="30" rows="20">{{old('description')}}</textarea>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="row justify-content-center mt-5">
                    <div class="col-4 text-center">
                        <button type="submit" class="btn btn-secondary btn-sm">ذخیره</button>
                        <a href="{{route('admin.files.index')}}" class="btn btn-primary btn-sm">بازگشت</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
