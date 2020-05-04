@if(Auth::check())  <!-- if user is authenticated  -->

    <div class="float-right has_dropdown" style="padding-top:16px;margin-right:20px;">
        <a href="{{route('shoppingCart')}}">
            <span class="fa-stack fa-2x has-badge cartNum" data-count="{{$cartCount}}">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
        </a>
        {{-- @if($cartCount)   <!-- if cart count is not 0 then show all items of this cart   -->
            <div class="dropdowns dropdown--menu">
                @include('partials.cart.cart-item')
            </div>
        @endif --}}

    </div>

@else   <!-- if user is not authenticated  -->

@php
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    // dd($oldCart);
    if($oldCart)
        {$cartCount = $oldCart->totalQty;}
    else
        {$cartCount = 0;}
@endphp

    <div class="float-right has_dropdown" style="padding-top:16px;margin-right:30px;">
        <a href="{{route('shoppingCart')}}">
            <span class="fa-stack fa-2x has-badge cartNum" data-count="{{$cartCount}}">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
            </span>
        </a>
{{--
        @if($cartCount)   <!-- if cart count is not 0 then show all items of this cart   -->
            <div class="dropdowns dropdown--menu">
                @include('partials.cart.cart-item')
            </div>
        @endif --}}
    </div>

@endif
