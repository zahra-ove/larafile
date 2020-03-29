@extends('layout.master')

@section('content')

<div class="container-fluid" style="background-color: #f5f5f5;height: 120vh;">
    <h4 class="pb-4 pt-4 mx-5">پنل کاربری</h4>
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
                            مشخصات کاربری
                        </a>

                        <a class="list-group-item x  w-100" data-toggle="list" href="#userEdit" role="tab">
                            ویرایش اطلاعات
                        </a>

                        <a class="list-group-item x  w-100" data-toggle="list" href="#passChange" role="tab">
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
                        <div class="card-header text-center">
                            مشخصات کاربری
                        </div>
                        <div class="card-body">

                            <p>نام و نام خانوادگی  <span class="customFont"> {{$userGender}} {{$user->fullname}}</span></p>
                            <p>نام کاربری  <span class="customFont">{{$user->username}}</span></p>
                            <p>ایمیل<span class="customFont">{{$user->email}}</span></p>
                            <p>شماره همراه  <span class="customFont">{{$user->mobile}}</span></p>
                        </div>
                    </div>
                </div>
                {{-- edit user inforamtion panel  --}}
                <div class="tab-pane"  id="userEdit" role="tabpanel">
                    <div class="card">
                        <div class="card-header text-center bg-lightYelllow">
                             ویرایش اطلاعات
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.update', ['user' => $user])}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="fullname">نام و نام خانوادگی</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" value="{{$user->fullname}}">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="username">نام کاربری  </label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="email">ایمیل</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
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
                                            <option value="3"  @if($userGender == 'خانم/آقای') selected @endif>من ...</option>
                                            <option value="1"  @if($userGender == 'خانم') selected @endif>خانم هستم</option>
                                            <option value="2"  @if($userGender == 'آقا') selected @endif>آقا هستم</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row justify-content-center mt-3">
                                    <button type="submit" class="btn btn-warning btn-outline-warning col-sm-3 p-2 text-black">ویرایش</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane"  id="passChange" role="tabpanel">
                    <div class="card">
                        <div class="card-header text-center">
                            تغییر رمز عبور
                        </div>
                        <div class="card-body">
                            <form action="{{route('user.changePass', ['id' => $user->id])}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group row justify-content-center align-items-center">
                                    <label for="pass" class="col-sm-2 px-0 text-center mb-0">رمز عبور جدید:</label>
                                    <div class="col-sm-6 px-0">
                                        <input type="password" class="form-control" id="pass" name="password" >
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center align-items-center">
                                    <label for="passChange" class="col-sm-2 px-0 text-center mb-0">تکرار رمز عبور جدید:</label>
                                    <div class="col-sm-6 px-0">
                                        <input type="password" class="form-control" id="passChange" name="password_confirmation">
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


