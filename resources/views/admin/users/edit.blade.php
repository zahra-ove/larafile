@extends('admin.layout.master')

@section('title', 'ویرایش اطلاعات کاربر')

@section('content')

    @include('admin.layout.notifications')

    <div class="card">

        <div class="card-header text-center" style="background-color:lightgoldenrodyellow;">
            <h2 class="align-middle m-0" style="color: darkslategrey;">ویرایش اطلاعات کاربر</h2>
        </div>

        <div class="card-body">
            <form action="{{route('admin.users.update', ['user' => $user])}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-row justify-content-center">
                    <div class="form-group col-4">
                        <label class="control-label" for="fullname" >نام و نام خانوادگی</label>
                        <input type="text"  name="fullname"  placeholder="زهرا احمدی"  id="fullname" class="form-control" value="{{isset($user->fullname) ? $user->fullname : ''}}" />
                    </div>

                    <div class="form-group col-4 mr-2">
                        <label class="control-label" for="username" >نام کاربری</label>
                        <input type="text"  name="username"  placeholder="example"  id="username" class="form-control" value="{{$user->username}}" required/>
                    </div>
                </div>


                <div class="mt-4 form-row justify-content-center">
                    <div class="form-group col-3">
                        <label class="control-label" for="email" >ایمیل</label>
                        <input type="email"  name="email"  placeholder="example@example.com"  id="email" class="form-control" value="{{$user->email}}" disabled/>
                    </div>

                    <div class="form-group col-3">
                        <label class="control-label" for="mobile" >شماره همراه</label>
                        <input type="text"  name="mobile"  placeholder="09xxxxxxxxx"  id="mobile" class="form-control" value="{{isset($user->mobile) ? $user->mobile : ''}}" />
                    </div>
                </div>

                <div class="mt-4 form-row justify-content-center">
                    <div class="form-group col-2 mr-2">
                        <label class="control-label" for="age" >سن</label>
                        <input type="number"  name="age"  placeholder=""  id="age" class="form-control" value="{{isset($user->age) ? $user->age : ''}}" />
                    </div>

                    <div class="form-group col-2 mr-2">
                        <label class="control-label" for="gender" >جنسیت</label>
                        <select name="gender_id" id="gender" class="custom-select justify-content-center">
                            <option value="3" {{ ($user->gender_id == 3) ? 'selected' : ''}} >--انتخاب--</option>
                            <option value="1" {{ ($user->gender_id == 1) ? 'selected' : ''}} >خانم</option>
                            <option value="2" {{ ($user->gender_id == 2) ? 'selected' : ''}} >آقا</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 form-row justify-content-center">
                    <label for="image" class="mb-0 ml-2">آپلود تصویر</label>
                    <input type="file"  id="image" name="image" />
                </div>

                {{-- <div class="mt-4 form-row justify-content-center">
                    <p class="m-0 my-auto">نقش کاربر:</p>
                    @foreach($roles as $role)
                        <div class="custom-control custom-checkbox mr-4">
                            <input type="checkbox" class="custom-control-input" id="customCheck_{{$role->id}}" name="roles[]">
                            <label class="custom-control-label" for="customCheck_{{$role->id}}">{{$role->name}}</label>
                        </div>
                    @endforeach
                </div> --}}
                <hr/>
                <div class="my-2 form-group text-center">
                    <label class="mb-4 font-weight-bold p-2 text-center" style="background-color: #13EBA2;color:white;border-radius:10px;">نقش کاربر</label>
                    @foreach($roles as $role)
                        <div class="row justify-content-center">
                            <div class="col-2">
                                {{-- <br/> --}}
                                <input class="float-right" type="checkbox"  name="roles[]"  value="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif />
                                <label class="float-left">{{$role->name}}</label><br/>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr/>

                <div class="mt-4 form-row justify-content-center">
                    <button type="submit" class="btn btn-primary">ویرایش</button>
                </div>

            </form>
        </div>

    </div>

@endsection
