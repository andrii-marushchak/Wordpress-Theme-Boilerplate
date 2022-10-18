import Swal from 'sweetalert2'


//? Native CF7 checkbox
{
    $('.checkbox-group.custom').find('input[type=checkbox]').on('click', function () {
        $(this).parents('.input-wrap').toggleClass('active')
    })
}

//? Contact Form 7 Native Validation + Swall nottification
const wpcf7Elm = document.querySelectorAll('.wpcf7');
if (wpcf7Elm) {

    if (
        $('.wpcf7, .wpcf7-form').parents('.form-wrap,.form').length
    ) {
        $('.wpcf7, .wpcf7-form').find(".wpcf7-form-control[aria-required='true']").prop('required', true);
        $('.wpcf7, .wpcf7-form').find(".wpcf7-form").removeAttr('novalidate');
    }

    wpcf7Elm.forEach(form => {
        form.addEventListener('wpcf7beforesubmit', function (event) {
            $('body').addClass('wait');

            $(form).find('.loader').addClass('active')
            $(form).find('button[type=submi]').addClass('wait disabled')

        }, false);

        form.addEventListener('wpcf7submit', function (event) {
            $('body').removeClass('wait');

        }, false)

        // Success
        form.addEventListener('wpcf7mailsent', function (event) {
            Swal.fire({
                icon: 'success',
                title: PHP.success_notification.title,
                text: PHP.success_notification.text,
                confirmButtonText: PHP.success_notification.button_caption
            });

            $('body').removeClass('wait');
            $(form).find('.btn-primary').removeClass('wait disabled')
            $(form).find('.loader').removeClass('active')

        }, false);


        // Fail
        form.addEventListener('wpcf7mailfailed', function (event) {

            Swal.fire({
                icon: 'error',
                title: PHP.error_notification.title,
                text: PHP.error_notification.text,
                confirmButtonText: PHP.error_notification.button_caption
            });

            $('body').removeClass('wait');
            $(form).find('button[type=submi]').removeClass('wait disabled')
            $(form).find('.loader').removeClass('active')

        }, false);
    });

}


//? Mentor Prefill
{
    if($('#mentor-name').length){
        const mentorName = $('.member__name').text()
        $('#mentor-name').val(mentorName)
    }
}