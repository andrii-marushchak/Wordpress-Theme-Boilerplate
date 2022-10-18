function CopyToClipboard(val) {
    var hiddenClipboard = $('#_hiddenClipboard_');
    if (!hiddenClipboard.length) {
        $('body').append('<textarea style="position:absolute;top: -9999px;" id="_hiddenClipboard_"></textarea>');
        hiddenClipboard = $('#_hiddenClipboard_');
    }
    hiddenClipboard.html(val);
    hiddenClipboard.select();
    document.execCommand('copy');
    document.getSelection().removeAllRanges();
    hiddenClipboard.remove();
}

$(document).on('click', '.btn-copy-discount', function () {
    const code = $('.discount__code').text()

    CopyToClipboard(code)

    $('.discount__code').text('Copied')

    setTimeout(() => {
        $('.discount__code').text(code)
    }, 1500)
})