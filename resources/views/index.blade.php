@extends('layout.master')

@section('content')

<!--================================
START HERO AREA
=================================-->
<section class="hero-area bgimage dir-rtl">
    <div class="bg_image_holder">
        {{-- <img src="images/new/hero_area_bg1.jpg" alt="background-image"> --}}
        <img src="{{asset('images/new/hero_area_bg.png')}}" alt="background-image">
    </div>
    <!-- start hero-content -->
    <div class="hero-content content_above">
        <!-- start .contact_wrapper -->
        <div class="content-wrapper">
            <!-- start .container -->
            <div class="container">
                <!-- start row -->
                <div class="row">
                    <!-- start col-md-12 -->
                    <div class="col-md-12">
                        <div class="hero__content__title">
                            <h1>
                                <span class="light">به سایت Bevedel خوش اومدی</span>
                                {{-- <span class="bold">بازار محصولات دیجیتال</span> --}}
                            </h1>
                            <p class="tagline">اینجا کلی آموزش هست که میتونی سفارش بدی و به راحتی خودت رو  به روز کنی</p>
                        </div>

                        <!-- start .hero__btn-area-->
                        <div class="hero__btn-area">
                            <a href="all-products.blade.php" class="btn btn--round btn--lg">مشاهده تمام محصولات</a>
                            <a href="all-products.blade.php" class="btn btn--round btn--lg">محصولات محبوب</a>
                        </div>
                        <!-- end .hero__btn-area-->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end .contact_wrapper -->
    </div>
    <!-- end hero-content -->

    <!--start search-area -->
    <div class="search-area">
        <!-- start .container -->
        <div class="container">
            <!-- start .container -->
            <div class="row">
                <!-- start .col-sm-12 -->
                <div class="col-sm-12">
                    <!-- start .search_box -->
                    <div class="search_box">
                        <form action="#">
                            <input type="text" class="text_field" placeholder="جستجو در محصولات ...">
                            <div class="search__select select-wrap">
                                <select name="category" class="select--field" id="blah">
                                    <option value="">همه دسته بندی ها</option>
                                    <option value="">PSD</option>
                                    <option value="".blade.php</option>
                                    <option value="">ورد پرس</option>
                                    <option value="">همه دسته بندی ها</option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                            <button type="submit" class="search-btn btn--lg">جستجو</button>
                        </form>
                    </div>
                    <!-- end ./search_box -->
                </div>
                <!-- end /.col-sm-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!--start /.search-area -->
</section>
<!--================================
END HERO AREA
=================================-->

<!--================================
START FEATURE AREA
=================================-->
{{-- <section class="features section--padding dir-rtl">
    <!-- start container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <!-- start search-area -->
            <div class="col-lg-4 col-md-6">
                <div class="feature">
                    <div class="feature__img">
                        <img src="images/new/feature1.png" alt="feature">
                    </div>
                    <div class="feature__title">
                        <h3>بهترین تحقیق UX</h3>
                    </div>
                    <div class="feature__desc">
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است. </p>
                    </div>
                </div>
                <!-- end /.feature -->
            </div>
            <!-- end /.col-lg-4 col-md-6 -->

            <!-- start search-area -->
            <div class="col-lg-4 col-md-6">
                <div class="feature">
                    <div class="feature__img">
                        <img src="images/new/feature2.png" alt="feature">
                    </div>
                    <div class="feature__title">
                        <h3>کاملا پاسخگو</h3>
                    </div>
                    <div class="feature__desc">
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است. </p>
                    </div>
                </div>
                <!-- end /.feature -->
            </div>
            <!-- end /.col-lg-4 col-md-6 -->

            <!-- start search-area -->
            <div class="col-lg-4 col-md-6">
                <!-- end /.col-lg-4 col-md-6 -->>
                <div class="feature">
                    <div class="feature__img">
                        <img src="images/new/feature3.png" alt="feature">
                    </div>
                    <div class="feature__title">
                        <h3>خرید و فروش به راحتی</h3>
                    </div>
                    <div class="feature__desc">
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است. </p>
                    </div>
                </div>
                <!-- end /.feature -->
            </div>
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section> --}}
<!--================================
END FEATURE AREA
=================================-->


<!--================================
START Newest PRODUCT AREA    section--padding
=================================-->
<section class="featured-products bgcolor sectionPadding">
    <!-- start /.container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <!-- start col-md-12 -->
            <div class="col-md-12">
                <div class="product-title-area ">
                    <div class="product__title">
                        <h4>جدیدترین محصولات</h4>
                    </div>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>

    <!-- start new products -->
    @include('newProducts', $newFiles)
    <!-- end new products -->
</section>
<!--================================
END FEATURED PRODUCT AREA
=================================-->


