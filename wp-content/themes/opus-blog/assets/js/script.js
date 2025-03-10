(function ($) {
    "use strict";
    //Js code for search box

    $(".first_click").on("click", function () {
        $(".search-wrapper").addClass("search_box");
        $(".search-box-text").addClass("SlideUpIn");
        $(".search-box-text").removeClass("SlideDownOut");
    });
    $(".second_click").on("click", function () {
        $(".search-wrapper").removeClass("search_box");
        $(".search-box-text").removeClass("SlideUpIn");
        $(".search-box-text").addClass("SlideDownOut");
    });

    
    /* ========== Menu icon color ========== */
    $('.main-menu-icon').css('color', function () {
        var iconColorAttr = $(this).data('fa-color');
        return iconColorAttr;
    });

    /* ========== Horizontal navigation menu ========== */
    if ($('.main-header').length) {
        var mainHeader = $('.main-header'),
            mainHeaderHeight = mainHeader.height(),
            barMenu = mainHeader.find('.bar-menu'),
            mainMenuListWrapper = $('.main-menu > ul'),
            mainMenuListDropdown = $('.main-menu ul li:has(ul)');

        /* ========== Dropdown Menu Toggle ========== */
        barMenu.on("click", function () {
            $(this).toggleClass('menu-open');
            mainMenuListWrapper.slideToggle(300);
        });

        mainMenuListDropdown.each(function () {
            $(this).append('<span class="dropdown-plus"></span>');
            $(this).addClass('dropdown_menu');
        });

        $('.dropdown-plus').on("click", function () {
            $(this).prev('ul').slideToggle(300);
            $(this).toggleClass('dropdown-open');
        });

        $('.dropdown_menu a').append('<span></span>');

        /* ========== Sticky on scroll ========== */
        // $(window).on("scroll", function () {
        //     stickyNav();
        // }).scroll();
    }
        // -----------------hamburger-----------------
        var $menu_button = $('.menu-button');
        var $nav = $('.main-navigation');
        $menu_button.on('click', function() {
            $(this).toggleClass('clicked')
            $nav.toggleClass('nav_on')
        });
        $(".btnc").on("click", function () {
            $(".main-navigation").removeClass("nav_on");
            $(".menu-box").removeClass("clicked");
        });

        $('.menu-item-has-children .sub-menu').before('<span class="dropdown-toggle"><strong class="dropdown-icon"></strong></span>');
        $('.dropdown-toggle').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('toggle-on');
            $(this).next('.sub-menu').slideToggle();
        });
    
})(jQuery);