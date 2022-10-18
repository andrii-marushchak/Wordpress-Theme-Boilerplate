import $ from 'jquery'

window.$ = jQuery = $;

import List from 'list.js'


jQuery(document).ready(function ($) {
    "use strict"

    // CSS variable of Scrollbar width
    import('./components/scrollbar-width.js')

    // Anchor Links
    import('./components/anchor-scroll.js')

    // Navigation
    import('./components/navigation.js')

    // Counter
    import('./components/counter.js')

    // Marquee
    import('./components/marquee.js')

    // Accordion
    import('./components/accordion.js')

    // Custom Select
    import('./components/custom-select.js')

    // Checkbox
    import('./components/custom-checkbox.js')

    // Form
    import('./components/form.js')

    // Team & Mentors Grid
    import('./components/mentors-grid.js')

    // Startups
    import('./components/startups-grid.js')

    // Testimonials Slider
    import('./components/testimonials-slider.js')

    // Discount Code
    import('./components/discount-code.js')

    // Video Modal
    import('./components/video-modal.js')

})