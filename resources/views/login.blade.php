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
                            <a href="dashboard.html">ورود </a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">ورود </h1>
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
        START LOGIN AREA
=================================-->
<section class="login_area section--padding2 dir-rtl">

    @include('layout.notifications')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form action="{{route('login')}}" method="POST">
                    @csrf

                    <div class="cardify login">
                        <div class="login--header">
                            <h3>خوش آمدید</h3>
                            <p>شما می توانید با نام کاربری خود وارد شوید</p>
                        </div>
                        <!-- end .login_header -->

                        <div class="login--form">
                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input name="email" id="email" type="email" class="text_field" >
                            </div>

                            <div class="form-group">
                                <label for="password">کلمه عبور </label>
                                <input name="password" id="password" type="password" class="text_field">
                            </div>

                            <div class="form-group">
                                <div class="custom_checkbox">
                                    <input type="checkbox" id="ch2">
                                    <label for="ch2">
                                        <span class="shadow_checkbox"></span>
                                        <span class="label_text">مرا به خاطر بسپار </span>
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn--md btn--round" type="submit" style="margin-right: 30%;">ورود </button>

                            <div class="login_assist">
                                <p class="recover">
                                    <a href="pass-recovery.html">نام کاربری </a> یا
                                    <a href="pass-recovery.html">کلمه عبور </a> فراموش کرده اید ؟</p>
                                <p class="signup">هنوز
                                    <a href="{{route('register')}}">ثبت نام </a>  نکرده اید ؟</p>
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
        END LOGIN AREA
=================================-->

@endsection
