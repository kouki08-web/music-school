$('body').show();

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
const fvHeight = $('.fv').outerHeight() || 0;
const $footer = $('.footer');

// position:absolute にした時の実際の基準(直近のpositioned祖先)のoffsetTopを取得
function getAnchorTop(el) {
    let node = el.parentElement;
    while (node) {
        if (getComputedStyle(node).position !== 'static') {
            return $(node).offset().top;
        }
        node = node.parentElement;
    }
    return 0;
}

function updateButtons() {
    const scrollTop = $(window).scrollTop();
    const scrollBottom = scrollTop + $(window).height();
    const footerAbsTop = $footer.offset().top;
    const isPC = window.matchMedia('(min-width: 768px)').matches;

    $toggleElements.toggleClass('is-show', scrollTop > fvHeight);

    if (scrollBottom >= footerAbsTop) {
        const isContactPage = $('body').hasClass('page-contact');
        const pagetopOffset = isPC ? (isContactPage ? 32 : 90) : (isContactPage ? 18 : 80);
        const contactAnchorTop = getAnchorTop($contactBtn[0]);
        const pagetopAnchorTop = getAnchorTop($pagetop[0]);
        $contactBtn.addClass('is-docked').css({ bottom: 'auto', top: footerAbsTop - contactAnchorTop - $contactBtn.outerHeight() });
        $pagetop.addClass('is-docked').css({ bottom: 'auto', top: footerAbsTop - pagetopAnchorTop - pagetopOffset - $pagetop.outerHeight() });
    } else {
        $contactBtn.removeClass('is-docked').css({ bottom: '', top: '' });
        $pagetop.removeClass('is-docked').css({ bottom: '', top: '' });
    }
}

let isUpdateButtonsQueued = false;
$(window).on('scroll', function() {
    if (isUpdateButtonsQueued) return;
    isUpdateButtonsQueued = true;
    requestAnimationFrame(function() {
        updateButtons();
        isUpdateButtonsQueued = false;
    });
});
updateButtons();

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

$('.qa-text').on('click', function(){
    $(this).prev('.qa-title').trigger('click');
});

// プランテーブル カスタムスクロールバー
const wrapper = document.querySelector('.plan-table__wrapper');
const track = document.querySelector('.plan-table__scrollbar');
const thumb = document.querySelector('.plan-table__scrollbar-thumb');

if (wrapper && track && thumb) {
    const updateThumbPosition = () => {
        const scrollRatio = wrapper.scrollLeft / (wrapper.scrollWidth - wrapper.clientWidth);
        const maxLeft = track.clientWidth - thumb.clientWidth;
        thumb.style.left = `${scrollRatio * maxLeft}px`;
    };

    wrapper.addEventListener('scroll', updateThumbPosition);

    let isDragging = false;
    let startX = 0;
    let startLeft = 0;

    thumb.addEventListener('pointerdown', (e) => {
        isDragging = true;
        startX = e.clientX;
        startLeft = parseInt(thumb.style.left || 0, 10);
        thumb.setPointerCapture(e.pointerId);
    });

    thumb.addEventListener('pointermove', (e) => {
        if (!isDragging) return;
        const delta = e.clientX - startX;
        const maxLeft = track.clientWidth - thumb.clientWidth;
        const newLeft = Math.min(Math.max(startLeft + delta, 0), maxLeft);
        thumb.style.left = `${newLeft}px`;
        wrapper.scrollLeft = (newLeft / maxLeft) * (wrapper.scrollWidth - wrapper.clientWidth);
    });

    thumb.addEventListener('pointerup', () => { isDragging = false; });
}

// お問い合わせフォーム：項目名クリックで入力欄にフォーカス
document.querySelectorAll('.smf-item__label').forEach((label) => {
    label.style.cursor = 'pointer';
    label.addEventListener('click', () => {
        const control = label.closest('.smf-item')?.querySelector('input, textarea, select');
        control?.focus();
    });
});

// お問い合わせフォーム：送信完了後にサンクスページへ遷移
const $smfForm = document.querySelector('.snow-monkey-form');
if ($smfForm) {
    const contactSendUrl = '/contact-send/';
    const observer = new MutationObserver(() => {
        if ($smfForm.dataset.screen === 'complete') {
            window.location.href = contactSendUrl;
        }
    });
    observer.observe($smfForm, { attributes: true, attributeFilter: ['data-screen'] });
}

const voiceSwiper = new Swiper('.voice__swiper', {
    slidesPerView: 1,
    spaceBetween: 35,
    loop: true,
    grabCursor: false,
    speed: 600,
    breakpoints: {
        768: {
            slidesPerView: 3,
            spaceBetween: 35,
        }
    }
});

document.querySelector('.voice-btn-prev').addEventListener('click', () => {
    voiceSwiper.slidePrev();
});
document.querySelector('.voice-btn-next').addEventListener('click', () => {
    voiceSwiper.slideNext();
});


