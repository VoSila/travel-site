$(document).ready(function () {
    $(".slider").slick({
        arrows: true,
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        // variableWidth: true,
        speed: 1000,
        easing: 'ease',
        infinite: false,
        autoplay: true,
        responsive: [
            {
                breakpoint: 450,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }, {
                breakpoint: 840,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            }, {
                breakpoint: 1480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            }, {
                breakpoint: 1980,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
            }
        ]
    });
});

