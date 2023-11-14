<!DOCTYPE html>
<html lang="en">

<head>
   @include('frontend.pertials.css-link')
</head>

<body class="font-display">
    @include('frontend.pertials.header')


    @yield('user')

    @include('frontend.pertials.footer')
    @include('frontend.pertials.script')
</body>

</html>
