@extends('admin.layout.master')

@section('title', 'افزودن تگ جدید')

@section('content')

    @include('admin.layout.notifications')

    <div class="card">

        <div class="card-header text-center" style="background-color: lightseagreen">
            <h2 class="text-white align-middle m-0">اطلاعات تگ جدید</h2>
        </div>

        <div class="card-body">
            <form action="{{route('admin.tags.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row justify-content-center">
                    <div class="form-group col-4">
                        <label class="control-label" for="tagName" >نام تگ</label>
                        <input type="text"  name="name"    id="tagName" class="form-control" value="{{old('name')}}" required />
                    </div>

                    <div class="form-group col-4 mr-2">
                        <label class="control-label" for="tagDescription" >توضیحات</label>
                        <input type="text"  name="description"  id="tagDescription" class="form-control" value="{{old('tagDescription')}}" />
                    </div>
                </div>


                <div class="mt-5 form-row justify-content-center">
                    <button type="submit" class="btn btn-primary">ذخیره</button>
                </div>

            </form>
        </div>

    </div>

@endsection
