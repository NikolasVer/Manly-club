$(document).ready(function () {

    $(window).load(function() {
        $('body').addClass('body-loaded');
        setTimeout(function() {
            $('body').removeClass('body-loading').removeClass('body-loaded');
        }, 500);
    });

    jQuery.fn.exists = function () {
        return this.length > 0;
    };

    $('[data-toggle="answer-comment"]').on('click', function() {
        $('#comment_parent').val($(this).attr('data-id'));
    });

    $('.header__video_bg').videoBG({
        position: "absolute",
        zIndex: 1,
        mp4: 'videobg/header_bg.mp4',
        ogv: 'videobg/header_bg.ogv',
        webm: 'videobg/header_bg.webm',
        poster: 'videobg/header_bg.jpg',
        opacity: 1,
        //fullscreen: true,
    });

    if ($('.rellax').exists()) {
        var rellax = new Rellax('.rellax');
    }

    $(".header__ico-slide-ancor").click(function () {
        $('html, body').animate({
            scrollTop: $("#brand-holder").offset().top
        }, 1200);
    });


    $(".product__bottom-tab .shop__swich ul li").click(function () {
        $('html, body').animate({
            scrollTop: $("#product-bottom-tab").offset().top
        }, 1200);
    });

    var sync1 = $(".sync1");
    var sync2 = $(".sync2");

    sync1.owlCarousel({
        singleItem: true,
        slideSpeed: 1000,
        navigation: false,
        pagination: true,
        afterAction: syncPosition,
        responsiveRefreshRate: 200,
    });

    sync2.owlCarousel({
        items: 7,
        itemsDesktop: [1199, 10],
        itemsDesktopSmall: [979, 10],
        itemsTablet: [768, 8],
        itemsMobile: [479, 4],
        pagination: false,
        responsiveRefreshRate: 100,
        afterInit: function (el) {
            el.find(".owl-item").eq(0).addClass("synced");
        }
    });

    function syncPosition(el) {
        var current = this.currentItem;
        $(".sync2")
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced")
        if ($(".sync2").data("owlCarousel") !== undefined) {
            center(current)
        }
    }

    $(".sync2").on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).data("owlItem");
        sync1.trigger("owl.goTo", number);
    });

    function center(number) {
        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
        var num = number;
        var found = false;
        for (var i in sync2visible) {
            if (num === sync2visible[i]) {
                var found = true;
            }
        }

        if (found === false) {
            if (num > sync2visible[sync2visible.length - 1]) {
                sync2.trigger("owl.goTo", num - sync2visible.length + 2)
            } else {
                if (num - 1 === -1) {
                    num = 0;
                }
                sync2.trigger("owl.goTo", num);
            }
        } else if (num === sync2visible[sync2visible.length - 1]) {
            sync2.trigger("owl.goTo", sync2visible[1])
        } else if (num === sync2visible[0]) {
            sync2.trigger("owl.goTo", num - 1)
        }

    }

    $('#faq-menu').ddscrollSpy({
        spytarget: document.getElementById('contentcontainer')
    })


    var winHeight = $(window).height()
    $('.header__bg').height(winHeight);
    $(window).resize(function () {
        var winHeight = $(window).height()
        $('.header__bg').height(winHeight);
    });

    var winHeight = $(window).height()
    var headerHeight = $('.header').height()
    $('.faq-page__menu-posts-in').height(winHeight - headerHeight);
    $(window).resize(function () {
        var winHeight = $(window).height()
        var headerHeight = $('.header').height()
        $('.faq-page__menu-posts-in').height(winHeight - headerHeight);
    });

    var winHeight = $(window).height()
    var headerHeight = $('.header').height()
    $('.partners-page__map').height(winHeight - headerHeight);
    $(window).resize(function () {
        var winHeight = $(window).height()
        var headerHeight = $('.header').height()
        $('.partners-page__map').height(winHeight - headerHeight);
    });

    $("#partners-slider").owlCarousel({
        navigation: true,
        pagination: false,
        paginationNumbers: false,
        slideSpeed: 200,
        paginationSpeed: 800,
        rewindSpeed: 1000,
        items: 5,
        itemsCustom: false,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
    });

    $(".shop__item-slider").owlCarousel({
        afterMove: function () {
            var o = $(this)[0];
            var c = o.$elem.next();
            o.$elem.parent().find('.shop__card').attr('data-item', o.currentItem);
            c.find('.shop__ml span, .shop__price span').removeClass('active');
            c.find('[data-index="' + o.currentItem + '"]').addClass('active');
        },
        navigation: false,
        pagination: true,
        paginationNumbers: false,
        slideSpeed: 200,
        paginationSpeed: 800,
        rewindSpeed: 1000,
        itemsCustom: false,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: true,
        itemsScaleUp: false,
    });


    $(".blog__item-slider").owlCarousel({
        items: 4,
        navigation: false,
        pagination: true,
        paginationNumbers: false,
        slideSpeed: 200,
        paginationSpeed: 800,
        rewindSpeed: 1000,
        itemsCustom: false,
        itemsDesktop: [1416, 4],
        itemsDesktopSmall: [1210, 3],
        itemsTablet: [958, 2],
        itemsTabletSmall: false,
        itemsMobile: [599, 1],
        itemsScaleUp: false,
    });


    $(".fancybox").fancybox({
        padding: 0,
    });

    $(".fancybox-02").fancybox({
        padding: 0,
        afterLoad: function () {
            $(".fancybox-overlay").addClass("popup-02");
        }
    });


    $('.closeFancybox').click(function () {
        $.fancybox.close();
    })

    $(".footer__btn-to-top").click(function () {
        $('html, body').animate({
            scrollTop: $(".header").offset().top
        }, 1000);
    });

    $('.slider-holder .main-slider ul li').each(function (e) {
        var bg_ = 'url(' + $(this).find('img').attr('src') + ')';
        $(this).css('background-image', bg_);
    });

    $('.main-category__items .col .bg-img').each(function (e) {
        var bg_ = 'url(' + $(this).find('img').attr('src') + ')';
        $(this).css('background-image', bg_);
    });

    $('.main-category__items .col .bg-img__box-inf-in').each(function (e) {
        var bg_ = 'url(' + $(this).find('img').attr('src') + ')';
        $(this).css('background-image', bg_);
    });

    $('.main-category__items .col').each(function (e) {
        var colHeight = $(this).height(),
            coltxtHeight = $(this).find('.col__box-inf').height(),
            topMarginHeight = (colHeight - coltxtHeight - 73);
        $(this).find('.bg-img__box-inf').css("top", topMarginHeight);
        $(this).find('.bg-img__box-inf-in').css("top", -topMarginHeight);
    });

    $(window).resize(function () {
        $('.main-category__items .col').each(function (e) {
            var colHeight = $(this).height(),
                coltxtHeight = $(this).find('.col__box-inf').height(),
                topMarginHeight = (colHeight - coltxtHeight - 73);
            $(this).find('.bg-img__box-inf').css("top", topMarginHeight);
            $(this).find('.bg-img__box-inf-in').css("top", -topMarginHeight);
        });
    });

    /*  $('.main-category__items .col').each(function(e) {
     var bg_ = 'url(' + $(this).find('img').attr('src') + ')';
     $(this).find('.col__box-inf').css('background-image', bg_);
     }); */

    $('.article-list__col').each(function (e) {
        var bg_ = 'url(' + $(this).find('img').attr('src') + ')';
        $(this).css('background-image', bg_);
    });

    $('.header__top-bg-box').each(function (e) {
        var bg_ = 'url(' + $(this).find('img').attr('src') + ')';
        $(this).css('background-image', bg_);
    });

    $('.blog-post__baner').each(function (e) {
        var bg_ = 'url(' + $(this).find('img').attr('src') + ')';
        $(this).css('background-image', bg_);
    });

    $('.about-us').each(function (e) {
        var bg_ = 'url(' + $(this).find('.about-us__images img').attr('src') + ')';
        $(this).find('.about-us__images-sm').css('background-image', bg_);
    });


    $('.faq-page__open').on("click", function () {
        $(this).toggleClass('active');
        $(".faq-page__scroll-menu, .faq-page__left-title span").slideToggle("slow");

    });


    $('.product__slider-big .item').each(function (e) {
        var bg_ = 'url(' + $(this).find('img').attr('src') + ')';
        $(this).css('background-image', bg_);
    });


    $('.main-category__items .col').each(function (e) {
        var btn_click = $(this).find('.col__box-inf');
        var wrapimg = $(this).find('.bg-img__box-inf');
        var wrapimg2 = $(this).find('.bg-img');
        $(this).find('.col__btn-ico.ico-02').on("click", function () {
            $('.col__box-inf.active').removeClass('active');
            $(btn_click).addClass('active');
            $('.bg-img__box-inf.active').removeClass('active');
            $(wrapimg).addClass('active');
            $('.bg-img.active').removeClass('active');
            $(wrapimg2).addClass('active');
            //  $(btn_click).toggleClass('active');
            //  $(wrapimg).toggleClass('active');
            // $(wrapimg2).toggleClass('active');
        });
    });

    $('.main-category__items .col__box-inf .col__btn-ico.ico-02').on("click", function () {
        $('.col__box-inf').removeClass('active');
        $('.bg-img__box-inf').removeClass('active');
        $('.bg-img').removeClass('active');
    });


    $('.shop__item').each(function (e) {
        var wrap_shop = $(this);
        $(this).find('.shop__info').on("click", function () {
            $(wrap_shop).toggleClass('active');
        });
    });

    $('.big-first-letter').each(function (e) {
        var big_first_letter = $(this);
        $(this).find('.btn-04').on("click", function () {
            $(this).toggleClass('active');
            $(big_first_letter).toggleClass('active');
            $(".btn-04").text(function (i, text) {
                return text === "РАЗВЕРНУТЬ" ? "СВЕРНУТЬ" : "РАЗВЕРНУТЬ";
            })
        });
    });


    $('.header__search-form i.header__search-icon').on("click", function () {
        $('.header__search-form').addClass('active');
        $(".header__search-form .txt-s").toggle("slide");
    });

    $('.header__nav-icons').on("click", 'i.header__cart-icon', function () {
        $(".header__box-add-cart").fadeToggle();
    });

    $('.header__nav-icons .avatar').on("click", function () {
        $(".header__user-settings").fadeToggle();
    });


    $('.input-number__minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.input-number__plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });


    $('.cart__update-check').click(function () {
        var $cart_update = $(".cart__update-check");
        $cart_update.toggleClass("active");
    });

    $('.product__description .bottom-inf.row .shop__swich li:first-child').click(function () {
        $('.product__description .bottom-inf.row .shop__swich').toggleClass("active");
    });


    $('.basic').fancySelect();


    $(window).scroll(function () {
        var how_much = $(window).scrollTop(),
            top_height = $('.header__bg').height() - (265 + $('.header__nav').height()),
            //top_height_logo = $('.header__bg').height() - 655,
            top_height_login = $('.header__bg').height() - 15;
        var icon_mob_menu = $('.header__bg').height();
        how_much > top_height ? $('.header__nav').addClass('sticked-fix')
            : $('.header__nav').removeClass('sticked-fix');
        how_much > top_height_login ? $('nav .login').addClass('sticked-fix')
            : $('nav .login').removeClass('sticked-fix');
        how_much > icon_mob_menu ? $('nav .login').addClass('sticked-fix')
            : $('.mob-menu__icon').removeClass('sticked-fix');
        /*how_much > top_height_logo ? $('.header__big-logo').addClass('sticked-fix')
            : $('.header__big-logo').removeClass('sticked-fix');*/

        //
        var logo = $('.header__big-logo');
        if( how_much > ($(window).height() -  (logo.height() + parseInt(logo.css('top')))) )
            logo.addClass('sticked-fix');
        else
            logo.removeClass('sticked-fix');
    });

    $(".header__nav").sticky({topSpacing: 0});

    $("nav#menu").mmenu({
        "extensions": [
            "pagedim-black",
            "theme-dark"
        ],
        "navbars": [
            {
                "position": "top",
                "content": [
                    "searchfield"
                ]
            },
            {
                "position": "bottom",
                "content": [
                    "",
                ]
            }
        ]
    });

    $(".mob__user-inf").appendTo(".mm-navbar-bottom");


    $("#wizard").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft"
    });

    var filterContainer = $('.filtr-container');
    if (filterContainer.length) {
        filterContainer.filterizr();

        filterContainer.on('click', '.shop__card', function() {
            var name = $(this).attr('data-name');
            var item = $(this).attr('data-item');
            $.post('/cart-item', {
                name: name,
                item: item,
                change: 1
            }, function(html) {
                $('#smallCart').html(html);
            });
        });

    }

    $('.simplefilter li a').click(function () {
        $('.simplefilter li a').removeClass('active');
        $(this).addClass('active');
    });


});


(function ($) {

    $(document).on('click', '.groups a', function (e) {
        e.preventDefault();

        var $this = $(this),
            id = $this.data('id');

        $('.groups-data .active').removeClass('active');
        $('.groups .active').removeClass('active');

        //$(this).addClass('active');
        $('.groups [data-id="' + id + '"]').addClass('active');
        $('#group-' + id).addClass('active');
    });

})(jQuery);

(function ($) {

    $(document).on('click', '.groups2 a', function (e) {
        e.preventDefault();

        var $this = $(this),
            id = $this.data('id');

        $('.groups-data2 .active').removeClass('active');
        $('.groups2 .active').removeClass('active');

        $(this).addClass('active');
        $('#group-' + id).addClass('active');
    });

})(jQuery);

(function ($) {

    $(document).on('click', '.groups3 a', function (e) {
        e.preventDefault();

        var $this = $(this),
            id = $this.data('id');

        $('.groups-data3 .active').removeClass('active');
        $('.groups3 .active').removeClass('active');

        $(this).addClass('active');
        $('#group-' + id).addClass('active');
    });

})(jQuery);
