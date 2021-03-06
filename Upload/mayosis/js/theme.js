! function(c) {
    "use strict";
    var t, e;
    c(document).ready(function() {
        c(window).scroll(function() {
            50 < c(this).scrollTop() ? c("#back-to-top").fadeIn() : c("#back-to-top").fadeOut()
        }), c("#back-to-top").click(function() {
            return c("#back-to-top").tooltip("hide"), c("body,html").animate({
                scrollTop: 0
            }, 800), !1
        }), c("#back-to-top").tooltip("show")
    }), c("ul.dropdown-menu [data-toggle=dropdown]").on("click", function(e) {
        e.preventDefault(), e.stopPropagation(), c(this).parent().addClass("open"), c(this).parent().find("ul").parent().find("li.dropdown").addClass("open")
    }), c(document).ready(function() {
        c("#quote-carousel").carousel({
            pause: !0,
            interval: 4e3
        })
    }), (e = c('.edd_price_options input[type="radio"]')).click(function() {
        e.each(function() {
            c(this).closest(".edd_price_options ul li").toggleClass("item-selected active", this.checked).removeClass("active")
        })
    }), c(".statistic-counter").each(function() {
        c(this).prop("Counter", 0).animate({
            Counter: c(this).text()
        }, {
            duration: 5e3,
            easing: "swing",
            step: function(e) {
                c(this).text(Math.ceil(e))
            }
        })
    }), c("#menu-close").click(function(e) {
        e.preventDefault(), c("#sidebar-wrapper").toggleClass("active")
    }), c("#menu-toggle").click(function(e) {
        e.preventDefault(), c("#sidebar-wrapper").toggleClass("active")
    }), c(function() {
        c("input,textarea").focus(function() {
            c(this).data("placeholder", c(this).attr("placeholder")).attr("placeholder", "")
        }).blur(function() {
            c(this).attr("placeholder", c(this).data("placeholder"))
        })
    }), (t = jQuery)('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, "") === this.pathname.replace(/^\//, "") && location.hostname === this.hostname) {
            var e = t(this.hash);
            if ((e = e.length ? e : t("[name=" + this.hash.slice(1) + "]")).length) return t("html, body").animate({
                scrollTop: e.offset().top - 54
            }, 1e3, "easeInOutExpo"), !1
        }
    }), t(".js-scroll-trigger").click(function() {
        t(".navbar-collapse").collapse("hide")
    }), t("body").scrollspy({
        target: "#mainNav",
        offset: 54
    }), c(function() {
        c('[data-toggle="tooltip"]').tooltip(), c(".side-nav .collapse").on("hide.bs.collapse", function() {
            c(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down")
        }), c(".side-nav .collapse").on("show.bs.collapse", function() {
            c(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right")
        })
    });
    var a = ".parallax-container video";

    function i(e) {
        var t = c(e);
        t.attr("style", "");
        var a = t.width(),
            i = t.height(),
            o = t.closest(".parallax-container-inner").width(),
            n = a / o,
            s = i / t.closest(".parallax-container-inner").height(),
            l = a / Math.min(n, s),
            r = -Math.abs((l - o) / 2);
        t.attr("style", "height: auto !important; width: " + l + "px !important; left: " + r + "px !important; top: 0px !important;")
    }
    c(window).resize(function() {
        c(a).each(function() {
            i(c(this))
        }), c("iframe.vimeo-player-section").each(function() {
            var e, t = c(this),
                a = t.parent().width(),
                i = t.parent().height();
            if (t.data("vimeo-ratio") ? e = t.attr("data-vimeo-ratio") : (e = t.data("height") / t.data("width"), t.attr("data-vimeo-ratio", e)), t.removeAttr("height width"), i <= a * e) t.height(a * e).width("100%").css("margin-top", -(a * e - i) / 2).css("margin-left", 0);
            else {
                var o = -(i / e - a) / 2;
                t.height(i).width(i / e).css("margin-left", o).css("margin-top", 0)
            }
        }), c.getScript("//f.vimeocdn.com/js/froogaloop2.min.js", function() {
            c("iframe.vimeo-player-section").each(function() {
                var e = c(this);
                e.attr("src", e.attr("src"));
                var t = $f(this);
                t.addEvent("ready", function() {
                    t.api("setVolume", 0), t.api("play")
                })
            })
        }), c(window).on("statechangecomplete", function() {
            c("iframe.vimeo-player-section").each(function() {
                var e = $f(this);
                e.addEvent("ready", function() {
                    e.api("setVolume", 0), e.api("play")
                })
            })
        })
    });
    c(".paratrue iframe").each(function() {
        11 == ie && 1e3 < parseInt(c(this).parent().height()) && c(this).closest(".parallax-container").removeClass("paratrue")
    });
    var o, n;
    c(window).resize(function() {
        c(".no-touch .has-anim .owl-carousel").each(function() {
            $this = c(this), $this.closest(".has-anim").addClass("notransition")
        }), setTimeout(function() {
            c(".no-touch .has-anim .owl-carousel").closest(".has-anim").removeClass("notransition")
        }, 300)
    }), (o = jQuery)(document).ready(function() {
        o("#mayosis-sidemenu li.has-sub>a").on("click", function() {
            o(this).removeAttr("href");
            var e = o(this).parent("li");
            e.hasClass("open") ? (e.removeClass("open"), e.find("li").removeClass("open"), e.find("ul").slideUp()) : (e.addClass("open"), e.children("ul").slideDown(), e.siblings("li").children("ul").slideUp(), e.siblings("li").removeClass("open"), e.siblings("li").find("li").removeClass("open"), e.siblings("li").find("ul").slideUp())
        }), o("#mayosis-sidemenu>ul>li.has-sub>a").append('<span class="holder"></span>')
    }), c(function() {
        c('a[href="#searchoverlay"]').on("click", function(e) {
            e.preventDefault(), c("#searchoverlay").addClass("open"), c('#searchoverlay > form > input[type="search"]').focus()
        }), c("#searchoverlay, #searchoverlay button.close").on("click keyup", function(e) {
            e.target != this && "close" != e.target.className && 27 != e.keyCode || c(this).removeClass("open")
        })
    }), c(document).ready(function() {
        c("#mayosis-sidebarCollapse").on("click", function() {
            c("#mayosis-sidebar").toggleClass("active")
        })
    }), (n = jQuery)(window).on("load", function() {
        0 < n(".load-mayosis").length && n(".load-mayosis").fadeOut("slow")
    }), c(window).scroll(function() {
        1 < c(this).scrollTop() ? c(".stickyenabled").addClass("fixedheader") : c(".stickyenabled").removeClass("fixedheader")
    }), c(".burger, .overlaymobile").click(function() {
        c(".burger").toggleClass("clicked"), c(".overlaymobile").toggleClass("show"), c(".mobile--nav-menu").toggleClass("show"), c("body").toggleClass("overflow")
    })
}(jQuery);
jQuery(document).ready(function($) {
    "use strict";
    var $grid = $('.justified-grid').isotope({
        itemSelector: '.justified-grid-item',
        layoutMode: 'fitRows',
    });
    var $buttonGroup = $('.filters');
    $buttonGroup.on('click', 'li', function(event) {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        var $button = $(event.currentTarget);
        $button.addClass('is-checked');
        var filterValue = $button.attr('data-filter');
        $grid.isotope({
            filter: filterValue
        })
    })
});
jQuery(document).ready(function($) {
    jQuery('.grid--filter--main span').click(function() {
        $('.active').not($(this)).removeClass('active');
        $(this).toggleClass('active')
    })
})
jQuery(document).ready(function($) {
    $('.humburger-ms').on('click', function() {
        $('#myNav').toggleClass('open')
    })
})
jQuery(document).ready(function($) {
    "use strict";
    var selectedClass = "";
    jQuery(".fil-cat").click(function() {
        selectedClass = $(this).attr("data-rel");
        $("#isotope-filter-recent").fadeTo(100, 0.1);
        $("#isotope-filter-recent .tile").not("." + selectedClass).fadeOut().removeClass('scale-anm');
        setTimeout(function() {
            $("." + selectedClass).fadeIn().addClass('scale-anm');
            $("#isotope-filter-recent").fadeTo(300, 1)
        }, 300)
    })
});
jQuery(document).ready(function($) {
    "use strict";
    var selectedClass = "";
    jQuery(".fil-cat").click(function() {
        selectedClass = $(this).attr("data-rel");
        $("#isotope-filter").fadeTo(100, 0.1);
        $("#isotope-filter .tile").not("." + selectedClass).fadeOut().removeClass('scale-anm');
        setTimeout(function() {
            $("." + selectedClass).fadeIn().addClass('scale-anm');
            $("#isotope-filter").fadeTo(300, 1)
        }, 300)
    })
});
jQuery(document).ready(function($) {
    $('.download_cat_filter select,.mayosis_vendor_cat select,.mayosis-filter-title .product_filter_mayosis,.vendor--search-filter--box select,.mayofilter-orderby,.mayosis-filters-select,.mayosis-filters-select-small').niceSelect();
    $('.multiselect,#edd_checkout_form_wrap select,.edd_form select').niceSelect('destroy')
});
jQuery(document).ready(function($) {
    var add = 20;
    add += $('.admin-bar').length ? 32 : 0;
    var width = $(window).width();
    $('.mayosis-floating-share').each(function() {
        var post_foot = $('.mayosis-floating-share').outerHeight(!0) + 50;
        $(this).css('height', $('.single-prime-layout').height() + (width > 1500 ? post_foot : 0) + 'px');
        $(this).theiaStickySidebar({
            minWidth: 768,
            updateSidebarHeight: !1,
            defaultPosition: 'absolute',
            additionalMarginTop: 150
        })
    })
});
jQuery(function($) {
    "use strict";
    if (!$('body').is('.download-template-prime-download-template, .single-post')) {
        return
    }
    var intersects = function(el1, el2) {
        var rect1 = el1.getBoundingClientRect();
        var rect2 = el2.getBoundingClientRect();
        return !(rect1.top > rect2.bottom || rect1.right < rect2.left || rect1.bottom < rect2.top || rect1.left > rect2.right)
    }
    var start_at = 0;
    if ($(window).width() < 768) {
        return !1
    }
    var intersect_sels = ['.bottom-post-footer-widget', '.main-footer', '.alignfull', ];
    var observe = [],
        share_ele = $('.mayosis-floating-share');
    $(intersect_sels.join(',')).each(function() {
        observe.push(this)
    });
    $(window).on('scroll', function() {
        var is_hidden = !1,
            ele = share_ele.find('.theiaStickySidebar').get(0);
        if ($(window).scrollTop() < start_at) {
            is_hidden = !0
        } else {
            for (var i in observe) {
                if (intersects(ele, observe[i])) {
                    is_hidden = !0;
                    break
                }
            }
        }(is_hidden ? share_ele.addClass('is-hidden') : share_ele.removeClass('is-hidden'))
    })
})
jQuery(document).ready(function($) {
    if (location.hash) {
        $('a[href=\'' + location.hash + '\']').tab('show')
    }
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('a[href="' + activeTab + '"]').tab('show')
    }
    $('body').on('click', 'a[data-toggle=\'tab\']', function(e) {
        e.preventDefault()
        var tab_name = this.getAttribute('href')
        if (history.pushState) {
            history.pushState(null, null, tab_name)
        } else {
            location.hash = tab_name
        }
        localStorage.setItem('activeTab', tab_name)
        $(this).tab('show');
        return !1
    });
    jQuery(window).on('popstate', function() {
        var anchor = location.hash || $('a[data-toggle=\'tab\']').first().attr('href');
        $('a[href=\'' + anchor + '\']').tab('show')
    })
})
jQuery(document).ready(function($) {
    var figure = $(".mayosis--video--box,.product-masonry-item-content,.product-justify-item-content").hover(hoverVideo, hideVideo);

    function hoverVideo(e) {
        $('video', this).get(0).play()
    }

    function hideVideo(e) {
        $('video', this).get(0).pause()
    }
    lity.handlers('video', function(target) {
        if (typeof target === 'string' && target.indexOf('.mp4') > 0) {
            var html = '<video style="max-width: 100%;" autoplay playsinline>';
            html += '<source src="' + target + '" type="video/mp4">';
            html += '</video>';
            return html
        }
        return !1
    })
});
jQuery(document).ready(function($) {
    const playersgrid = Plyr.setup('#mayosisplayergrid');
    const players = Plyr.setup('#mayosisplayer')
});
jQuery(document).ready(function($) {
    var $containerLarge = $('.gridbox');
    $(window).load(function() {
        $containerLarge.imagesLoaded(function() {
            $containerLarge.isotope({
                itemSelector: '.element-item',
                layoutMode: 'fitRows',
                transitionDuration: '0.8s'
            });
            setTimeout(function() {
                $containerLarge.isotope('layout')
            }, 500);
            $('.mayosis-filters-select').change(function() {
                $containerLarge.isotope({
                    filter: this.value
                })
            });
            $(window).on('resize', function() {
                $containerLarge.isotope('layout')
            });
            window.addEventListener("orientationchange", function() {
                $containerLarge.isotope('layout')
            }, !1)
        })
    })
});
jQuery(document).ready(function($) {
    var $containerTabbedfet = $('.mayosis_tabbed_grid_featured');
    $(window).load(function() {
        $containerTabbedfet.imagesLoaded(function() {
            $containerTabbedfet.isotope({
                itemSelector: '.element-item',
                layoutMode: 'fitRows',
                transitionDuration: '0.8s'
            });
            setTimeout(function() {
                $containerTabbedfet.isotope('layout')
            }, 500);
            $('.mayosis-filters-select').change(function() {
                $containerTabbedfet.isotope({
                    filter: this.value
                })
            });
            $(window).on('resize', function() {
                $containerTabbedfet.isotope('layout')
            });
            window.addEventListener("orientationchange", function() {
                $containerTabbedfet.isotope('layout')
            }, !1)
        })
    })
});
jQuery(document).ready(function($) {
    var $containerTabbedrec = $('.mayosis_tabbed_grid_recent');
    $(window).load(function() {
        $containerTabbedrec.imagesLoaded(function() {
            $containerTabbedrec.isotope({
                itemSelector: '.element-item',
                layoutMode: 'fitRows',
                transitionDuration: '0.8s'
            });
            setTimeout(function() {
                $containerTabbedrec.isotope('layout')
            }, 500);
            $('.mayosis-filters-select').change(function() {
                $containerTabbedrec.isotope({
                    filter: this.value
                })
            });
            $(window).on('resize', function() {
                $containerTabbedrec.isotope('layout')
            });
            window.addEventListener("orientationchange", function() {
                $containerTabbedrec.isotope('layout')
            }, !1)
        })
    })
});
jQuery(document).ready(function($) {
    var $containerSmall = $('.gridboxsmall');
    $(window).load(function() {
        $containerSmall.imagesLoaded(function() {
            $containerSmall.isotope({
                itemSelector: '.grid-product-box',
                layoutMode: 'fitRows',
                transitionDuration: '0.8s'
            });
            setTimeout(function() {
                $containerSmall.isotope('layout')
            }, 500);
            $('.mayosis-filters-select-small').change(function() {
                $containerSmall.isotope({
                    filter: this.value
                })
            });
            $(window).on('resize', function() {
                $containerSmall.isotope('layout')
            });
            window.addEventListener("orientationchange", function() {
                $containerSmall.isotope('layout')
            }, !1)
        })
    })
});
jQuery(document).ready(function($) {
    var $container1 = $('.product-masonry');
    $(window).load(function() {
        $container1.imagesLoaded(function() {
            $container1.isotope({
                itemSelector: '.product-masonry-item',
                layoutMode: 'masonry',
                transitionDuration: '0.8s'
            });
            setTimeout(function() {
                $container1.isotope('layout')
            }, 500);
            $('.product-masonry-filter li a').on('click', function() {
                $('.product-masonry-filter li a').removeClass('active');
                $(this).addClass('active');
                var selector = $(this).attr('data-filter');
                $('.product-masonry').isotope({
                    filter: selector
                });
                setTimeout(function() {
                    $container1.isotope('layout')
                }, 700);
                return !1
            });
            $(window).on('resize', function() {
                $container1.isotope('layout')
            });
            window.addEventListener("orientationchange", function() {
                $container1.isotope('layout')
            }, !1)
        })
    })
});
jQuery(document).ready(function($) {
    $('.statistic-counter').counterUp({
        delay: 10,
        time: 2000
    })
});
jQuery(document).ready(function($) {
    $(".breadcrumb").fitText(1.2, {
        minFontSize: '12px',
        maxFontSize: '14px'
    })
});
jQuery(document).ready(function($) {
    $('.popr').popr()
})
jQuery(document).ready(function() {
   $( ".overlay_button_search" ).click(function() {
        $( ".main_searchoverlay" ).addClass
        ('open');
      });
})