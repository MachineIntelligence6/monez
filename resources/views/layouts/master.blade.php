<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>

<div id="app">
    @include('sections.header')
    <main>
        <div id="app">
            @yield('content')
        </div>
    </main>

    @include('sections.footer')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

<!-- Animate On Scroll -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
    $('.about-card').on('mouseenter', function () {
        $('.about-card').removeClass('active');
        $(this).addClass('active');
    }).on('mouseleave', function () {
        $('.about-card').removeClass('active');
        $('.about-card.selected').addClass('active');
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $('.ui-block-08.team-sec .team-carousel').owlCarousel({
        items: 1,
        loop: false,
        smartSpeed: 500,
        responsiveClass: true,
        nav: false,
        dots: false,
        rtl: true,
        autoplay: false,
        margin: 30,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        // autoWidth:true,
        responsive: {
            0: {
                items: 1,
                //  autoWidth:true,
            },
            480: {
                items: 1,
                // autoWidth:true,
            },
            992: {
                items: 3,
                //  autoWidth:true,
            }
        }
    });

    $('#team-next').click(function () {
        var owl = $('.team-carousel');
        owl.owlCarousel();
        owl.trigger('next.owl.carousel');
    });
    $('#team-prev').click(function () {
        var owl = $('.team-carousel');
        owl.owlCarousel();
        owl.trigger('prev.owl.carousel', [300]);
    });

</script>
</body>
</html>
