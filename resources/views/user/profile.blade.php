@extends('layout.master')

@section('content')

<div class="container-fluid" style="background-color: #f5f5f5;height: 120vh;">
    <div class="pb-3 pt-5" >
        <h4 style="display:inline-block; width:190px;font-size:30px;">پنل کاربری</h4>
        <i class="fas fa-tools fa-2x ml-1 mr-2"></i>
    </div>

    <div class="row" style="direction: rtl">

        <!-- Sidebar  -->
        <div class="col-sm-3">

            <div class="list-group">
                <!-- <a  class="list-group-item list-group-item-action active" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    اطلاعات کاربری
                </a> -->
                <span  class="list-group-item list-group-item-action active pt-3 pb-3 pr-3" data-toggle="list" href="#" role="tab"  >

                    <a  class="pb-4 w">اطلاعات کاربری</a>

                    <div class="list-group z" style="display:none;">
                        <a class="list-group-item x  w-100" data-toggle="list" href="#userInfo" role="tab">
                            <i class="fas fa-user"></i>
                            مشخصات کاربری
                        </a>

                        <a class="list-group-item x  w-100" data-toggle="list" href="#userEdit" role="tab">
                            <i class="far fa-address-card" id="panel_icon"></i>
                            <span> ویرایش اطلاعات </span>
                        </a>

                        <a class="list-group-item x  w-100" data-toggle="list" href="#passChange" role="tab">
                            <i class="fas fa-key"></i>
                            تغییر رمز عبور
                        </a>
                    </div>

                </span>


                <a class="list-group-item list-group-item-action y" data-toggle="list" href="#orders"         role="tab">سفارش ها</a>
                <a class="list-group-item list-group-item-action y" data-toggle="list" href="#courses"        role="tab">دوره های خریداری شده</a>
                <a class="list-group-item list-group-item-action y" data-toggle="list" href="#activePlan"     role="tab">طرح اشتراکی فعال</a>
                <a class="list-group-item list-group-item-action y" data-toggle="list" href="#transactions"   role="tab">تراکنش ها</a>
                <a class="list-group-item list-group-item-action y" data-toggle="list" href="#interests"      role="tab">علاقمندی ها</a>
                <a class="list-group-item list-group-item-action y" data-toggle="list" href="#followUpContent"role="tab">مطالب دنبال شده</a>
                <a class="list-group-item list-group-item-action y" data-toggle="list" href="#comments"       role="tab">نظرات ثبت شده</a>
                <a class="list-group-item list-group-item-action y" data-toggle="list" href="#tickets"        role="tab">تیکت های پششتیبانی</a>
                <a class="list-group-item list-group-item-action y" data-toggle="list" href="#wallet"         role="tab">کیف پول</a>
            </div>

        </div>

        <!-- Main Content  -->
        <div class="col-sm-9">
            <!-- Tab panes -->
            <div class="tab-content">
                {{-- user information panel --}}
                <div class="tab-pane"  id="userInfo" role="tabpanel">
                    <div class="card">
                        <div class="card-header text-center bg-lightBlue whiteText">
                            مشخصات کاربری
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-3 mb-2 offset-sm-5">
                                    @if($user->image()->count())
                                    <img src="{{asset($user->image()->first()->image_path.'/'.$user->image()->first()->image_name)}}" alt="user picture profile"class="rounded-circle" style="width:150px;height:150px;">
                                    @else
                                        <img src="{{asset('storage/users/unknownUser.jpg')}}" alt="user picture profile" class="rounded-circle" style="width:50px;height:50px;">
                                    @endif
                                </div>
                            </div>
                            <p>نام و نام خانوادگی  <span class="customFont"> {{$userGender}} {{$user->fullname}}</span></p>
                            <p>نام کاربری  <span class="customFont">{{$user->username}}</span></p>
                            <p>ایمیل  <span class="customFont">{{$user->email}}</span></p>
                            @isset($user->mobile)
                                <p>شماره همراه  <span class="customFont">{{$user->mobile}}</span></p>
                            @endisset
                        </div>
                    </div>
                </div>

                {{-- edit user inforamtion panel  --}}
                <div class="tab-pane"  id="userEdit" role="tabpanel">
                    @include('layout/notifications')
                    <div class="card">
                        <div class="card-header text-center bg-lightYelllow ">
                             ویرایش اطلاعات
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.update', ['user' => $user])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="fullname">نام و نام خانوادگی</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" value="{{$user->fullname}}">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="username">نام کاربری</label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="email">ایمیل</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="mobile">شماره همراه</label>
                                        <input type="number" class="form-control" id="mobile" name="mobile" value="{{isset($user->mobile) ? $user->mobile : ''}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-4">
                                        <label for="phone">شماره ثابت</label>
                                        <input type="number" class="form-control" id="phone" name="phone" value="{{isset($user->addresses()->first()->phone) ? $user->addresses()->first()->phone : ''}}">
                                    </div>
                                    <div class="form-group col-sm-2 offset-sm-2">
                                        <label for="age">سن</label>
                                        <input type="number" class="form-control" id="age" name="age" value="{{isset($user->age) ? $user->age : ''}}">
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label for="gender">جنسیت</label>
                                        <select name="gender_id" id="gender" class="form-control">
                                            <option value="3"  @if($userGenderNumber == 3) selected @endif>من ...</option>
                                            <option value="1"  @if($userGenderNumber == 1) selected @endif>خانم هستم</option>
                                            <option value="2"  @if($userGenderNumber == 2) selected @endif>آقا هستم</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row align-items-center">
                                    <label for="image" class="mb-0 mr-2">آپلود تصویر</label>
                                    <input type="file"  id="image" name="image" />
                                </div>

                                <div class="row justify-content-center mt-4">
                                    <button type="submit" class="btn btn-warning btn-outline-warning col-sm-3 p-2 text-black">ویرایش</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- change password --}}
                <div class="tab-pane"  id="passChange" role="tabpanel">
                    <div class="card">
                        <div class="card-header text-center bg-lightpurple">
                            تغییر رمز عبور
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.changePass', ['id' => $user->id])}}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="form-group row justify-content-center align-items-center">
                                    <label for="pass" class="col-sm-2 px-0 text-center mb-0">رمز عبور جدید:</label>
                                    <div class="input-group col-sm-5 px-0">
                                        <input class="form-control" type="password" name="password" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-eye" style="display:none;" id="eye_open1"></i>
                                                <i class="fa fa-eye-slash" id="eye_close1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center align-items-center">
                                    <label for="pass" class="col-sm-2 px-0 text-center mb-0">تکرار رمز عبور جدید:</label>
                                    <div class="input-group col-sm-5 px-0">
                                        <input class="form-control" type="password" name="password_confirmation" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-eye" style="display:none;" id="eye_open2"></i>
                                                <i class="fa fa-eye-slash" id="eye_close2"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row  justify-content-center">
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-secondary p-2">تغییر پسورد</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane"  id="orders" role="tabpanel">
                    hi2
                </div>
                <div class="tab-pane"  id="courses" role="tabpanel">
                    hi3
                </div>
                <div class="tab-pane"  id="transactions" role="tabpanel">
                    hi4
                </div>
                <div class="tab-pane"  id="interests" role="tabpanel">
                    hi5
                </div>
                <div class="tab-pane"  id="followUpContent" role="tabpanel">
                    hi6
                </div>
                <div class="tab-pane"  id="tickets" role="tabpanel">
                    hi7
                </div>
                <div class="tab-pane"  id="wallet" role="tabpanel">
                    hi8
                </div>
            </div>
            <!-- End of Tab panes -->
        </div>
    </div>
</div>

@endsection


