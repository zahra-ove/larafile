<div class="menu-area dir-rtl">
    <!-- start .top-menu-area -->
    <div class="top-menu-area bg-darkBlue py-2">
        <!-- start .container -->
        <div class="container">
            <!-- start .row -->
            <div class="row">
                <!-- start .col-md-3 -->
                <div class="col-lg-3 col-md-3 col-6 align-middle">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{asset('images/bevedel_logo3.png')}}" alt="logo image" class="img-fluid">
                        </a>
                    </div>
                </div>
                <!-- end /.col-md-3 -->

                <!-- start .col-md-5 -->
                <div class="col-lg-8 offset-lg-1 col-md-9 col-6  v_middle">
                    <!-- start .author-area -->
                    <div class="author-area">
                        {{-- shopping cart icon --}}
                        @include('cart.cart-count')

                        @if (Route::has('login'))
                            @auth
                                <!--start .author-author__info-->
                                <div class="author-author__info inline has_dropdown">
                                    <div class="author__avatar">
                                        @php
                                            $user = Auth::user();
                                        @endphp
                                        {{-- <img src="images/usr_avatar.png" alt="user avatar"> --}}
                                        @if($user->image()->count())
                                            <img src="{{asset($user->image()->first()->image_path.'/'.$user->image()->first()->image_name)}}" alt="user picture profile" class="rounded-circle" style="width:50px;height:50px;">
                                        @else
                                            <img src="{{asset('storage/users/unknownUser.jpg')}}" alt="user picture profile" class="rounded-circle" style="width:50px;height:50px;">
                                        @endif
                                    </div>

                                    <div class="autor__info">
                                        <p class="name text-white">
                                            {{Auth::user()->fullname}}
                                        </p>
                                        <!--<p class="ammount">2000 تومان</p>-->
                                    </div>

                                    <div class="dropdowns dropdown--author">
                                        <ul>
                                            @if($user->isAdmin())
                                                <li>
                                                    <a href="{{route('admin.index')}}">
                                                        <span class="lnr lnr-user"></span>پنل ادمین
                                                    </a>
                                                </li>
                                            @endif

                                            <li>
                                                <a href="{{route('user.index')}}">
                                                    <span class="lnr lnr-user"></span>پروفایل</a>
                                            </li>

                                            <li>
                                                <a href="dashboard.blade.php">
                                                    <span class="lnr lnr-home"></span>داشبورد</a>
                                            </li>

                                            <li>
                                                <a href="dashboard-setting.blade.php">
                                                    <span class="lnr lnr-cog"></span>تنظیمات</a>
                                            </li>

                                            <li>
                                                <a href="cart.blade.php">
                                                    <span class="lnr lnr-cart"></span>خرید ها</a>
                                            </li>
                                            <li>
                                                <a href="favourites.blade.php">
                                                    <span class="lnr lnr-heart"></span> علاقه مندی ها</a>
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
                                                    <span class="lnr lnr-upload"></span>آپلود ایتم</a>
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

                                <div class="author-author__info mt-3">
                                    <a href="{{ route('login') }}" class="registerLoginButton">ورود</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="registerLoginButton">ثبت نام</a>
                                    @endif

                                </div>

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
                                                    <a href="{{route('user.index')}}">
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
                                    @else
                                        <a href="{{ route('login') }}">ورود</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">ثبت نام</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif

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
                    {{-- <div class="navbar-header">
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
                    </div> --}}

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
                                {{-- <li class="has_dropdown">
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
                                </li> --}}


                                <li class="has_megamenu">
                                    <a href="{{route('shop.index')}}">فروشگاه</a>
                                </li>

                                <li class="has_megamenu">
                                    <a href="{{route('blog.index')}}">مقالات</a>
                                </li>


                                <li class="has_dropdown">
                                    <a href="#">دسته بندی ها </a>
                                    <div class="dropdowns dropdown--menu">
                                        <ul>
                                            @foreach($categories as $category)
                                                <li>
                                                    <a href="{{route('categoryBasedProducts', ['id' => $category->id])}}">{{$category->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
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
