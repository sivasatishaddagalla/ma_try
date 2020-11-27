/*
Theme Name: Boomerang - Multipurpose Template
Theme URI: https://wrapbootstrap.com/theme/tribus-multipurpose-template-WB0367H15
Author: Webpixels
Author URI: http://www.webpixels.io
License URI: http://wrapbootstrap.com
*/

// Growl notifications
function notify(title, message, type) {
    $.growl({
        icon: '',
        title: title,
        message: message,
        url: ''
    }, {
        element: 'body',
        type: type,
        allow_dismiss: true,
        placement: {
            from: 'bottom',
            align: 'center'
        },
        offset: {
            x: 20,
            y: 85
        },
        spacing: 10,
        z_index: 1031,
        delay: 2500,
        timer: 3000,
        url_target: '_blank',
        mouse_over: false,
        animate: {
            enter: '',
            exit: ''
        },
        icon_type: 'class',
        template: '<div data-growl="container" class="alert" role="alert">' +
            '<button type="button" class="close" data-growl="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '<span class="sr-only">Close</span>' +
            '</button>' +
            '<span data-growl="icon"></span>' +
            '<span data-growl="title"></span>' +
            '<span data-growl="message"></span>' +
            '<a href="#" data-growl="url"></a>' +
            '</div>'
    });
};

// Background image holder with fullscreen option
$(window).on('load resize', function() {




    // Make the navbar sticky to top when offset is reached
    ScrollPosStyler.init({
        'scrollOffsetY': $('.navbar').offset().top
    });

    // WPX Slider - Background image holder
    if ($('.background-image-holder').length) {
        $('.background-image-holder').each(function() {

            var $this = $(this);
            var holderHeight;

            if ($this.data('holder-type') == 'fullscreen') {
                if ($this.attr('data-holder-offset')) {
                    if ($this.data('holder-offset')) {
                        var offsetHeight = $('body').find($this.data('holder-offset')).height();
                        holderHeight = $(window).height() - offsetHeight;
                    }
                } else {
                    holderHeight = $(window).height();
                }
                if ($(window).width() > 991) {
                    $('.background-image-holder').css({
                        'height': holderHeight + 'px'
                    });
                } else {
                    $('.background-image-holder').css({
                        'height': 'auto'
                    });
                }

            }
        })
    }

    // Dynamic height taken from data attr
    if ($(".same-height").length > 0) {
        $(".same-height").each(function(index, element) {

            var $this = $(this);
            var container = $this.data("same-height");

            setTimeout(function() {
                var height = $("body").find(container).height();

                if ($(window).width() > 991) {
                    // Set height
                    $this.css({
                        "height": height + "px"
                    });
                } else {
                    // Set height
                    $this.css({
                        "height": "auto"
                    });
                }
            }, 300);

        });
    }
    load_swiper();
});

