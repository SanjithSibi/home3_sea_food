$(function () {

    // ------------ team images width same height -----------
    // var images = $(".tc-team-style1 .team-card .img, .img_sm_h");
    // images.each(function () {
    //   var width = $(this).width();
    //   $(this).height(width);
    // });


});


// ------------ swiper sliders -----------
$(document).ready(function () {

    // ------------ testimonials slider -----------
    var swiper = new Swiper('.tc-about-st3 .testimonials-slider', {
        slidesPerView: 1,
        spaceBetween: 24,
        // centeredSlides: true,
        speed: 1000,
        pagination: {
            el: '.tc-about-st3 .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.tc-about-st3 .swiper-button-next',
            prevEl: '.tc-about-st3 .swiper-button-prev',
        },
        mousewheel: false,
        keyboard: true,
        autoplay: {
            delay: 5000,
        },
        loop: true,
    });

    // ------------ services slider -----------
    var swiper = new Swiper('.tc-services-st3 .services-slider', {
        // slidesPerView: 5,
        spaceBetween: 30,
        // centeredSlides: true,
        speed: 1000,
        pagination: {
            el: '.tc-services-st3 .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.tc-services-st3 .swiper-next',
            prevEl: '.tc-services-st3 .swiper-prev',
        },
        mousewheel: false,
        keyboard: true,
        autoplay: {
            delay: 5000,
        },
        loop: true,
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            480: {
                slidesPerView: 2,
            },
            787: {
                slidesPerView: 3,
            },
            991: {
                slidesPerView: 4,
            },
            1200: {
                slidesPerView: 4,
            }
        }
    });


    // ------------ menus slider -----------
    var swiper = new Swiper('.tc-menus-st3 .menu-slider', {
        slidesPerView: 1,
        spaceBetween: 24,
        // centeredSlides: true,
        direction: "vertical",
        speed: 1000,
        pagination: {
            el: '.tc-menus-st3 .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.tc-menus-st3 .swiper-next',
            prevEl: '.tc-menus-st3 .swiper-prev',
        },
        mousewheel: false,
        keyboard: true,
        autoplay: false,
        // autoplay: {
        //     delay: 5000,
        // },
        loop: false,
    });


    // ------------ blog slider -----------
    var swiper = new Swiper('.tc-blog-st3 .posts-slider', {
        slidesPerView: 5,
        spaceBetween: 30,
        centeredSlides: true,
        speed: 1500,
        pagination: {
            el: '.tc-blog-st3 .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.tc-blog-st3 .swiper-next',
            prevEl: '.tc-blog-st3 .swiper-prev',
        },
        mousewheel: false,
        keyboard: true,
        autoplay: {
            delay: 5000,
        },
        loop: true,
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            480: {
                slidesPerView: 2,
            },
            787: {
                slidesPerView: 3,
            },
            991: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
            }
        }
    });

});



// ------------ gsap scripts -----------
$(function () {

    // ------ cases colmns effect ------

    // -------
    const tl1 = gsap.timeline({
        scrollTrigger: {
            trigger: ".tc-header-st3",
            start: "-700 top",
            // end: "bottom bottom",
            scrub: true // Smooth scrolling effect
        }
    });

    tl1.to(".tc-header-st3 .img img", {
        x: 0,
        y: 0,
        scale: 1.30,
        duration: 15,
        ease: "linear",
        delay: 1
    });


});
