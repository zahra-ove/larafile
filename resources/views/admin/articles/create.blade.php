@extends('admin.layout.master')

@section('title', 'ایجاد مقاله جدید')

@section('content')

    @include('admin.layout.notifications')
    <div class="card">

        <div class="card-header text-center" style="background-color: lightseagreen">
            <h2 class="text-white align-middle m-0">اطلاعات مقاله جدید</h2>
        </div>

        <div class="card-body">
            <form action="{{route('admin.articles.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- first row --}}
                <div class="form-row justify-content-center">
                    <div class="form-group col-3">
                        <label class="control-label" for="title" >عنوان مقاله</label>
                        <input type="text"  name="title"  id="title" class="form-control" value="{{old('title')}}" />
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="slug" >Slug</label>
                        <input type="text"  name="slug"  id="slug" class="form-control" value="{{old('slug')}}" required/>
                    </div>

                    <div class="form-group col-3 mr-2">
                        <label class="control-label" for="cat" >دسته بندی</label>
                        <select name="category_id" id="cat" class="custom-select">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{--  second row --}}
                <div class="form-row justify-content-center mt-4">
                    <div class="form-group">
                        <label class="control-label" for="desc_ck" >متن مقاله</label>
                        <textarea name="body" id="desc_ck" cols="30" rows="20">{{old('body')}}</textarea>
                    </div>
                </div>

                {{-- third element --}}
                <div class="form-row justify-content-center mt-4">
                    <div  class="form-group ml-2" >
                        <label for="img" class="control-label">آپلود تصویر مقاله</label>
                        <input type="file" name="image" id="img" class="form-control">
                    </div>

                    <div  class="form-group" >
                        <label for="img_type" class="control-label">نوع تصویر</label>
                        <select name="type" id="img_type" class="custom-select">
                            <option value="b">بنر</option>
                            <option value="o">معمولی</option>
                        </select>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="row justify-content-center mt-5">
                    <div class="col-4 text-center">
                        <button type="submit" class="btn btn-secondary btn-sm">ذخیره</button>
                        <a href="{{route('admin.articles.index')}}" class="btn btn-primary btn-sm">بازگشت</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
