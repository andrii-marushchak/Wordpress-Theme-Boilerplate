$('.accordion-item').each(function () {
    const item = $(this)
    const header = $(this).find('.accordion-item__header')
    const body = $(this).find('.accordion-item__body')

    header.on('click',function (e){
        e.preventDefault()

        item.toggleClass('active')
        body.slideToggle('fast')

    })

})