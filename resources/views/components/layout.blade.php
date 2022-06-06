<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}" defer></script>

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

    <title>Document</title>
</head>
<body class="body">
    

    <x-navbar />




    {{$slot}}



    <x-footer /> 
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.swiper', {
        // Optional parameters
        // direction: 'vertical',
        loop: true,
        grabCursor: true,

        // If we need pagination
        pagination: {
            // el: '.swiper-pagination',
            clickable: true,
            
        },

        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        });
    </script>

    {{-- Show --}}
    <script>
        const swiper1 = new Swiper('.swiper1', {
        // Optional parameters
        // direction: 'vertical',
        loop: true,
        grabCursor: true,
        slidesPerView: 1,
        // If we need pagination
        pagination: {
            // el: '.swiper-pagination',
            clickable: true,
            
        },

        

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        });
    </script>
    {{-- Recensioni --}}
    <script>
        const swiper2 = new Swiper('.swiper2', {
            effect: "coverflow",
        grabCursor: false,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
        },
        breakpoints: {
          640: {
            slidesPerView: 1,
            spaceBetween: 0,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 0,
          },
          1024: {
            slidesPerView: 2,
            spaceBetween: 0,
          },
        },
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        });
    </script>

      
</body>
</html>