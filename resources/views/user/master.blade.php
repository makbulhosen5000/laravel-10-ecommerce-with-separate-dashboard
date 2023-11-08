<!DOCTYPE html>
<html lang="en">

<head>
   @include('user.pertials.css-link')
</head>

<body class="font-display">
    @include('user.pertials.header')
    @include('user.pertials.banner')

    @yield('content')
    
    @include('user.pertials.feature-brand-area')
    @include('user.pertials.top-category')
    @include('user.pertials.mixit-up')
    @include('user.pertials.testimonial')
    @include('user.pertials.recent-product')
    @include('user.pertials.footer')
    @include('user.pertials.script')
</body>

</html>
