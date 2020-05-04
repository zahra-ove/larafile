@extends('layout.master')

@section('content')

    @include('cart.cart-item', ['cartItems' => $cartItems])

@endsection
