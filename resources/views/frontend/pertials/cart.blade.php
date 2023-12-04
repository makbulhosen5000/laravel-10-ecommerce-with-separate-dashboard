<ul class="flex items-center gap-3">
 
    <li class="relative">
        <a href="{{ route('show.cart') }}" class="inline-flex gap-2 bg-white rounded-lg p-[11px]" id="addToCart">
            
            <span><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.52087 2.97916L4.42754 3.30916L5.31029 13.8261C5.3442 14.2399 5.5329 14.6258 5.83873 14.9066C6.14457 15.1875 6.54506 15.3427 6.96029 15.3413H16.9611C17.3587 15.3418 17.7431 15.1986 18.0436 14.9383C18.344 14.6779 18.5404 14.3178 18.5965 13.9242L19.4673 7.91266C19.4905 7.75279 19.482 7.58991 19.4422 7.43333C19.4024 7.27675 19.3322 7.12955 19.2354 7.00015C19.1387 6.87074 19.0175 6.76167 18.8786 6.67917C18.7397 6.59667 18.5859 6.54235 18.426 6.51933C18.3673 6.51291 4.73371 6.50833 4.73371 6.50833"
                        stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12.948 9.89542H15.4899" stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.55786 18.5194C6.62508 18.5165 6.69219 18.5273 6.75515 18.551C6.81811 18.5748 6.87562 18.611 6.9242 18.6575C6.97279 18.7041 7.01145 18.76 7.03787 18.8219C7.06428 18.8837 7.0779 18.9503 7.0779 19.0176C7.0779 19.0849 7.06428 19.1515 7.03787 19.2134C7.01145 19.2753 6.97279 19.3312 6.9242 19.3777C6.87562 19.4243 6.81811 19.4605 6.75515 19.4842C6.69219 19.508 6.62508 19.5187 6.55786 19.5158C6.42942 19.5103 6.30808 19.4554 6.21914 19.3626C6.13021 19.2698 6.08057 19.1462 6.08057 19.0176C6.08057 18.8891 6.13021 18.7655 6.21914 18.6726C6.30808 18.5798 6.42942 18.5249 6.55786 18.5194Z"
                        fill="#272343" stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M16.8988 18.5194C17.0312 18.5194 17.1583 18.5721 17.252 18.6657C17.3457 18.7594 17.3983 18.8865 17.3983 19.019C17.3983 19.1515 17.3457 19.2786 17.252 19.3723C17.1583 19.4659 17.0312 19.5186 16.8988 19.5186C16.7663 19.5186 16.6392 19.4659 16.5455 19.3723C16.4518 19.2786 16.3992 19.1515 16.3992 19.019C16.3992 18.8865 16.4518 18.7594 16.5455 18.6657C16.6392 18.5721 16.7663 18.5194 16.8988 18.5194Z"
                        fill="#272343" stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            
            <span>Cart</span>
            <span class="bg-dark-accents text-white rounded-full py-[3px] px-[9px] ml-1 inline-flex justify-center items-center text-[10px] leading-[100%]">{{ $carts->count() }}</span>
        </a>
        {{-- <div class="cart-content">
            @foreach ($carts as $cart)
            <ul class="p-6">
             
                <li class="pb-4">

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1">

                            <div>
                                <img src="{{ url('storage/uploads/', $cart->image) }}" width="150" height="150" alt="">
                            </div>



                            <div class="px-2">
                                <h2 class="text-gray-black">
                                    <span>{{ $cart->product_title }}</span>
                                    <span class="text-[#636270]">x {{ $cart->quantity }}</span>
                                </h2>
                                <p class="text-gray-black font-semibold mb-0">BDT
                                    {{ $cart->product_price }}</p>
                            </div>
                        </div>


                        <div>
                            <button
                                class="hover:bg-[#F0F2F3] bg-transparent p-2 hover:text-gray-black rounded-full text-[#9A9CAA] transition-all duration-500">
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 10L14 14M14 14L18 10M14 14L10 18M14 14L18 18" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </li>

                <div class="flex justify-between items-center py-2 mb-4">
                    <p class="text-[#636270] text-lg"> {{ $cart->quantity }} Products</p>
                    <p class="text-gray-black text-xl font-medium">BDT 500</p>
                </div>
                <div class="flex justify-between items-center">
                    <a href="shopping-cart.html" class="btn-transparent">View Cart</a>
                    <a href="checkout-shopping.html" class="btn-primary">Checkout</a>
                </div>
            </ul>         
            @endforeach               
          
        </div> --}}
    </li>


    <li class="inline-flex items-center justify-center">
        <a href="#" class="bg-white text-gray-black hover:text-[#007580] rounded-lg p-[11px]">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M2.63262 10.6315C1.64903 7.56067 2.79762 4.05075 6.02245 3.01217C6.85867 2.74459 7.74676 2.68086 8.61262 2.82629C9.47849 2.97172 10.297 3.32208 10.9999 3.84817C12.3337 2.81692 14.2743 2.46858 15.9683 3.01217C19.1922 4.05075 20.349 7.56067 19.3664 10.6315C17.8355 15.499 10.9999 19.2482 10.9999 19.2482C10.9999 19.2482 4.21478 15.5558 2.63262 10.6315V10.6315Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </li>
    <li class="relative">
        <button class="bg-white text-gray-black hover:text-[#007580] rounded-lg p-[11px] user-profile">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.9862 14.0672C7.44053 14.0672 4.4137 14.6034 4.4137 16.7503C4.4137 18.8971 7.42128 19.4526 10.9862 19.4526C14.5309 19.4526 17.5587 18.9154 17.5587 16.7695C17.5587 14.6236 14.5502 14.0672 10.9862 14.0672V14.0672Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.9862 11.0055C11.8195 11.0055 12.634 10.7584 13.3268 10.2955C14.0197 9.83255 14.5597 9.17457 14.8785 8.40475C15.1974 7.63492 15.2808 6.78783 15.1183 5.97058C14.9557 5.15334 14.5545 4.40266 13.9653 3.81346C13.3761 3.22426 12.6254 2.82301 11.8081 2.66045C10.9909 2.49789 10.1438 2.58132 9.37397 2.9002C8.60415 3.21907 7.94617 3.75906 7.48324 4.45188C7.02031 5.14471 6.77322 5.95925 6.77322 6.7925C6.76932 7.90581 7.20779 8.97508 7.99218 9.76515C8.77657 10.5552 9.84266 11.0014 10.956 11.0055H10.9862Z"
                    stroke="currentColor" stroke-width="1.429" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

        </button>
        <div class="profile-content">
            <ul class="py-3">
                <div class="px-3 shadow-[0px_1px_0px_#E1E3E6]">
                    <li>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                </div>
                <div class="px-3 shadow-[0px_1px_0px_#E1E3E6]">
                    <li>
                        <a href="account-setting.html">Account Settings</a>
                    </li>
                    <li>
                        <a href="order-history.html">Order History</a>
                    </li>
                </div>
                <div class="px-3 shadow-[0px_1px_0px_#E1E3E6]">
                    <li>
                        <a href="{{ route('show.cart') }}">Wishlist</a>
                    </li>
                    @auth
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn-lg btn-warning" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}">
                        <button class="btn-lg btn-warning" type="submit">Login</button>
                        </form>
                        </a>
                    </li>
                    @endauth
                    
                </div>
            </ul>
        </div>
    </li>
</ul>
