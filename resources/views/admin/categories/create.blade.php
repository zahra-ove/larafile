@extends('admin.layout.master')

@section('title', 'ایجاد دسته جدید')

@section('content')

    @include('admin.layout.notifications')

    <div class="card">

        <div class="card-header text-center" style="background-color:lightgoldenrodyellow;">
            <h2 class="align-middle m-0" style="color: darkslategrey;">ایجاد دسته جدید</h2>
        </div>

        <div class="card-body">
            <form action="{{route('admin.categories.store')}}" method="POST">
                @csrf

                <div class="form-row justify-content-center">
                    <div class="form-group col-4">
                        <label class="control-label" for="name" >نام دسته</label>
                        <input type="text"  name="name"    id="name" class="form-control" value="{{old('name')}}" required/>
                    </div>

                    <div class="form-group col-4 mr-2">
                        <label class="control-label" for="parent_id" >نام دسته والد</label>
                        <select name="parent_id" id="parent_id" class="custom-select">
                            @foreach ($allCategories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-4 mr-2">
                        <label class="control-label" for="description" >توضیحات</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{old('description')}}</textarea>
                    </div>
                </div>


                <div class="mt-4 form-row justify-content-center">
                    <button type="submit" class="btn btn-primary">ذخیره</button>
                </div>

            </form>
        </div>

    </div>

@endsection
