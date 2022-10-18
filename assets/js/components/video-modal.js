import 'jquery-modal'

$(document).on('click', '.video-link', function (e) {
    e.preventDefault()

    $('.video-modal').modal({
        fadeDuration: 200,
    });

    $('.video-modal').find('video')[0].play()

})


// Pause Video on modal close
$(document).on($.modal.AFTER_CLOSE, '.video-modal', function (event, modal) {
    if (modal.$elm.find('video').length) {
        modal.$elm.find('video')[0].pause()
    }
});

