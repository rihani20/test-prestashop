/*
 * Custom code goes here.
 * A template should always ship with an empty custom.js
 */

    $(document).ready(function(){
        $('.slick-slider').slick({
            slidesToShow: 3, // Nombre de sous-catégories à afficher en même temps
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            dots: true,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3, // Afficher 3 sous-catégories sur les écrans plus petits
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2, // Afficher 2 sous-catégories sur les mobiles
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1, // Afficher 1 sous-catégorie sur les très petits écrans
                    }
                }
            ]
        });
    });
