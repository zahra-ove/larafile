@extends('layout.master')

@section('content')

<!--================================
    START BREADCRUMB AREA
=================================-->
<section class="breadcrumb-area breadcrumb--center breadcrumb--smsbtl dir-rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_title">
                    <h3>ارتباط با ما</h3>
                    <p class="subtitle">جای درستی آمدی</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="index.html">خانه</a>
                        </li>
                        <li class="active">
                            <a href="#">ارتباط با ما</a>
                        </li>
                    </ul>
                </div>
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
    START AFFILIATE AREA
=================================-->
<section class="contact-area section--padding dir-rtl">
    
    @include('layout.notifications')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-12">
                    <div class="contact_form cardify">
                        <div class="contact_form__title">
                            <h3>پیغام خود را بنویسید </h3>
                        </div>

                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="contact_form--wrapper">
                                    <form action="{{route('contacts.store')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input  type="text"  name="fname" id="fname" placeholder="نام ">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input  type="text" name="lname" id="lname" placeholder="نام خانوادگی">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="ایمیل">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="phone" placeholder="تلفن ">
                                                </div>
                                            </div>
                                        </div>

                                        <textarea cols="30" rows="10" name="message"  placeholder="متن خود را بنویسید "></textarea>

                                        <div class="sub_btn">
                                            <button type="submit" class="btn btn--round btn--default">ارسال </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end /.col-md-8 -->
                        </div>
                        <!-- end /.row -->
                    </div>
                    <!-- end /.contact_form -->
                </div>

            </div>

        </div>

    </div>

</section>
<!--================================
    END BREADCRUMB AREA
=================================-->

<!--================================
        START
=================================-->
<div id="map"></div>
<!-- end /.map -->
<!--================================
        END FAQ AREA
=================================-->


@endsection
