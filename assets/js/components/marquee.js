import 'jquery.marquee/jquery.marquee.min.js';

if ($('.marquee').length) {
    $('.marquee, .marquee-reverse').each(function () {

        let direction = $(this).attr('data-direction') ? $(this).attr('data-direction') : 'left';

        $(this).marquee({
            allowCss3Support: true,
            duration: $(this).attr('data-duration') ? $(this).attr('data-duration') : 25000,
            gap: 0,
            delayBeforeStart: 0,
            direction: direction,
            duplicated: true,
            startVisible: true,
        });

    });
}



