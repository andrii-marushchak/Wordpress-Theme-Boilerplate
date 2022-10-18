import Swiper, {EffectFade, Navigation} from 'swiper';

$('.feedback-slider-wrapper').each(function () {
    const wrap = $(this);
    const slider = wrap.find('.feedback-slider');
    const btnNext = wrap.find('.feedback-slider-button-next')[0];
    const btnPrev = wrap.find('.feedback-slider-button-prev')[0];

    let args = {
        modules: [Navigation, EffectFade],
        effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },
        speed:250,
        loop: true,
        grabCursor: true,
        slidesPerView: 1,
        direction: 'horizontal',
        navigation: {
            nextEl: btnNext,
            prevEl: btnPrev,
        },
    }

    if (document.documentElement.clientWidth <= 565) {
        args.effect = 'slide'
        args.spaceBetween = 50
    }

    const feedbackSwiper = new Swiper(slider[0], args);
});
