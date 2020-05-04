<div class="container my-5">

    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th colspan="4" class="p-2" style="color:white;background-color: darkBlue;font-size:16px;">سبد خرید</th>
            </tr>
        </thead>
    @if($cartItems)


            <!-- **************************************** Guest User **********************************************  -->
            @guest
                <tbody>
                    @foreach($cartItems as $cartItem)

                        <tr>
                            <td class="text-center px-0">
                                <img src="{{asset($cartItem['item']->images()->where('type', 'b')->first()->image_path.'/'.$cartItem['item']->images()->where('type', 'b')->first()->image_name)}}"  alt="product image" style="width:100px;height:100px;"/>
                            </td>

                            <td class="text-center px-0">
                                @if($cartItem['type'] == 'file')

                                    <span>{{$cartItem['item']['file_name']}}</span>
                                    <span>{{$cartItem['item']['file_code']}}</span>

                                @elseif($cartItem['type'] == 'episode')

                                    <span>{{$cartItem['item']['episode_title']}}</span>
                                    <span>{{$cartItem['item']['episode_number']}}</span>

                                @elseif($cartItem['type'] == 'plan')

                                    <span>{{$cartItem['item']['name']}}</span>
                                    <span>{{$cartItem['item']['description']}}</span>

                                @endif
                            </td>

                            <td class="text-center px-0">{{$cartItem['price']}} تومان</td>

                            <td class="text-center px-0">
                                <a  href="{{route('removeFromCart', ['type' => $cartItem['type'], 'id' => $cartItem['item']['id']])}}" class="d-block text-muted" style="font-size:14px;">حذف<i class="far fa-trash-alt pl-2 mr-2"></i></a>
                                <a href="" class="d-block text-muted" style="font-size:14px;">ذخیره در لیست خرید بعدی<i class="fas fa-file-export mr-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="" class="btn btn-danger p-2">ثبت سفارش</a>
                        </td>

                        <td colspan="2" class="text-center">
                            <span class="mr-2">هزینه نهایی:</span><span  class="mr-2">{{$cartTotalPrice}}</span><span>تومان</span>
                        </td>
                    </tr>
                </tfoot>
            @endguest

            <!-- **************************************** Authenticated User **********************************************  -->
            @auth
            <tbody>
                @foreach($cartItems as $cartItem)

                    <tr>
                        <td class="text-center px-0">
                            <img src="{{asset($cartItem->images()->where('type', 'b')->first()->image_path.'/'.$cartItem->images()->where('type', 'b')->first()->image_name)}}"  alt="product image" style="width:100px;height:100px;"/>
                        </td>

                        <td class="text-center px-0">
                            @if($cartItem->productType == 'file')

                                <span>{{$cartItem->file_name}}</span>
                                <span>{{$cartItem->file_code}}</span>

                            @elseif($cartItem->productType == 'episode')

                                <span>{{$cartItem->episode_title}}</span>
                                <span>{{$cartItem->episode_number}}</span>

                            @elseif($cartItem->productType == 'plan')

                                <span>{{$cartItem->name}}</span>
                                <span>{{$cartItem->description}}</span>

                            @endif
                        </td>

                        <td class="text-center px-0">{{$cartItem->price}} تومان</td>

                        <td class="text-center px-0">
                            <a href="{{route('removeFromCart', ['type' => $cartItem->productType, 'id' => $cartItem->id])}}" class="d-block text-muted" style="font-size:14px;">حذف<i class="far fa-trash-alt pl-2 mr-2"></i></a>
                            <a href="" class="d-block text-muted" style="font-size:14px;">ذخیره در لیست خرید بعدی<i class="fas fa-file-export mr-2"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="2" class="text-center">
                        <a href="" class="btn btn-danger p-2">ثبت سفارش</a>
                    </td>

                    <td colspan="2" class="text-center">
                        <span class="mr-2">هزینه نهایی:</span><span  class="mr-2">{{$cartTotalPrice}}</span><span>تومان</span>
                    </td>
                </tr>
            </tfoot>
            @endauth


        @else
            <tbody>
                <tr class="text-center">
                    <td colspan="4">.هیچ کالایی در سبد خرید شما موجود نیست</td>
                </tr>
            </tbody>
        @endif
    </table>

  </div>
