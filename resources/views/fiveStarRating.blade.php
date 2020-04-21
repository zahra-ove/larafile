<div class="card">
    <div class="card-header font-weight-bolder">امتیاز به این دوره</div>
    <div class="card-body">

        <div class="container mb-3">
            <div id="rateyo" class="mx-auto">
                <input type="hidden" id="info"  data-type={{$type}} data-id="{{$id}}" />
            </div>
        </div>
        {{-- @dd($avgrate) --}}
        <div class="container">
            <small style="color:darkblue;display:block;" class="font-weight-bold">رای شما به این دوره:  <span id="userRate" class="font-weight-bold font-italic text-danger">@isset($userRate) {{$userRate}} ستاره @else {{'شما به این دوره رای نداده اید.'}} @endisset</span></small>
            <small style="color:darkblue;display:block;" class="font-weight-bold">میانگین آراء:  <span id="avgrate" class="font-weight-lighter font-italic text-danger" data-avg={{$avgrate}}>@isset($avgrate) {{$avgrate}} ستاره@else {{'برای این دوره رایی ثبت نشده است.'}} @endisset</span></small>
            <small style="color:darkblue;" class="font-weight-bold">تعداد آراء:  <span id="countrate" class="font-weight-lighter font-italic text-danger">{{$rateCount}} رای</span ></small>
        </div>

    </div>
</div>
