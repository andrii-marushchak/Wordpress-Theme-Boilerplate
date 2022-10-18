import {disablePageScroll, enablePageScroll} from 'scroll-lock';

//* Side Mobile Navigation
{
    $(document).on('click', '.nav-main__toggle', function (e) {
        e.preventDefault()
        $('.nav-side').addClass('active')
        disablePageScroll()
    })

    // Close
    $(document).on('click', '.nav-side__close', function (e) {
        e.preventDefault()
        $('.nav-side').removeClass('active')
        enablePageScroll()
    })

    $(document).on('click', '.nav-side .menu li.menu-item-has-children>a .sub-menu-toggle', function (e) {
        if (document.documentElement.clientWidth <= 991) {
            e.preventDefault();
            $(this).parents('li').eq(0).toggleClass('active');
            $(this).parents('li').eq(0).find('.sub-menu').eq(0).slideToggle('fast');
        }
    });
}

//* Fixed Desktop Navigation
{
    const navFixed = $('.nav-main').clone();
    navFixed.addClass('fixed').insertAfter('.nav-main')

    let lastScroll = 0;
    $(window).on('scroll', function () {
        const scroll = $(this).scrollTop();
        if (scroll >= 450) {
            navFixed.addClass('active');
        } else {
            navFixed.removeClass('active');
        }
        lastScroll = scroll;
    });
}

//* Dropdown Menu
{
    // Mega Menu
    $('.menu-item-has-children ').each(function () {


        const link = $(this);
        const megaMenu = link.find('.sub-menu').eq(0);
        let mouseOnMegaMenu = false;

        // Link Hover
        link.on('mouseover touchstart', () => {
            if (document.documentElement.clientWidth > 991) {
                $('.menu-item-has-children ').removeClass('active');
                $('.sub-menu').removeClass('active');

                link.addClass('active');
                megaMenu.addClass('active');
            }
        });

        // Mega Menu Hover
        megaMenu.on('mouseover touchstart', (e) => {
            if (document.documentElement.clientWidth > 991) {
                $('.menu-item-has-children ').removeClass('active');
                $('.sub-menu').removeClass('active');

                mouseOnMegaMenu = true;
                megaMenu.addClass('active');
            }
        });

        // Link Leave
        link.on('mouseleave', (e) => {
            if (document.documentElement.clientWidth > 991) {
                setTimeout(() => {
                    if (!mouseOnMegaMenu) {
                        link.removeClass('active');
                        megaMenu.removeClass('active');
                    }
                }, 290);
            }
        });

        // Mega Menu Leave
        megaMenu.on('mouseleave', (e) => {
            if (document.documentElement.clientWidth > 991) {
                mouseOnMegaMenu = false;
                setTimeout(() => {
                    megaMenu.removeClass('active');
                    link.removeClass('active');
                }, 200);
            }
        });


    });

    // Click Outside
    $(document).on('click', function (e) {
        if (document.documentElement.clientWidth > 991) {

            let el = $(e.target);
            if ($('.sub-menu.active').length) {
                if (
                    !el.is('.mega-menu.active') &&
                    !el.is('.mega-menu-wrap.active') &&
                    !el.parents('.mega-menu-wrap.active').length &&
                    !el.parents('.mega-menu.active').length
                ) {
                    $('.sub-menu.active').removeClass('active');
                    $('.menu-item-has-children.active').removeClass('active');
                }
            }

        }
    });
}