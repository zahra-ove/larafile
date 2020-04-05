@extends('admin.layout.master')

@section('title', 'افزودن کاربر جدید')

@section('content')

    @include('admin.layout.notifications')

    <div class="card">

        <div class="card-header text-center" style="background-color: lightseagreen">
            <h2 class="text-white align-middle m-0">اطلاعات کاربر جدید</h2>
        </div>

        <div class="card-body">
            <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="form-row justify-content-center">
                    <div class="form-group col-4">
                        <label class="control-label" for="fullname" >نام و نام خانوادگی</label>
                        <input type="text"  name="fullname"  placeholder="زهرا احمدی"  id="fullname" class="form-control" value="{{old('fullname')}}" />
                    </div>

                    <div class="form-group col-4 mr-2">
                        <label class="control-label" for="username" >نام کاربری</label>
                        <input type="text"  name="username"  placeholder="example"  id="username" class="form-control" value="{{old('username')}}" required/>
                    </div>
                </div>


                <div class="mt-4 form-row justify-content-center">
                    <div class="form-group col-3">
                        <label class="control-label" for="email" >ایمیل</label>
                        <input type="email"  name="email"  placeholder="example@example.com"  id="email" class="form-control" value="{{old('email')}}" required/>
                    </div>

                    <div class="form-group col-3">
                        <label class="control-label" for="mobile" >شماره همراه</label>
                        <input type="text"  name="mobile"  placeholder="09xxxxxxxxx"  id="mobile" class="form-control" value="{{old('mobile')}}" />
                    </div>
                </div>

                <div class="mt-4 form-row justify-content-center">
                    <div class="form-group col-2 mr-2">
                        <label class="control-label" for="age" >سن</label>
                        <input type="number"  name="age"  placeholder=""  id="age" class="form-control" value="{{old('age')}}" />
                    </div>

                    <div class="form-group col-2 mr-2">
                        <label class="control-label" for="gender" >جنسیت</label>
                        <select name="gender_id" id="gender" class="custom-select justify-content-center">
                            <option value="3" selected>--انتخاب--</option>
                            <option value="1">خانم</option>
                            <option value="2">آقا</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 form-row justify-content-center">
                    <div class="form-group col-4">
                        <label class="control-label" for="password" >رمز عبور</label>
                        <input type="password"  name="password"  id="password" class="form-control"  required/>
                    </div>

                    <div class="form-group col-4 mr-2">
                        <label class="control-label" for="password_confirmation" >تکرار رمز عبور</label>
                        <input type="password"  name="password_confirmation"    id="password_confirmation" class="form-control"  required/>
                    </div>
                </div>

                <div  class="mt-5 form-group justify-content-center">
                    <div class="form-group  text-center">
                        <label for="img">آپلود تصویر</label>
                        <input type="file" name="image" id="img" >
                    </div>
                </div>

                <div class="mt-5 form-row justify-content-center">
                    <button type="submit" class="btn btn-primary">ذخیره</button>
                </div>



            </form>
        </div>

    </div>

@endsection
