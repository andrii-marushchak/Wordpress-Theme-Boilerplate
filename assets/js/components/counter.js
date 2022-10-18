import inView from 'in-view'

if ($('.counter-animated').length) {
    inView.threshold(0.1);
    inView('.counter-animated').on('enter', function (counter) {
        if (!$(counter).hasClass('animated')) {
            $(counter).prop('Counter', 0).animate({
                Counter: Number($(counter).text())
            }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $(counter).text(Math.ceil(now));
                }
            });
        }
        $(counter).addClass('animated');
    });
}