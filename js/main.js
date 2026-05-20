// ハンバーガーメニュー
const $hamburger = $('#js-hamburger');
const $headerMenu = $('.header-menu');
const $overlay = $('#js-overlay');

$hamburger.on('click', function() {
    const isOpen = $headerMenu.hasClass('is-open');
    $hamburger.toggleClass('is-active').attr('aria-expanded', !isOpen);
    $headerMenu.toggleClass('is-open');
    $overlay.toggleClass('is-open');
});

$overlay.on('click', function() {
    $hamburger.removeClass('is-active').attr('aria-expanded', false);
    $headerMenu.removeClass('is-open');
    $overlay.removeClass('is-open');
});

$headerMenu.find('a').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    $hamburger.removeClass('is-active').attr('aria-expanded', false);
    $headerMenu.removeClass('is-open');
    $overlay.removeClass('is-open');
    setTimeout(function() {
        window.location.href = href;
    }, 400);
});

// ページトップ・お問い合わせボタン（FVを超えたら表示、フッター到達で位置固定）
const $pagetop = $('#js-pagetop');
const $contactBtn = $('.contact-btn');
const $toggleElements = $pagetop.add($contactBtn);
const fvHeight = $('.fv').outerHeight();
const $footer = $('.footer');

function updateButtons() {
    const scrollTop = $(window).scrollTop();
    const scrollBottom = scrollTop + $(window).height();
    const footerTop = $footer.offset().top;
    const footerHeight = $footer.outerHeight();
    const isPC = window.matchMedia('(min-width: 768px)').matches;

    $toggleElements.toggleClass('is-show', scrollTop > fvHeight);

    if (scrollBottom >= footerTop) {
        const pagetopOffset = isPC ? 100 : 80;
        $contactBtn.addClass('is-docked').css('bottom', footerHeight);
        $pagetop.addClass('is-docked').css('bottom', footerHeight + pagetopOffset);
    } else {
        $contactBtn.removeClass('is-docked').css('bottom', '');
        $pagetop.removeClass('is-docked').css('bottom', '');
    }
}

$(window).on('scroll', updateButtons);

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

