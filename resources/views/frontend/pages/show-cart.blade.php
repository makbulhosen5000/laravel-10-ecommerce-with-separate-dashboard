<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.pertials.css-link')
</head>

<body class="font-display">
    @include('frontend.pertials.header')

    <div class="container">
       

        <div class="p-6">

            @php 
                 $totalPrice = 0;
            @endphp
            @foreach ($carts as $cart)
            <div class="pb-4">
               
                <div class="flex items-center">
                    <div class="flex items-center gap-1">

                        <div>
                            <img src="{{ url('storage/uploads/', $cart->image) }}" width="150" height="150" alt="">
                        </div>



                        <div class="px-2">
                            <h2 class="text-gray-black">
                                <span>{{ $cart->product_title }}</span>
                                <span class="text-[#636270]">x {{ $cart->quantity }}</span>
                            </h2>
                            <p class="text-gray-black font-semibold mb-0">${{ $cart->product_price }} </p>
                        </div>
                    </div>


                    <div>
                        <a href="{{ route('delete.cart',$cart->id) }}" id='delete'>
                            <button
                            class="hover:bg-[#F0F2F3] bg-transparent p-2 hover:text-gray-red rounded-full text-[#2946fd] transition-all duration-500">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 10L14 14M14 14L18 10M14 14L10 18M14 14L18 18" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                           </button> 
                        </a>

                    </div>
                </div>
                
            </div>
              
            @php 
            $totalPrice = $totalPrice + $cart->product_price;
            @endphp
             @endforeach
            <div class="flex gap-5  items-center py-2 mb-4">
                <p class="text-[#636270] text-lg">Total: {{ $carts->count() }} Products</p>
                <p class="text-gray-black text-xl font-medium">Tatal: ${{ $totalPrice }}</p>
            </div>
            
            <div class="flex gap-4 items-center">
                <a href="{{ url('/') }}" class="btn-transparent">Continue Shopping</a>
                <a href="checkout-shopping.html" class="btn-primary">Checkout</a>
            </div>
        </div>
            
       

    </div>

    @include('frontend.pertials.footer')
    @include('frontend.pertials.script')

</body>

</html>
