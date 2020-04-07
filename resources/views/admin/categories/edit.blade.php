@extends('admin.layout.master')

@section('title', 'ویرایش اطلاعات دسته')

@section('content')

    @include('admin.layout.notifications')

    <div class="card">

        <div class="card-header text-center" style="background-color:lightgoldenrodyellow;">
            <h2 class="align-middle m-0" style="color: darkslategrey;">ویرایش دسته</h2>
        </div>

        <div class="card-body">
            <form action="{{route('admin.categories.update', ['category' => $category])}}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-row justify-content-center">
                    <div class="form-group col-4">
                        <label class="control-label" for="name" >نام دسته</label>
                        <input type="text"  name="name"    id="name" class="form-control" value="{{isset($category->name) ? $category->name : ''}}" required/>
                    </div>

                    <div class="form-group col-4 mr-2">
                        <label class="control-label" for="parent_id" >نام دسته والد</label>
                        <select name="parent_id" id="parent_id" class="custom-select">
                            @foreach ($allCategories as $cat)
                                <option value="{{$cat->id}}" {{($cat->name == $category->parent_id) ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-4 mr-2">
                        <label class="control-label" for="description" >توضیحات</label>
                        {{-- <input type="text"  name="description"    id="description" class="form-control" value="{{$category->description}}" /> --}}
                        <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{$category->description}}</textarea>
                    </div>
                </div>


                <div class="mt-4 form-row justify-content-center">
                    <button type="submit" class="btn btn-primary">ویرایش</button>
                </div>

            </form>
        </div>

    </div>

@endsection