function load_swiper(){    
    // Swiper
    if ($(".swiper-js-container").length > 0) {
        $('.swiper-js-container').each(function(i, swiperContainer) {

            var $swiperContainer = $(swiperContainer);
            var $swiper = $swiperContainer.find('.swiper-container');

            var swiperEffect = $swiper.data('swiper-effect');

            var slidesPerViewXs = $swiper.data('swiper-xs-items');
            var slidesPerViewSm = $swiper.data('swiper-sm-items');
            var slidesPerViewMd = $swiper.data('swiper-md-items');
            var slidesPerViewLg = $swiper.data('swiper-items');
            var spaceBetweenSlidesXs = $swiper.data('swiper-xs-space-between');
            var spaceBetweenSlidesSm = $swiper.data('swiper-sm-space-between');
            var spaceBetweenSlidesMd = $swiper.data('swiper-md-space-between');
            var spaceBetweenSlidesLg = $swiper.data('swiper-space-between');


            // Slides per view written in data attributes for adaptive resoutions
            slidesPerViewXs = !slidesPerViewXs ? 1 : slidesPerViewXs;
            slidesPerViewSm = !slidesPerViewSm ? 1 : slidesPerViewSm;
            slidesPerViewMd = !slidesPerViewMd ? 1 : slidesPerViewMd;
            slidesPerViewLg = !slidesPerViewLg ? 1 : slidesPerViewLg;

            // Space between slides written in data attributes for adaptive resoutions
            spaceBetweenSlidesXs = !spaceBetweenSlidesXs ? 0 : spaceBetweenSlidesXs;
            spaceBetweenSlidesSm = !spaceBetweenSlidesSm ? 0 : spaceBetweenSlidesSm;
            spaceBetweenSlidesMd = !spaceBetweenSlidesMd ? 0 : spaceBetweenSlidesMd;
            spaceBetweenSlidesLg = !spaceBetweenSlidesLg ? 0 : spaceBetweenSlidesLg;


            var animEndEv = 'webkitAnimationEnd animationend';

            var $swiper = new Swiper($swiper, {
                pagination: $swiperContainer.find('.swiper-pagination'),
                nextButton: $swiperContainer.find('.swiper-button-next'),
                prevButton: $swiperContainer.find('.swiper-button-prev'),
                slidesPerView: slidesPerViewLg,
                spaceBetween: spaceBetweenSlidesLg,
                autoplay: $swiper.data('swiper-autoplay'),
                effect: swiperEffect,
                speed: 800,
                paginationClickable: true,
                direction: 'horizontal',
                preventClicks: true,
                preventClicksPropagation: true,
                observer: true,
                observeParents: true,
                breakpoints: {
                    460: {
                        slidesPerView: slidesPerViewXs,
                        spaceBetweenSlides: spaceBetweenSlidesXs
                    },
                    767: {
                        slidesPerView: slidesPerViewSm,
                        spaceBetweenSlides: spaceBetweenSlidesSm
                    },
                    991: {
                        slidesPerView: slidesPerViewMd,
                        spaceBetweenSlides: spaceBetweenSlidesMd
                    },
                    1100: {
                        slidesPerView: slidesPerViewLg,
                        spaceBetweenSlides: spaceBetweenSlidesLg
                    }
                },
                onInit: function(s) {

                    var currentSlide = $(s.slides[s.activeIndex]);
                    var elems = currentSlide.find(".animated");

                    elems.each(function() {
                        var $this = $(this);

                        if (!$this.hasClass('animation-ended')) {
                            var animationInType = $this.data('animation-in');
                            var animationOutType = $this.data('animation-out');
                            var animationDelay = $this.data('animation-delay');

                            setTimeout(function() {
                                $this.addClass('animation-ended ' + animationInType, 100).on(animEndEv, function() {
                                    $this.removeClass(animationInType);
                                });
                            }, animationDelay);
                        }
                    });
                },
                onSlideChangeStart: function(s) {

                    var currentSlide = $(s.slides[s.activeIndex]);
                    var elems = currentSlide.find(".animated");

                    elems.each(function() {
                        var $this = $(this);

                        if (!$this.hasClass('animation-ended')) {
                            var animationInType = $this.data('animation-in');
                            var animationOutType = $this.data('animation-out');
                            var animationDelay = $this.data('animation-delay');

                            setTimeout(function() {
                                $this.addClass('animation-ended ' + animationInType, 100).on(animEndEv, function() {
                                    $this.removeClass(animationInType);
                                });
                            }, animationDelay);
                        }
                    });
                },
                onSlideChangeEnd: function(s) {

                    var previousSlide = $(s.slides[s.previousIndex]);
                    var elems = previousSlide.find(".animated");

                    elems.each(function() {
                        var $this = $(this);
                        var animationOneTime = $this.data('animation-onetime');

                        if (!animationOneTime || animationOneTime == false) {
                            $this.removeClass('animation-ended');
                        }
                    });
                }
            });
        });
    }
}


