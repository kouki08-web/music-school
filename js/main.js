// ページトップ・お問い合わせボタン（FVを超えたら表示）
const $pagetop = $('#js-pagetop');
const $contactBtn = $('.contact-btn');
const fvHeight = $('.fv').outerHeight();

$(window).on('scroll', function() {
    if ($(this).scrollTop() > fvHeight) {
        $pagetop.addClass('is-show');
        $contactBtn.addClass('is-show');
    } else {
        $pagetop.removeClass('is-show');
        $contactBtn.removeClass('is-show');
    }
});

$pagetop.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 500);
});

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

