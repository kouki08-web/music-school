$('.qa-title').on('click', function(){
    $(this).toggleClass('active');
    $(this).next().slideToggle();
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