// On document ready functions
$(document).ready(function() {

    // Bootstrap - Submenu event for small resolutions

    $('.dropdown-menu .dropdown-submenu [data-toggle="dropdown"]').on('click', function(e) {
        if ($(window).width() < 992) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');


            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass("show");
            });

            return false;
        }
    });

    // Fix the closing problem when clicking inside dopdown menu
    $('.navbar .dropdown-menu').on('click', function(event) {
        event.stopPropagation();
    });

    // One page nav
    $('.navbar-onepage .nav-link').on('click', function(e) {
        var $anchor = $(this);

        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');

        e.preventDefault();
    });

    // Hamburger
    if ($('.hamburger-js')[0]) {
        $(".hamburger-js").each(function() {
            var $this = $(this);

            $this.on("click", function(e) {
                $this.toggleClass("is-active");
                // Do something else, like open/close menu
            });
        });

    }

    // $('a[href="#"]').on('click tap', function(e) {
    //     e.preventDefault();
    // });

    // Footer reveal
    if ($('[data-toggle="footer-reveal"]').length) {
        $('[data-toggle="footer-reveal"]').footerReveal({
            shadow: false,
            //zIndex: -101
        });
    }

    // Bootstrap selected
    // $('.selectpicker').each(function(index, element) {
    //     $('.selectpicker').selectpicker({
    //         style: $(this).data('select-style'),
    //         size: $(this).data('select-size'),
    //         liveSearch: $(this).data('select-live-search'),
    //         mobile: $(this).data('select-mobile')
    //     });
    // });

    // Datepicker
    if ($('.datepicker')[0]) {
        $('.datepicker').each(function() {
            var $this = $(this);

            $($this).flatpickr({
                inline: $this.data('datepicker-inline') ? $this.data('datepicker-inline') : false,
                static: true,
                nextArrow: '<i class="ion-ios-arrow-right" />',
                prevArrow: '<i class="ion-ios-arrow-left" />'
            });
        })

    }

    // Input mask
    if ($('.input-mask')[0]) {
        $('.input-mask').mask();
    }

    // NoUI Slider
    if ($(".input-slider-container")[0]) {
        $('.input-slider-container').each(function() {

            var slider = $(this).find('.input-slider');
            var sliderId = slider.attr('id');
            var minValue = slider.data('range-value-min');
            var maxValue = slider.data('range-value-max');

            var sliderValue = $(this).find('.range-slider-value');
            var sliderValueId = sliderValue.attr('id');
            var startValue = sliderValue.data('range-value-low');

            var c = document.getElementById(sliderId),
                d = document.getElementById(sliderValueId);

            noUiSlider.create(c, {
                start: [parseInt(startValue)],
                //step: 1000,
                range: {
                    'min': [parseInt(minValue)],
                    'max': [parseInt(maxValue)]
                }
            });

            c.noUiSlider.on('update', function(a, b) {
                //alert(b)
                d.textContent = a[b];
            });
        })

    }



    if ($("#input-slider-range")[0]) {
        var c = document.getElementById("input-slider-range"),
            d = document.getElementById("input-slider-range-value-low"),
            e = document.getElementById("input-slider-range-value-high"),
            f = [d, e];

        noUiSlider.create(c, {
            start: [parseInt(d.getAttribute('data-range-value-low')), parseInt(e.getAttribute('data-range-value-high'))],
            connect: !0,
            range: {
                min: parseInt(c.getAttribute('data-range-value-min')),
                max: parseInt(c.getAttribute('data-range-value-max'))
            }
        }), c.noUiSlider.on("update", function(a, b) {
            f[b].textContent = a[b];
        }), c.noUiSlider.on("change", function(a, b) {
            $('.min_height').val(a[0]);
            $('.max_height').val(a[1]);
        })
    }

    // Bootstrap Carousels
    $('.carousel').carousel({
        interval: 5000,
        pause: 'hover'
    });

    // Smooth scroll
    $('.scroll-me').on('click', function(event) {
        // Animate scroll to the selected section
        $('html, body').stop(true, true).animate({
            scrollTop: $(this.hash).offset().top
        }, 600);

        event.preventDefault();
    });

    $('[data-scroll-to]').on('click', function(event) {
        var hash = $(this).data('scroll-to');

        // Animate scroll to the selected section
        $('html, body').stop(true, true).animate({
            scrollTop: $(hash).offset().top
        }, 600);

        event.preventDefault();
    });

    // To top
    var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.back-to-top');

    //hide or show the "back to top" link
    $(window).scroll(function() {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('back-to-top-is-visible'): $back_to_top.removeClass('back-to-top-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('back-to-top-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function(event) {
        event.preventDefault();
        $('body, html').animate({
            scrollTop: 0,
        }, scroll_top_duration);
    });

    // Light gallery
    if ($('[data-toggle="light-gallery"]').length > 0) {
        $('[data-toggle="light-gallery"]').lightGallery({
            selector: 'this'
        });
    }

    if ($('.light-gallery').length > 0) {
        $('.light-gallery').each(function() {
            var $this = $(this);

            $this.lightGallery({
                selector: '.item',
                thumbnail: true
            });
        });
    }


    // Isotope
    // for each container
    $('.masonry-container').each(function(i, masonryContainer) {
        var $masonryContainer = $(masonryContainer);

        // init isotope for container
        var $masonry = $masonryContainer.find('.masonry').imagesLoaded(function() {

            // Set default filter if exists
            var filterMenuItems = $masonryContainer.find('.masonry-filter-menu');
            var defaultFilterButton = filterMenuItems.find('.default');
            var defaultFilterValue = defaultFilterButton.data('filter');

            if (defaultFilterValue != undefined && defaultFilterValue != '') {

                if (defaultFilterValue != '*') {
                    defaultFilterValue = '.' + defaultFilterValue;
                }

                defaultFilterButton.addClass('active');
            }


            $masonry.isotope({
                itemSelector: '.masonry-item',
                filter: defaultFilterValue
            })
        });
        // init filters for container
        $masonryContainer.find('.masonry-filter-menu').on('click', 'a', function() {
            var filterValue = $(this).attr('data-filter');

            if (filterValue == '*') {
                filterValue = '';
            } else {
                filterValue = '.' + filterValue;
            }

            $masonry.isotope({
                filter: filterValue
            });
        });
    });

    $('.masonry-filter-menu').each(function(i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'a', function() {
            $buttonGroup.find('.active').removeClass('active');
            $(this).addClass('active');
        });
    });

    // Swiper
    var productSwiper;
    if ($(".product-swiper-container").length > 0) {
        $(".product-swiper-container").each(function(index, element) {
            $(this).addClass('s-' + index);
            $(this).find('.swiper-pagination').addClass('sp-' + index);

            productSwiper = $('.s-' + index).swiper({
                speed: 400,
                loop: true,
                grabCursor: true,
                pagination: '.sp-' + index,
                paginationClickable: true,
                centeredSlides: false,
                preloadImages: false,
                lazyLoading: true,
                observer: true,
                observerParents: true

            });
        });
    }


    if ($(".swiper-container-centered").length > 0) {
        $(".swiper-container-centered").each(function() {
            var swiper = new Swiper('.swiper-container-centered', {
                pagination: '.swiper-pagination',
                slidesPerView: 'auto',
                centeredSlides: true,
                paginationClickable: true,
                spaceBetween: 30,
                initialSlide: 1,
                breakpoints: {
                    // when window width is <= 320px
                    768: {
                        slidesPerView: 1,
                        spaceBetweenSlides: 0
                    },
                    // when window width is <= 480px
                    991: {
                        slidesPerView: 2,
                        spaceBetweenSlides: 0
                    }
                }
            });
        });
    }

    // Swiper gallery
    if ($(".swiper-gallery").length > 0) {
        $(".swiper-gallery").each(function() {
            var galleryTop = new Swiper('.gallery-top', {
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                spaceBetween: 10,
            });
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 10,
                centeredSlides: false,
                slidesPerView: 'auto',
                touchRatio: 0.2,
                slideToClickedSlide: true
            });
            galleryTop.params.control = galleryThumbs;
            galleryThumbs.params.control = galleryTop;
        });
    }
    // Parallax
    if ($(".paraxify").length > 0) {
        var myParaxify = paraxify('.paraxify', {
            speed: 1,
            boost: 1
        });
    }

    // Viewport animations
    $('.milestone-count').viewportChecker({
        callbackFunction: function(elem, action) {
            setTimeout(function() {
                $('.milestone-count').countTo({
                    formatter: function(value, options) {
                        return value.toFixed(options.decimals);
                    },
                    onUpdate: function(value) {
                        console.debug(this);
                    },
                    onComplete: function(value) {
                        console.debug(this);
                    }
                });
            }, 500);
        }
    });

    // Typed JS
    if ($('.type-this').length > 0) {
        $('.type-this').each(function() {

            var element = $(this).attr('id');
            var strings = $(this).data('type-this');

            strings = strings.split(',');

            var typed = new Typed('#' + element, {
                strings: strings,
                typeSpeed: 100,
                backSpeed: 70,
                loop: true
            });
        })
    }

    if ($('.countdown').length > 0) {
        $('.countdown').each(function() {
            var $this = $(this);
            var date = $this.data('countdown-date');

            $this.countdown(date).on('update.countdown', function(event) {
                var $this = $(this).html(event.strftime('' +
                    '<div class="countdown-item"><span class="countdown-digit">%-D</span><span class="countdown-label countdown-days">day%!d</span></div>' +
                    '<div class="countdown-item"><span class="countdown-digit">%H</span><span class="countdown-separator">:</span><span class="countdown-label">hr</span></div>' +
                    '<div class="countdown-item"><span class="countdown-digit">%M</span><span class="countdown-separator">:</span><span class="countdown-label">min</span></div>' +
                    '<div class="countdown-item"><span class="countdown-digit">%S</span><span class="countdown-label">sec</span></div>'
                ));
            });
        });
    }

    // Optional filters
    $("#btnToggleOptionalFilters").click(function() {
        var animateIn = $(this).data("animate-in");
        var animateOut = $(this).data("animate-out");

        if ($(this).hasClass("opened")) {
            $(".hidden-form-filters").addClass('hide');
            $(this).removeClass("opened");
        } else {
            $(this).addClass("opened");
            $(".hidden-form-filters").removeClass("hide");
        }
        return false;
    });

    // Rating Stars
    var star = $(".rating span.star");

    star.hover(
        function() {
            $(this).addClass("over");
            $(this).prevAll().addClass("over");
        },
        function() {
            $(this).removeClass("over");
            $(this).prevAll().removeClass("over");
        }
    );
    star.click(function() {
        $(this).parent().children(".star").removeClass("voted");
        $(this).prevAll().addClass("voted");
        $(this).addClass("voted");
    });

    // Tooltip & Popover
    $('[data-toggle="tooltip"]').tooltip({
        placement: $(this).data('placement'),
        html: true
    });

    $('[data-toggle="popover"]').popover({
        placement: $(this).data('placement'),
        html: true
    });

    // Global search
    $('[data-toggle="global-search"]').click(function() {

        var target = $('.global-search');
        var delay = 0;

        if (!target.hasClass('in')) {

            if (!target.hasClass('global-search-fullscreen') && !target.hasClass('global-search-overlay')) {
                $('.navbar').addClass('global-search-active');

                delay = 200;
            } else if (target.hasClass('global-search-overlay')) {
                $('.navbar').addClass('hide');
            }

            setTimeout(function() {
                target.addClass('in');
            }, delay);

            setTimeout(function() {
                target.addClass('animated fadeIn');
                target.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                    target.removeClass("fadeIn");
                });
            }, delay * 2.5);
        } else {
            target.addClass('fadeOut');
            target.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {

                target.removeClass("animated fadeOut");
                target.removeClass('in');

                setTimeout(function() {
                    $('.navbar').removeClass('global-search-active hide');
                }, delay);
            });
        }
    });

    // Morphext - Text rotators
    if ($(".morphext").length > 0) {
        $(".morphext").Morphext({
            // The [in] animation type. Refer to Animate.css for a list of available animations.
            animation: 'fadeIn',
            // An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
            separator: ";",
            // The delay between the changing of each phrase in milliseconds.
            speed: '3000',
            complete: function() {
                //alert($(this).data('animation'))
            }
        });
    }

    // Collapse
    // $('.collapse-wrapper .panel').on('shown.bs.collapse', function() {
    //     $(this).addClass('open');
    // });
    //
    // $('.collapse-wrapper .panel').on('hidden.bs.collapse', function() {
    //     $(this).removeClass('open');
    // });

    // WOW animation
    if ($('.has-wow-animation').length > 0) {
        wow = new WOW({
            boxClass: 'has-wow-animation',
            animateClass: 'animated',
            offset: 0,
            mobile: true,
            live: true
        });
        wow.init();
    }

    // Collapse component settings
    $('.accordion--style-1 .collapse, .accordion--style-2 .collapse').on('show.bs.collapse', function() {

        $(this).parent().find(".fa-chevron-right").removeClass("fa-chevron-right").addClass("fa-chevron-down");
    }).on('hide.bs.collapse', function() {
        $(this).parent().find(".fa-chevron-down").removeClass("fa-chevron-down").addClass("fa-chevron-right");
    });

    //// SHOP functionalities
    // Plus - Minus control
    $('.spinner .btn:first-of-type').on('click', function() {
        $('.spinner input').val(parseInt($('.spinner input').val(), 10) + 1);
    });

    $('.spinner .btn:last-of-type').on('click', function() {
        $('.spinner input').val(parseInt($('.spinner input').val(), 10) - 1);
    });

    // Grid-List view for shop
    $('#list').click(function(event) {
        event.preventDefault();
        $('#products .grid-list-item').addClass('list-group-item');
    });

    $('#grid').click(function(event) {
        event.preventDefault();
        $('#products .grid-list-item').removeClass('list-group-item');
        $('#products .grid-list-item').addClass('grid-group-item');
    });

    // Product actions
    $('.shop-default-wrapper .product').on('mouseenter', function() {
        if ($(this).find('.product-actions').length > 0 && !$(this).find('.product-actions').hasClass('in')) {
            var productActions = $(this).find('.product-actions');

            productActions.addClass('in animated flipInY');
            productActions.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                productActions.removeClass('animated flipInY');
            });
        }
    });

    $('.shop-default-wrapper .product').on('mouseleave', function() {
        if ($(this).find('.product-actions').length > 0 && $(this).find('.product-actions').hasClass('in')) {
            var productActions = $(this).find('.product-actions');

            productActions.addClass('animated flipOutY');
            productActions.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                productActions.removeClass('in animated flipOutY');
            });
        }
    });

    // Advanced search
    $('#btn_advanced_search_open').click(function() {
        if (!$('.advanced-search-hidden').hasClass("in")) {
            $('.advanced-search-hidden').addClass("in");

        } else {
            $('.advanced-search-hidden').removeClass("in");
        }
        return false;
    })

    // Instafeed with Spectagram
    if ($('.instafeed').length > 0) {
        $('.instafeed').each(function() {
            var $this = $(this);
            var target = $this.attr('id');
            var userId = $this.data('user-id');
            var limit = $this.data('limit');
            var col = $this.data('col');
            var template;


            // Fill with the data from Instagram API
            var clientID = '621db321bd8a4e9094700ee941094e30';
            var accessToken = '230806458.621db32.a91fb06322164fc69f9ae4511f287a51';

            var instafeed = new Instafeed({
                target: target,
                clientId: clientID,
                accessToken: accessToken,
                get: 'user',
                userId: userId,
                limit: limit,
                resolution: 'standard_resolution',
                template: '<div class="col-sm-' + col + ' col-xs-6"><a href="{{link}}"><img src="{{image}}" class="img-fluid" /></a></div>'
            });
            instafeed.run();
        });
    }

    if ($('#form_contact').length > 0) {
        $('#form_contact').on('submit', function(e) {
            $this = $(this);

            if (e.isDefaultPrevented()) {
                // handle the invalid form...
            } else {
                var formData = $this.serialize();

                var subscribeRequest = $.ajax({
                    type: "POST",
                    url: 'php/send-email.php',
                    data: formData,
                    dataType: 'json'
                });

                subscribeRequest.done(function(data, msg) {

                    var status = data['status'];

                    var notifyTitle = data['notify_title'];
                    var notifyMessage = data['notify_message'];
                    var notifyType = data['notify_type'];

                    // Create notification
                    notify(notifyTitle, notifyMessage, notifyType);

                    if (status == 'success') {

                        // Clear form
                        $this.find('.btn-reset').trigger('click');
                        $this.find('.glyphicon-ok').removeClass('glyphicon-ok');
                        grecaptcha.reset();
                    }

                });

                subscribeRequest.fail(function(data, textStatus) {

                });

                return false;
            }
        });
    }

    // Gradentify
    if ($('.gradientify').length) {
        $('.gradientify').each(function() {

            var $this = $(this);
            // var jsonObj = [];
            // var gradients = $this.data('gradient-colors');
            // gradients = gradients.split(';');
            //
            // $.each(gradients, function( key, value ) {
            //     jsonObj.push(value);
            // });

            // console.log(jsonObj);

            $this.gradientify({
                gradients: [{
                        start: [17, 132, 254],
                        stop: [154, 70, 248]
                    },
                    {
                        start: [154, 70, 248],
                        stop: [17, 132, 254]
                    }
                ],
                angle: '0deg',
                fps: 60,
                transition_time: 10
            });
        });

    }

}); // END document ready
