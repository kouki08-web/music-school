$('.qa-title').on('click', function(){
    $(this).toggleClass('active');
    var $next = $(this).next('.qa-text');
    if ($next.is(':hidden')) {
        $next.slideDown(function() {
            $(this).css('display', 'flex');
        });
    } else {
        $next.slideUp();
    }
});

new Swiper('.voice__swiper', {
    slidesPerView: 1,
    spaceBetween: 35,
    loop: true,
    watchOverflow: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        768: {
            slidesPerView: 3,
        }
    }
});

