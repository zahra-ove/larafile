@extends('admin.layout.master')

@section('title', 'ویرایش تگ')

@section('content')

    @include('admin.layout.notifications')

    <div class="card">

        <div class="card-header text-center" style="background-color: lightseagreen">
            <h2 class="text-white align-middle m-0">ویرایش اطلاعات تگ</h2>
        </div>

        <div class="card-body">
            <form action="{{route('admin.tags.update', ['tag' => $tag])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row justify-content-center">
                    <div class="form-group col-4">
                        <label class="control-label" for="tagName" >نام تگ</label>
                        <input type="text"  name="name"    id="tagName" class="form-control" value="{{$tag->name}}" />
                    </div>

                    <div class="form-group col-4 mr-2">
                        <label class="control-label" for="tagDescription" >توضیحات</label>
                        <input type="text"  name="description"  id="tagDescription" class="form-control" value="@isset($tag->description) {{$tag->description}} @endisset "/>
                    </div>
                </div>


                <div class="mt-5 form-row justify-content-center">
                    <button type="submit" class="btn btn-secondary ml-2 btn-sm">ویرایش</button>
                    <a href="{{route('admin.tags.index')}}" class="btn btn-primary btn-sm">بازگشت</a>
                </div>

            </form>
        </div>

    </div>

@endsection
