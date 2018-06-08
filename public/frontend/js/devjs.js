function displaymenu() {
    var temp = document.getElementById('input_tem').value;
    if (temp == '0') {
        $('#input_tem').val('1');
        $('.menu-respon').addClass('menu-respon-active');
    } else {
        $('.menu-respon').removeClass('menu-respon-active');
        $('#input_tem').val('0');
    }
}

! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
        n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
}(window,
    document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '853590061415267');
fbq('track', "PageView");

$(document).ready(function() {
    $('#slide1 div:first').addClass('active');
});

$(document).ready(function() {
    $("#content-slider3").lightSlider({
        loop: true,
        item: 5,
        keyPress: true,
        auto: true,
        slideMargin: 20,
        pager: false,
        controls: false,

        responsive: [{
                breakpoint: 991,
                settings: {
                    item: 3,
                    slideMove: 1,
                }
            },
            {
                breakpoint: 650,
                settings: {
                    item: 2,
                    slideMove: 1,
                }
            },
        ]
    });
});

$(document).ready(function() {
    $("#content-slider2").lightSlider({
        loop: true,
        item: 10,
        keyPress: true,
        auto: true,
        slideMargin: 20,
        pager: false,
        controls: false,

        responsive: [{
                breakpoint: 991,
                settings: {
                    item: 6,
                    slideMove: 1,
                }
            },
            {
                breakpoint: 650,
                settings: {
                    item: 3,
                    slideMove: 1,
                }
            },
        ]
    });
});