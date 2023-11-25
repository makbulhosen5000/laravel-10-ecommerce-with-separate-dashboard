<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.pertials.css-link')
</head>

<body class="font-display">
    @include('frontend.pertials.header')
     <!-- Breadcrumb Start -->
    <div class="breadcrumb">
        <div class="container px-3 md:px-5 xl:px-0">
            <div class="flex items-center gap-1 py-[1.5px]">
                <a href="#" class="text-[14px] font-normal leading-[110%] text-dark-gray">Home</a>

                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.125 5.25L10.875 9L7.125 12.75" stroke="#636270" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="text-[14px] font-medium leading-[110%] font-display text-gray-black inline-block">Shop</span>
            </div>

            <h2 class="pt-[13.5px] text-2xl font-semibold text-gray-black font-display">Orders</h2>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <section>
        <div class="container px-3 md:px-5 xl:px-0">
            <!-- shoping cart List Start -->
            <div class="shopping-cart-wrapper pt-10 pb-20 flex lg:flex-nowrap flex-wrap items-start gap-6">
                <!-- shopping cart start -->
                <div class="shopping-cart lg:w-2/3 w-full">
                    <div class="px-6 py-6 overflow-x-auto">
                        
                        <table class="w-[824px] leading-normal">
                            <thead>
                                <tr>
                                    <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[240px]">
                                        Products
                                    </th>
                                    <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[104px]">
                                        Price
                                    </th>
                                    <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[164px]">
                                        Quantity
                                    </th>
                                    <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[96px]">
                                        Sub Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $subTotal = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                <tr class="cart-item">
                                    <td class="py-6 text-sm">
                                        <div class="flex gap-2 items-center">
                                            <a href="{{ route('delete.cart',$cart->id) }}" id='delete'>
                                                <button class="del">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 2L6.00003 6M6.00003 6L10 2M6.00003 6L2 10M6.00003 6L10 10" stroke="#9A9CAA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                           </a>
                                       
                                            <div class="w-[70px] h-[70px]">
                                                <img class="w-full h-full rounded-lg" src="{{ url('storage/uploads/', $cart->image) }}" alt="" />
                                            </div>
                                            <div class="ml-1">
                                                <p class="mb-0 text-[#272343] text-sm">{{ $cart->product_title }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-6 text-sm">
                                        <p class="mb-0">${{ $cart->product_price }}</p>
                                    </td>
                                    <td class="py-6 text-sm">
                                         <p>{{ $cart->quantity }}</p>
                                        {{-- <div class="border inline-flex justify-around items-center h-[52px] w-[140px] border-[#D6D9DD] rounded-lg">
                                            <span class="w-5 h-5 inline-flex justify-center items-center text-[#9A9CAA] pl-[14px] select-none minus" id="minus">-</span>
                                            <input type="text" class="text-[#272343] text-base plus_mines_input select-none" value="{{ $cart->quantity }}"/>
                                            <span class="w-5 h-5 inline-flex justify-center items-center text-[#9A9CAA] pr-[14px] select-none plus" id="plus">+</span>
                                        </div> --}}
                                    </td>
                                    <td class="py-6 text-sm">
                                        <p>${{ $cart->product_price }}</p>
                                    </td>
                                </tr>
                                  @php 
                                    $subTotal = $subTotal + $cart->product_price;
                                   @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="my-0">
                    <div class="coupon-wrap p-6">
                        <a href="{{ url('/') }}"><button class="bg-[#007580] hover:bg-[#272343] transition-all duration-300 inline-flex font-semibold text-gray-white coupon-btn px-6 py-[17px] rounded-lg">Continue Shopping</button></a>
                    </div>

                </div>
                <!-- shopping cart end -->

                <!-- Cart Total End -->
                <div class="cart-total p-8 lg:w-1/3 w-full">
                    <div class="subtotal-info">
                        <div class="flex justify-between items-center">
                            <p class="common-hedding">subtotal</p>
                           
                            <p class="text-gray-black text-[16px] leading-[120%] font-display font-medium">${{ $subTotal }}</p>
                            
                        </div>
                        <div class="flex justify-between items-center pt-4">
                            <p class="common-hedding">shipping </p>
                            <p class="text-gray-black text-[16px] leading-[120%] font-display font-medium">$2</p>
                        </div>
                        <hr>
                        <div class="flex justify-between items-center">
                            <p class="common-hedding">Total:</p>
                            <p class="text-gray-black text-[22px] leading-[120%] font-display font-semibold">${{ $subTotal== 0 ? 0 : $subTotal+2 }}</p>
                        </div>
                        <div>
                            <p class="font-display font-bold text-center text-[18px]  mt-5 text-dark">Processed To Checkout</p>
                        </div>
                        <a href="{{ route('cash.on.delivery') }}" class="mt-6 bg-accents hover:bg-[#272343] transition-all duration-300 py-[19px] rounded-lg text-[18px] font-bold font-display leading-[110%] text-gray-white text-center w-full">
                            Cash On Delivery
                        </a>
                        <a href="{{route('stripe.payment',$subTotal)}}" class="mt-6 bg-accents hover:bg-[#272343] transition-all duration-300 py-[19px] rounded-lg text-[18px] font-bold font-display leading-[110%] text-gray-white text-center w-full">
                             Pay Using Card
                        </a>
                       
                    </div>
                </div>
                <!-- Cart Total Start -->
            </div>
        </div>
    </section>   

    <!-- shopping cart List End -->

    @include('frontend.pertials.footer')
    @include('frontend.pertials.script')

</body>

</html>
