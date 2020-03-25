@extends('layout.master')

@section('content')

<!--================================
    START BREADCRUMB AREA
=================================-->
<section class="breadcrumb-area dir-rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="index.html">خانه</a>
                        </li>
                        <li>
                            <a href="dashboard.html">ثبت نام </a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">ثبت نام </h1>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
    END BREADCRUMB AREA
=================================-->


    <!--================================
            START SIGNUP AREA
    =================================-->
    <section class="signup_area section--padding2 dir-rtl">

        @include('layout.notifications')

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="cardify signup_form">
                            <div class="login--header">
                                <h3>ایجاد حساب کاربری</h3>
                                <p>لطفا موارد زیر را با دقت تکمیل کنید.
                                </p>
                            </div>
                            <!-- end .login_header -->

                            <div class="login--form">

                                <div class="form-group">
                                    <label for="fullname">نام و نام خانوادگی</label>
                                    <input name="fullname" id="fullname" type="text" class="text_field"  value="{{ old('fullname') }}">
                                </div>

                                <div class="form-group">
                                    <label for="username">نام کاربری <small class="text-danger">(الزامی)</small></label>
                                    <input name="username" id="username" type="text" class="text_field" value="{{ old('username') }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">ایمیل <small class="text-danger">(الزامی)</small></label>
                                    <input name="email" id="email" type="email" class="text_field" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label for="age">سن</label>
                                    <input name="age" id="age" type="number" class="text_field" value="{{ old('age') }}">
                                </div>

                                <div class="form-group">
                                    <label for="mobile">شماره همراه</label>
                                    <input name="mobile" id="mobile" type="text" class="text_field" value="{{ old('mobile') }}">
                                </div>

                                <div class="form-group">
                                    <label for="gender">جنسیت</label>
                                    <select name="gender_id" id="gender">
                                        <option value="3" selected>من ...</option>
                                        <option value="1">خانم هستم</option>
                                        <option value="2">آقا هستم</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="password">کلمه عبور </label>
                                    <input name="password" id="password" type="password" class="text_field" value="{{ old('password') }}">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">تایید رمز عبور</label>
                                    <input name="password_confirmation" id="password_confirmation" type="password" class="text_field" value="{{ old('password_confirmation') }}">
                                </div>

                                <button class="btn btn--md btn--round register_btn" type="submit">ثبت نام</button>

                                <div class="login_assist">
                                    <p>قبلا حساب کاربری ایجاد کرده اید ؟
                                        <a href="{{route('login')}}">ورود</a>
                                    </p>
                                </div>
                            </div>
                            <!-- end .login--form -->
                        </div>
                        <!-- end .cardify -->
                    </form>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
    <!--================================
            END SIGNUP AREA
    =================================-->

@endsection
