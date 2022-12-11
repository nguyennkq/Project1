
    const swiper = new Swiper('.swiper', {
        coverflowEffect: {
            rotate: 30,
            slideShadows: false,
        },
        speed: 800,
        autoplay: {
            delay: 4000,
        },
        effect: 'fade',
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });

  