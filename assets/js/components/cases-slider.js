import Swiper, {Parallax, Pagination} from 'swiper';

$('.cases-slider__wrap').each(function () {
    const wrap = $(this);
    const slider = wrap.find('.cases-slider')
    const pagination = wrap.find('.cases-slider-pagination')

    const interleaveOffset = 0.5;

    const casesSwiper = new Swiper(slider[0], {
        modules: [Parallax, Pagination],
        loop: true,
        slidesPerView: 'auto',
        speed: document.documentElement.clientWidth > 767 ? 1000 : 500,
        direction: 'horizontal',
        grabCursor: true,
        resistanceRatio: 0,
        scrollContainer: true,
        mousewheelControl: true,
        forceToAxis: true,
        pagination: {
            el: pagination[0],
            type: 'bullets',
            clickable: true,
        },
        mousewheel: {
            forceToAxis: true,
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
        parallax: true,
        watchSlidesProgress: true,
        on: {
            progress: function (swiper, progress) {
                for (let i = 0; i < swiper.slides.length; i++) {
                    let slideProgress = swiper.slides[i].progress;
                    let innerOffset = swiper.width * interleaveOffset;
                    let innerTranslate = slideProgress * innerOffset;
                    swiper.slides[i].querySelector(".slide-inner").style.transform = "translate3d(" + innerTranslate + "px, 0, 0)";
                }
            },

            touchStart: function (swiper, event) {
                for (let i = 0; i < swiper.slides.length; i++) {
                    swiper.slides[i].style.transition = "";
                }
            },

            setTransition: function (swiper, transition) {
                for (let i = 0; i < swiper.slides.length; i++) {
                    swiper.slides[i].style.transition = transition + "ms";
                    swiper.slides[i].querySelector(".slide-inner").style.transition = transition + "ms";
                }
            }
        }
    });


    casesSwiper.on('slideChangeTransitionEnd',function (){
        const activeIndex = slider.find('.swiper-slide-active').attr('data-item')

        $('.cases-slider__tabs .tab-item').each(function (){
            if($(this).attr('data-item') === activeIndex){
                $(this).addClass('active')
            }else{
                $(this).removeClass('active')
            }
        })
    })


    $('.cases-slider__tabs .tab-item').on('click', function (e) {
        e.preventDefault();

        const index = $(this).attr('data-item')

        $(this).addClass('active')
            .siblings('.tab-item').removeClass('active')

        casesSwiper.slideToLoop(index - 1)
    })

})


