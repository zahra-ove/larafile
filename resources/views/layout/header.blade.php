<div class="menu-area dir-rtl">
    <!-- start .top-menu-area -->
    <div class="top-menu-area">
        <!-- start .container -->
        <div class="container">
            <!-- start .row -->
            <div class="row">
                <!-- start .col-md-3 -->
                <div class="col-lg-3 col-md-3 col-6 v_middle">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="images/bevedel_logo2.png" alt="logo image" class="img-fluid">
                        </a>
                    </div>
                </div>
                <!-- end /.col-md-3 -->

                <!-- start .col-md-5 -->
                <div class="col-lg-8 offset-lg-1 col-md-9 col-6 v_middle">
                    <!-- start .author-area -->
                    <div class="author-area">
                        <a href="signup.blade.php" class="author-area__seller-btn inline">تبدیل به یک فروشنده</a>

                        @if (Route::has('login'))
                                @auth
                                    <div class="author__notification_area">
                                        <ul>
                                            <li class="has_dropdown">
                                                <div class="icon_wrap">
                                                    <span class="lnr lnr-alarm"></span>
                                                    <span class="notification_count noti">25</span>
                                                </div>

                                                <div class="dropdowns notification--dropdown">

                                                    <div class="dropdown_module_header">
                                                        <h4>اطلاعیه های من</h4>
                                                        <a href="notification.blade.php">نمایش همه </a>
                                                    </div>

                                                    <div class="notifications_module">
                                                        <div class="notification">
                                                            <div class="notification__info">
                                                                <div class="info_avatar">
                                                                    <img src="images/notification_head.png" alt="">
                                                                </div>
                                                                <div class="info">
                                                                    <p>
                                                                        <span>اندرسون</span> اضافه شده به علاقه مندی های شما
                                                                        <a href="#">قالب psd </a>
                                                                    </p>
                                                                    <p class="time">همین الان</p>
                                                                </div>
                                                            </div>
                                                            <!-- end /.notifications -->

                                                            <div class="notification__icons ">
                                                                <span class="lnr lnr-heart loved noti_icon"></span>
                                                            </div>
                                                            <!-- end /.notifications -->
                                                        </div>
                                                        <!-- end /.notifications -->

                                                        <div class="notification">
                                                            <div class="notification__info">
                                                                <div class="info_avatar">
                                                                    <img src="images/notification_head2.png" alt="">
                                                                </div>
                                                                <div class="info">
                                                                    <p>
                                                                        <span>به قالب شما </span> نظر داده شد
                                                                        <a href="#">قالب فروشگاهی </a>
                                                                    </p>
                                                                    <p class="time">همین الان</p>
                                                                </div>
                                                            </div>
                                                            <!-- end /.notifications -->

                                                            <div class="notification__icons ">
                                                                <span class="lnr lnr-bubble commented noti_icon"></span>
                                                            </div>
                                                            <!-- end /.notifications -->
                                                        </div>
                                                        <!-- end /.notifications -->

                                                        <div class="notification">
                                                            <div class="notification__info">
                                                                <div class="info_avatar">
                                                                    <img src="images/notification_head3.png" alt="">
                                                                </div>
                                                                <div class="info">
                                                                    <p>
                                                                        <span>قالب  </span>خریداری شد
                                                                        <a href="#"> قالب چند فروشندگی ورد پرس</a>
                                                                    </p>
                                                                    <p class="time">همین الان</p>
                                                                </div>
                                                            </div>
                                                            <!-- end /.notifications -->

                                                            <div class="notification__icons ">
                                                                <span class="lnr lnr-cart purchased noti_icon"></span>
                                                            </div>
                                                            <!-- end /.notifications -->
                                                        </div>
                                                        <!-- end /.notifications -->

                                                        <div class="notification">
                                                            <div class="notification__info">
                                                                <div class="info_avatar">
                                                                    <img src="images/notification_head4.png" alt="">
                                                                </div>
                                                                <div class="info">
                                                                    <p>
                                                                        <span>اندرسون</span> اضافه شده به علاقه مندی های شما
                                                                        <a href="#">قالب psd </a>
                                                                    </p>
                                                                    <p class="time">همین الان</p>
                                                                </div>
                                                            </div>
                                                            <!-- end /.notifications -->

                                                            <div class="notification__icons ">
                                                                <span class="lnr lnr-star reviewed noti_icon"></span>
                                                            </div>
                                                            <!-- end /.notifications -->
                                                        </div>
                                                        <!-- end /.notifications -->
                                                    </div>
                                                    <!-- end /.dropdown -->
                                                </div>
                                            </li>

                                            <li class="has_dropdown">
                                                <div class="icon_wrap">
                                                    <span class="lnr lnr-envelope"></span>
                                                    <span class="notification_count msg">6</span>
                                                </div>

                                                <div class="dropdowns messaging--dropdown">
                                                    <div class="dropdown_module_header">
                                                        <h4>پیام های من</h4>
                                                        <a href="message.blade.php">نمایش همه </a>
                                                    </div>

                                                    <div class="messages">
                                                        <a href="message.blade.php" class="message recent">
                                                            <div class="message__actions_avatar">
                                                                <div class="avatar">
                                                                    <img src="images/notification_head4.png" alt="">
                                                                </div>
                                                            </div>
                                                            <!-- end /.actions -->

                                                            <div class="message_data">
                                                                <div class="name_time">
                                                                    <div class="name">
                                                                        <p>تم های عالی</p>
                                                                        <span class="lnr lnr-envelope"></span>
                                                                    </div>

                                                                    <span class="time">همین الان</span>
                                                                    <p>سلام رضا رضایی! حالا من سرمایه گذاری ...</p>
                                                                </div>
                                                            </div>
                                                            <!-- end /.message_data -->
                                                        </a>
                                                        <!-- end /.message -->

                                                        <a href="message.blade.php" class="message recent">
                                                            <div class="message__actions_avatar">
                                                                <div class="avatar">
                                                                    <img src="images/notification_head5.png" alt="">
                                                                </div>
                                                            </div>
                                                            <!-- end /.actions -->

                                                            <div class="message_data">
                                                                <div class="name_time">
                                                                    <div class="name">
                                                                        <p>دیوانه رمز گذار
                                                                             
                                                                        </p>
                                                                        <span class="lnr lnr-envelope"></span>
                                                                    </div>

                                                                    <span class="time">همین الان</span>
                                                                    <p>سلام! سرمایه گذاری حال حاضر برای من دوباره ذخیره کنید ...</p>
                                                                </div>
                                                            </div>
                                                            <!-- end /.message_data -->
                                                        </a>
                                                        <!-- end /.message -->

                                                        <a href="message.blade.php" class="message">
                                                            <div class="message__actions_avatar">
                                                                <div class="avatar">
                                                                    <img src="images/notification_head6.png" alt="">
                                                                </div>
                                                            </div>
                                                            <!-- end /.actions -->

                                                            <div class="message_data">
                                                                <div class="name_time">
                                                                    <div class="name">
                                                                        <p>----------</p>
                                                                    </div>

                                                                    <span class="time">همین الان</span>
                                                                    <p>سلام! سرمایه گذاری حال حاضر برای من دوباره ذخیره کنید ...</p>
                                                                </div>
                                                            </div>
                                                            <!-- end /.message_data -->
                                                        </a>
                                                        <!-- end /.message -->

                                                        <a href="message.blade.php" class="message">
                                                            <div class="message__actions_avatar">
                                                                <div class="avatar">
                                                                    <img src="images/notification_head3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <!-- end /.actions -->

                                                            <div class="message_data">
                                                                <div class="name_time">
                                                                    <div class="name">
                                                                        <p>تم X</p>
                                                                    </div>

                                                                    <span class="time">همین الان</span>
                                                                    <p>سلام! سرمایه گذاری حال حاضر برای من دوباره ذخیره کنید ...</p>
                                                                </div>
                                                            </div>
                                                            <!-- end /.message_data -->
                                                        </a>
                                                        <!-- end /.message -->

                                                        <a href="message.blade.php" class="message">
                                                            <div class="message__actions_avatar">
                                                                <div class="avatar">
                                                                    <img src="images/notification_head4.png" alt="">
                                                                </div>
                                                            </div>
                                                            <!-- end /.actions -->

                                                            <div class="message_data">
                                                                <div class="name_time">
                                                                    <div class="name">
                                                                        <p>NukeThemes</p>
                                                                        <span class="lnr lnr-envelope"></span>
                                                                    </div>

                                                                    <span class="time">همین الان</span>
                                                                    <p>سلام رضا رضایی! حالا من سرمایه گذاری ...</p>
                                                                </div>
                                                            </div>
                                                            <!-- end /.message_data -->
                                                        </a>
                                                        <!-- end /.message -->
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="has_dropdown">
                                                <div class="icon_wrap">
                                                    <span class="lnr lnr-cart"></span>
                                                    <span class="notification_count purch">2</span>
                                                </div>

                                                <div class="dropdowns dropdown--cart">
                                                    <div class="cart_area">
                                                        <div class="cart_product">
                                                            <div class="product__info">
                                                                <div class="thumbn">
                                                                    <img src="images/capro1.jpg" alt="cart product thumbnail">
                                                                </div>

                                                                <div class="info">
                                                                    <a class="title" href="single-product.blade.php">قالب ورد پرس
                                                                        دریا </a>
                                                                    <div class="cat">
                                                                        <a href="#">
                                                                            <img src="images/catword.png" alt="">ورد پرس </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="product__action">
                                                                <a href="#">
                                                                    <span class="lnr lnr-trash"></span>
                                                                </a>
                                                                <p>60 تومان</p>
                                                            </div>
                                                        </div>
                                                        <div class="cart_product">
                                                            <div class="product__info">
                                                                <div class="thumbn">
                                                                    <img src="images/capro2.jpg" alt="cart product thumbnail">
                                                                </div>

                                                                <div class="info">
                                                                    <a class="title" href="single-product.blade.php">قالب فروشگاهی</a>
                                                                    <div class="cat">
                                                                        <a href="#">
                                                                            <img src="images/catword.png" alt="">ورد پرس </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="product__action">
                                                                <a href="#">
                                                                    <span class="lnr lnr-trash"></span>
                                                                </a>
                                                                <p>60 تومان</p>
                                                            </div>
                                                        </div>
                                                        <div class="total">
                                                            <p>
                                                                <span>مجموع :</span>80 تومان</p>
                                                        </div>
                                                        <div class="cart_action">
                                                            <a class="go_cart" href="cart.blade.php">سبد خرید </a>
                                                            <a class="go_checkout" href="checkout.blade.php">باز بینی </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--start .author__notification_area -->

                                    <!--start .author-author__info-->
                                    <div class="author-author__info inline has_dropdown">
                                        <div class="author__avatar">
                                            <img src="images/usr_avatar.png" alt="user avatar">
                                        </div>

                                        <div class="autor__info">
                                            <p class="name">
                                               {{Auth::user()->fullname}}
                                            </p>
                                            <!--<p class="ammount">2000 تومان</p>-->
                                        </div>

                                        <div class="dropdowns dropdown--author">
                                            <ul>
                                                <li>
                                                    <a href="author.blade.php">
                                                        <span class="lnr lnr-user"></span>پروفایل </a>
                                                </li>
                                                <li>
                                                    <a href="dashboard.blade.php">
                                                        <span class="lnr lnr-home"></span>داشبورد</a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-setting.blade.php">
                                                        <span class="lnr lnr-cog"></span> تنظیمات</a>
                                                </li>
                                                <li>
                                                    <a href="cart.blade.php">
                                                        <span class="lnr lnr-cart"></span>خرید ها</a>
                                                </li>
                                                <li>
                                                    <a href="favourites.blade.php">
                                                        <span class="lnr lnr-heart"></span> علاقه مندی ها </a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-add-credit.blade.php">
                                                        <span class="lnr lnr-dice"></span>کارت تخفیف</a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-statement.blade.php">
                                                        <span class="lnr lnr-chart-bars"></span>بیانیه فروش</a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-upload.blade.php">
                                                        <span class="lnr lnr-upload"></span>آپلود ایتم </a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-manage-item.blade.php">
                                                        <span class="lnr lnr-book"></span>مدیریت آیتم ها</a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-withdrawal.blade.php">
                                                        <span class="lnr lnr-briefcase"></span>برداشت ها </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                  document.getElementById('logout-form').submit();">
                                                     <span class="lnr lnr-exit"></span>خروج
                                                 </a>

                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                     @csrf
                                                 </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end /.author-author__info-->
                                @else
                                    <a href="{{ route('login') }}" class=>ورود</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">ثبت نام</a>
                                    @endif
                                @endauth
                        @endif
                    </div>
                    <!-- end .author-area -->

                    <!-- author area restructured for mobile -->
                    <div class="mobile_content ">
                        <span class="lnr lnr-user menu_icon"></span>

                        <!-- offcanvas menu -->
                        <div class="offcanvas-menu closed">
                            <span class="lnr lnr-cross close_menu"></span>


                            @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        {{-- <a href="{{ url('/home') }}">Home</a> --}}
                                        <div class="author-author__info">
                                            <div class="author__avatar v_middle">
                                                <img src="images/usr_avatar.png" alt="user avatar">
                                            </div>
                                            <div class="autor__info v_middle">
                                                <p class="name">
                                                    {{Auth::user()->fullname}}
                                                </p>
                                                <p class="ammount">2000 تومان</p>
                                            </div>
                                        </div>
                                        <!--end /.author-author__info-->

                                        <div class="author__notification_area">
                                            <ul>
                                                <li>
                                                    <a href="notification.blade.php">
                                                        <div class="icon_wrap">
                                                            <span class="lnr lnr-alarm"></span>
                                                            <span class="notification_count noti">25</span>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="message.blade.php">
                                                        <div class="icon_wrap">
                                                            <span class="lnr lnr-envelope"></span>
                                                            <span class="notification_count msg">6</span>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="cart.blade.php">
                                                        <div class="icon_wrap">
                                                            <span class="lnr lnr-cart"></span>
                                                            <span class="notification_count purch">2</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--start .author__notification_area -->

                                        <div class="dropdowns dropdown--author">
                                            <ul>
                                                <li>
                                                    <a href="author.blade.php">
                                                        <span class="lnr lnr-user"></span>پروفایل </a>
                                                </li>
                                                <li>
                                                    <a href="dashboard.blade.php">
                                                        <span class="lnr lnr-home"></span>داشبورد</a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-setting.blade.php">
                                                        <span class="lnr lnr-cog"></span> تنظیمات</a>
                                                </li>
                                                <li>
                                                    <a href="cart.blade.php">
                                                        <span class="lnr lnr-cart"></span>خرید ها</a>
                                                </li>
                                                <li>
                                                    <a href="favourites.blade.php">
                                                        <span class="lnr lnr-heart"></span> علاقه مندی ها </a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-add-credit.blade.php">
                                                        <span class="lnr lnr-dice"></span>کارت تخفیف</a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-statement.blade.php">
                                                        <span class="lnr lnr-chart-bars"></span>بیانیه فروش</a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-upload.blade.php">
                                                        <span class="lnr lnr-upload"></span>آپلود ایتم </a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-manage-item.blade.php">
                                                        <span class="lnr lnr-book"></span>مدیریت آیتم ها</a>
                                                </li>
                                                <li>
                                                    <a href="dashboard-withdrawal.blade.php">
                                                        <span class="lnr lnr-briefcase"></span>برداشت ها </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="lnr lnr-exit"></span>خروج </a>
                                                </li>
                                            </ul>
                                        </div>
                                    @else
                                        <a href="{{ route('login') }}">ورود</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">ثبت نام</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif

                            <div class="text-center">
                                <a href="signup.blade.php" class="author-area__seller-btn inline">تبدیل به فروشنده </a>
                            </div>
                        </div>
                    </div>
                    <!-- end /.mobile_content -->
                </div>
                <!-- end /.col-md-5 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end  -->

    <!-- start .mainmenu_area -->
    <div class="mainmenu">
        <!-- start .container -->
        <div class="container">
            <!-- start .row-->
            <div class="row">
                <!-- start .col-md-12 -->
                <div class="col-md-12">
                    <div class="navbar-header">
                        <!-- start mainmenu__search -->
                        <div class="mainmenu__search">
                            <form action="#">
                                <div class="searc-wrap">
                                    <input type="text" placeholder="جستجوی محصول ">
                                    <button type="submit" class="search-wrap__btn">
                                        <span class="lnr lnr-magnifier"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- start mainmenu__search -->
                    </div>

                    <nav class="navbar navbar-expand-md navbar-light mainmenu__menu">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="has_dropdown">
                                    <a href="{{url('/')}}">خانه </a>
                                </li>
                                <li class="has_dropdown">
                                    <a href="all-products-list.blade.php">همه محصولات</a>
                                    <div class="dropdowns dropdown--menu">
                                        <ul>
                                            <li>
                                                <a href="all-products.blade.php">محصولات جدید </a>
                                            </li>
                                            <li>
                                                <a href="all-products.blade.php">محصولات محبوب </a>
                                            </li>
                                            <li>
                                                <a href="index3.blade.php">محصولات رایگان </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li class="has_dropdown">
                                    <a href="#">دسته بندی ها </a>
                                    <div class="dropdowns dropdown--menu">
                                        <ul>
                                            <li>
                                                <a href="category-grid.blade.php">محصولات محبوب </a>
                                            </li>
                                            <li>
                                                <a href="category-grid.blade.php">پنل ادمین </a>
                                            </li>
                                            <li>
                                                <a href="category-grid.blade.php">وبلاگ / مقالات / جدید ترین ها </a>
                                            </li>
                                            <li>
                                                <a href="category-grid.blade.php">خلاق </a>
                                            </li>
                                            <li>
                                                <a href="category-grid.blade.php">شرکتی </a>
                                            </li>
                                            <li>
                                                <a href="category-grid.blade.php">رزومه /نمونه کار </a>
                                            </li>
                                            <li>
                                                <a href="category-grid.blade.php">فروشگاهی </a>
                                            </li>
                                            <li>
                                                <a href="category-grid.blade.php">سرگرمی</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.blade.php">صفحه intro </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has_megamenu">
                                    <a href="#">مقالات</a>
                                </li>

                                <li>
                                    <a href="{{url('/contact')}}">تماس با ما</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row-->
        </div>
        <!-- start .container -->
    </div>
    <!-- end /.mainmenu-->
</div>