<!--================================
START Top 10 selling Files in last 3 months     section--padding
=================================-->
<section class="featured-products bgcolor sectionPadding">
    <!-- start /.container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <!-- start col-md-12 -->
            <div class="col-md-12">
                <div class="product-title-area ">
                    <div class="product__title">
                        <h4>پرفروش ترین محصولات <small class="text-muted text-sm">(3 ماه اخیر)</small></h4>
                    </div>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>

    <!-- start top ten selling files -->
    @include('topSoldFiles', $topsoldFiles)
    <!-- end top ten selling files -->
</section>
<!--================================
END Top 10 selling Files in last 3 months
=================================-->



<!--================================
START COUNTER UP AREA
=================================-->
<section class="counter-up-area bgimage dir-rtl">
    <div class="bg_image_holder">
        <img src="images/new/countbg.jpg" alt="">
    </div>
    <!-- start .container -->
    <div class="container content_above">
        <!-- start .col-md-12 -->
        <div class="col-md-12">
            <div class="counter-up">
                <div class="counter mcolor2">
                    <span class="lnr lnr-briefcase"></span>
                    <span class="count">38,436</span>
                    <p>آیتم برای فروش</p>
                </div>
                <div class="counter mcolor3">
                    <span class="lnr lnr-cloud-download"></span>
                    <span class="count">38,436</span>
                    <p>مجموع فروش</p>
                </div>
                <div class="counter mcolor1">
                    <span class="lnr lnr-smile"></span>
                    <span class="count">38,436</span>
                    <p>مشتریان راضی </p>
                </div>
                <div class="counter mcolor4">
                    <span class="lnr lnr-users"></span>
                    <span class="count">38,436</span>
                    <p>کاربر</p>
                </div>
            </div>
        </div>
        <!-- end /.col-md-12 -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
END COUNTER UP AREA
=================================-->


<section class="why_choose section--padding dir-rtl">
    <!-- start container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <!-- start col-md-12 -->
            <div class="col-md-12">
                <div class="section-title">
                    <h1>چرا
                        <span class="highlighted">ما</span>
                        را انتخاب کنید
                    </h1>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->

        <!-- start row -->
        <div class="row">
            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .reason -->
                <div class="feature2">
                    <span class="feature2__count">01</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-license pcolor"></span>
                        <h3 class="feature2-title">یک بار پرداخت کنید</h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است. </p>
                    </div>
                    <!-- end /.feature2__content -->
                </div>
                <!-- end /.feature2 -->
            </div>
            <!-- end /.col-md-4 -->

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .feature2 -->
                <div class="feature2">
                    <span class="feature2__count">02</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-magic-wand scolor"></span>
                        <h3 class="feature2-title">کیفیت محصولات</h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است. </p>
                    </div>
                    <!-- end /.feature2__content -->
                </div>
                <!-- end /.feature2 -->
            </div>
            <!-- end /.col-md-4 -->

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .feature2 -->
                <div class="feature2">
                    <span class="feature2__count">03</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-lock mcolor1"></span>
                        <h3 class="feature2-title">100% پرداخت امن </h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است. </p>
                    </div>
                    <!-- end /.feature2__content -->
                </div>
                <!-- end /.feature2 -->
            </div>
            <!-- end /.col-md-4 -->

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .feature2 -->
                <div class="feature2">
                    <span class="feature2__count">04</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-chart-bars mcolor2"></span>
                        <h3 class="feature2-title">کد های بهینه </h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.</p>
                    </div>
                    <!-- end /.feature2__content -->
                </div>
                <!-- end /.feature2 -->
            </div>
            <!-- end /.col-md-4 -->

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .feature2 -->
                <div class="feature2">
                    <span class="feature2__count">05</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-leaf mcolor3"></span>
                        <h3 class="feature2-title">رایگان آپدیت کنید </h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است. </p>
                    </div>
                    <!-- end /.feature2__content -->
                </div>
                <!-- end /.feature2 -->
            </div>
            <!-- end /.col-md-4 -->

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .feature2 -->
                <div class="feature2">
                    <span class="feature2__count">06</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-phone mcolor4"></span>
                        <h3 class="feature2-title">پشتیبانی سریع </h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.</p>
                    </div>
                    <!-- end /.feature2__content -->
                </div>
                <!-- end /.feature2 -->
            </div>
            <!-- end /.col-md-4 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
END COUNTER UP AREA
=================================-->

