$(window).load(function () {
    $('.top-list').carouFredSel({
        auto: true,
        prev: '.top-prev',
        next: '.top-next',
        width: 960,
        items: {
            visible: {
                min: 1,
                max: 4
            },
            height: 'auto',
            width: 240,
        },
        responsive: false,
        scroll: 1,
        mousewheel: false,
        swipe: {
            onMouse: false,
            onTouch: false
        }
    });
});

$(window).load(function () {
    $('.new-list').carouFredSel({
        auto: false,
        prev: '.new-prev',
        next: '.new-next',
        width: 960,
        items: {
            visible: {
                min: 1,
                max: 4
            },
            height: 'auto',
            width: 240,
        },
        responsive: false,
        scroll: 1,
        mousewheel: false,
        swipe: {
            onMouse: false,
            onTouch: false
        }
    });
});
