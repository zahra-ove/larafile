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

                        <a class="list-group-item x  w-100" data-toggle="list" href="#phoneRegister" role="tab">
                            ثبت شماره تماس
                        </a>

                        <a class="list-group-item x  w-100" data-toggle="list" href="#passChange" role="tab">
                            تغییر رمز عبور
                        </a>
                    </div>

                </span>
                <!-- <div class="collapse list-group" id="collapseExample">
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#home" role="tab">
                        مشخصات کاربری
                    </a>

                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#home" role="tab">
                        ویرایش اطلاعات
                    </a>

                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#home" role="tab">
                        ثبت شماره تماس
                    </a>

                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#home" role="tab">
                        تغییر رمز عبور
                    </a>
                </div> -->

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
                <div class="tab-pane"  id="userInfo" role="tabpanel">
                    hi1
                </div>
                <div class="tab-pane"  id="userEdit" role="tabpanel">
                    hi1
                </div>
                <div class="tab-pane"  id="phoneRegister" role="tabpanel">
                    hi1
                </div>
                <div class="tab-pane"  id="passChange" role="tabpanel">
                    hi1
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