<!--================================
START SELL BUY
=================================-->
<section class="proposal-area dir-rtl">

    <!-- start container-fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 no-padding">
                <div class="proposal proposal--left bgimage">
                    <div class="bg_image_holder">
                        <img src="images/new/bbg.png" alt="prop image">
                    </div>
                    <div class="content_above">
                        <div class="proposal__icon ">
                            <img src="images/new/buy.png" alt="Buy icon">
                        </div>
                        <div class="proposal__content ">
                            <h1 class="text--white">فروش محصولات شما</h1>
                            <p class="text--white">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                استفاده از طراحان گرافیک است. </p>
                        </div>
                        <a href="#" class="btn--round btn btn--lg btn--white">تبدیل شدن به فروشنده </a>
                    </div>
                </div>
                <!-- end /.proposal -->
            </div>

            <div class="col-md-6 no-padding">
                <div class="proposal proposal--right">
                    <div class="bg_image_holder">
                        <img src="images/new/sbg.png" alt="this is magic">
                    </div>
                    <div class="content_above">
                        <div class="proposal__icon">
                            <img src="images/new/sell.png" alt="Sell icon">
                        </div>
                        <div class="proposal__content ">
                            <h1 class="text--white">شروع به خرید امروز</h1>
                            <p class="text--white">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                استفاده از طراحان گرافیک است. </p>
                        </div>
                        <a href="#" class="btn--round btn btn--lg btn--white">شروع خرید </a>
                    </div>
                </div>
                <!-- end /.proposal -->
            </div>
        </div>
    </div>
    <!-- start container-fluid -->
</section>
<!--================================
END SELL BUY
=================================-->



<!--================================
START LATEST NEWS
=================================-->
<section class="latest-news section--padding dir-rtl">
    <!-- start /.container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <!-- start col-md-12 -->
            <div class="col-md-12">
                <div class="section-title">
                    <h1>آخرین
                        <span class="highlighted">اخبار</span>
                    </h1>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->

        <!-- start .row -->
        <div class="row">
            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <div class="news">
                    <div class="news__thumbnail">
                        <img src="images/new/news1.png" alt="News Thumbnail">
                    </div>
                    <div class="news__content">
                        <a href="#" class="news-title">
                            <h4>روند طراحی وب در سال 2019</h4>
                        </a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.</p>
                    </div>
                    <div class="news__meta">
                        <div class="date">
                            <span class="lnr lnr-clock"></span>
                            <p>17 آبان 1397</p>
                        </div>

                        <div class="other">
                            <ul>
                                <li>
                                    <span class="lnr lnr-bubble"></span>
                                    <span>45</span>
                                </li>
                                <li>
                                    <span class="lnr lnr-eye"></span>
                                    <span>345</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end /.col-md-4 -->

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <div class="news">
                    <div class="news__thumbnail">
                        <img src="images/new/news2.png" alt="News Thumbnail">
                    </div>
                    <div class="news__content">
                        <a href="#" class="news-title">
                            <h4>بهترین توصیه برای شروع پروژه خود</h4>
                        </a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.</p>
                    </div>
                    <div class="news__meta">
                        <div class="date">
                            <span class="lnr lnr-clock"></span>
                            <p>17 آبان 1397</p>
                        </div>

                        <div class="other">
                            <ul>
                                <li>
                                    <span class="lnr lnr-bubble"></span>
                                    <span>45</span>
                                </li>
                                <li>
                                    <span class="lnr lnr-eye"></span>
                                    <span>345</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end /.col-md-4 -->

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <div class="news">
                    <div class="news__thumbnail">
                        <img src="images/new/news1.png" alt="News Thumbnail">
                    </div>
                    <div class="news__content">
                        <a href="#" class="news-title">
                            <h4>10 ابزار برای طراحی قالب</h4>
                        </a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.</p>
                    </div>
                    <div class="news__meta">
                        <div class="date">
                            <span class="lnr lnr-clock"></span>
                            <p>17 آبان 1397</p>
                        </div>

                        <div class="other">
                            <ul>
                                <li>
                                    <span class="lnr lnr-bubble"></span>
                                    <span>45</span>
                                </li>
                                <li>
                                    <span class="lnr lnr-eye"></span>
                                    <span>345</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end /.col-md-4 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
END LATEST NEWS
=================================-->

<!--================================
START SPECIAL FEATURES AREA
=================================-->
<section class="special-feature-area dir-rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="special-feature feature--1">
                    <img src="images/new/spf1.png" alt="Special Feature image">
                    <h3 class="special__feature-title">30 روز
                        <span class="highlight">گارانتی</span>
                        برگشت پول
                    </h3>
                </div>
            </div>
            <!-- end /.col-md-6 -->
            <div class="col-md-6">
                <div class="special-feature feature--2">
                    <img src="images/new/spf2.png" alt="Special Feature image">
                    <h3 class="special__feature-title">
                        <span class="highlight">پشتیبانی</span>
                        سریع
                    </h3>
                </div>
            </div>
            <!-- end /.col-md-6 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
END SPECIAL FEATURES AREA
=================================-->

<!--================================
START CALL TO ACTION AREA
=================================-->
<section class="call-to-action bgimage dir-rtl">
    <div class="bg_image_holder">
        <img src="images/new/calltobg.jpg" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="call-to-wrap">
                    <h1 class="text--white">آماده پیوستن به ما هستید !</h1>
                    <h4 class="text--white">بیش از 25،000 طراح و توسعهدهنده به ما اعتماد دارند.</h4>
                    <a href="#" class="btn btn--lg btn--round btn--white callto-action-btn">امروز به ما بپیوندید</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================
END CALL TO ACTION AREA
=================================-->

@endsection
