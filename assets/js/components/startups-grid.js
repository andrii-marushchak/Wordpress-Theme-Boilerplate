import List from "list.js";
import Choices from "choices.js";

// Team & Mentors Grid
{
    $('.startups-grid-wrap').each(function () {
        const listWrap = $(this)
        const section = $(this).parents('.acf-section')
        const pagination = listWrap.find(".pagination")
        const paginationWrap = listWrap.find(".pagination-wrap")
        const paginationPrev = listWrap.find(".pagination-prev")
        const paginationNext = listWrap.find(".pagination-next")

        let perPage = 20;

        if (document.documentElement.clientWidth <= 1199) {
            perPage = 15;
        }
        if (document.documentElement.clientWidth <= 991) {
            perPage = 6;
        }
        if (document.documentElement.clientWidth <= 565) {
            perPage = 2;
        }

        // Init
        const StartupsGrid = new List(listWrap.attr('id'), {
            valueNames: ['startup-item'],
            page: perPage,
            pagination: {
                'left': 1,
                'right': 1,
                'paginationClass': "pagination",
                'item': `<li><button class='page'></button></li>`,
                'innerWindow': document.documentElement.clientWidth > 991 ? 3 : 1
            }
        }).on("updated", function (list) {
            let isFirst = list.i == 1;
            let isLast = list.i > list.matchingItems.length - list.page;

            // make the Prev and Nex buttons disabled on first and last pages accordingly
            listWrap.find(".pagination-prev.disabled, .pagination-next.disabled").removeClass(
                "disabled"
            );

            if (isFirst) {
                paginationPrev.addClass("disabled");
            }
            if (isLast) {
                paginationNext.addClass("disabled");
            }

            // hide pagination if there one or less pages to show
            if (list.matchingItems.length <= perPage) {
                paginationWrap.hide();
            } else {
                paginationWrap.show();
            }
        }).update()


        paginationNext.on('click', function (e) {
            e.preventDefault();
            const activePage = Number(pagination.find(".active .page").attr('data-i'));
            listWrap.find(`.pagination .page[data-i="${activePage + 1}"]`).trigger("click");
        });

        paginationPrev.on('click', function (e) {
            e.preventDefault();
            const activePage = Number(pagination.find(".active .page").attr('data-i'));
            listWrap.find(`.pagination .page[data-i="${activePage - 1}"]`).trigger("click");
        });


        // Filter & Search
        const filterBtn = section.find(".form-filters .btn-reset")
        const searchInput = section.find(".form-filters .search input")
        const btnResetFilter = section.find(".form-filters .btn-reset-filter")

        let taxonomySelectsChoices = []
        section[0].querySelectorAll(".form-filters .taxonomy .filter-select").forEach(function (el) {
            taxonomySelectsChoices.push(new Choices(el, {
                searchEnabled: false,
                searchChoices: false,
                sorter: function (a, b) {
                    if (b.value === 'all') {
                        return true
                    }else{
                        return b.label.length - a.label.length;
                    }
                },
            }))
        })


        // Filter Function
        function filterGrid() {

            // Filters
            let filters = []
            taxonomySelectsChoices.forEach((el) => {
                const select = $(el.passedElement.element)
                filters.push({
                    name: select.attr('name'),
                    value: select.val(),
                })
            })

            filters.push({
                name: 'search',
                value: searchInput.val(),
            })

            // Remove 'All' filters and empty filters
            filters = filters.filter((filter) => {
                if (filter.value !== 'all' && filter.value !== '') {
                    return true
                } else {
                    return false
                }
            })

            StartupsGrid.filter(function (item) {
                let match = true;

                filters.forEach(filter => {
                    if (filter.name === 'search') {
                        // Filter by search field

                        let searchValue = filter.value.toLowerCase().trim()
                        let ItemValueForSearch = $(item.elm).find(`.filters .search`).text().toLowerCase().trim()

                        if (ItemValueForSearch.indexOf(searchValue) < 0) {
                            match = false;
                        }

                    } else {
                        // Filter by IDs
                        if ($(item.elm).find(`.filters .${filter.name} span`).attr('data-id') != filter.value) {
                            match = false
                        }
                    }
                })

                return match;
            });
        }

        // Event when clicked on filter
        taxonomySelectsChoices.forEach((el) => {
            el.passedElement.element.addEventListener('choice', function () {
                setTimeout(() => {
                    filterGrid();
                }, 10)
            })
        })

        // Search Field Event
        let timer;
        searchInput.on('keyup input keypress', function (e) {
            clearTimeout(timer);
            timer = setTimeout(function () {
                filterGrid();
            }, 10);
        });
        searchInput.on('keydown', function (e) {
            clearTimeout(timer);
        });

        // Reset Event
        btnResetFilter.on('click', function (e) {
            e.preventDefault()

            // Clear Search Value
            searchInput.val('')

            // Clear Selected Filters
            taxonomySelectsChoices.forEach(el => {
                el.setChoiceByValue('all')
            })

            setTimeout(function () {
                filterGrid();
            }, 10);
        })


        // Search & Filter Compelted event
        StartupsGrid.on('filterComplete', function () {
            if (listWrap.find('.startup-item').length > 0) {
                $('.result-not-found').removeClass('active')
            } else {
                $('.result-not-found').addClass('active')
            }
        })

    })


}