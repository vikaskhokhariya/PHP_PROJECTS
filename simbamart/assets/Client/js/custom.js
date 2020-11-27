"use strict";
! function(a, b, c) {
    function d(b, d) {
        var e = this;
        e.element = a(b), e.options = a.extend({}, f, d), /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? (i = !0, a(c.body).addClass("is-mobile")) : a(c.body).addClass("no-mobile"), e.init(), g.appear(), g.load(function() {
            if (e.preloader.delay(f.speedAnimation).fadeOut(f.speedAnimation), e.activate(), e.dropMenu(), e.moveMenu(), e.megaMenu(), e.truncAny(), e.fMiddle(), e.scrll(), e.countUp(), e.instagramm(), e.flickr(), e.priceSlider(), e.ratings(), e.subscribeForm(), e.contactForm(), e.vCharts(), e.pieCharts(), e.faqNav(), e.magnificPopup(), e.masonryMix(), e.contactMap(), e.sliders(".slider .slider"), e.sliders(), e.sliderRevolution(), setTimeout(function() {
                    e.rez(), e.isotopeMix()
                }, 350), a(".nav-nobg").on("show.bs.collapse", function() {
                    a("header.header").removeClass("header-nobg")
                }), a(".nav-nobg").on("hidden.bs.collapse", function() {
                    a("header.header").addClass("header-nobg")
                }), a(".slider-scroll").on("click", function() {
                    if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
                        var b = a(this.hash);
                        if (b = b.length ? b : a("[name=" + this.hash.slice(1) + "]"), b.length) return a("html,body").animate({
                            scrollTop: b.offset().top
                        }, 1e3), !1
                    }
                }), a("#tweet-feed").size() > 0) {
                var b = {
                    id: "686883871074422784",
                    domId: "tweet-feed",
                    maxTweets: 1,
                    showUser: !1,
                    showImages: !1,
                    showRetweet: !1,
                    showInteraction: !1,
                    showTime: !1,
                    enableLinks: !0
                };
                twitterFetcher.fetch(b);
                var c = {
                    id: "686883871074422784",
                    domId: "tweet-feed1",
                    maxTweets: 1,
                    showUser: !1,
                    showImages: !1,
                    showRetweet: !1,
                    showInteraction: !1,
                    showTime: !1,
                    enableLinks: !0
                };
                twitterFetcher.fetch(c)
            }
        }).scroll(function() {
            e.scrll(), e.countUp(), e.parallaxBG()
        }).resize(function() {
            e.rez(), e.fMiddle(), e.megaMenu(), g.width() > 995 && a(".nav-nobg").is(":visible") && a("header.header").addClass("header-nobg")
        })
    }
    var e = "Aisconverse",
        f = {
            sliderFx: "crossfade",
            sliderInterval: 6e3,
            sliderAuto: !1,
            speedAnimation: 500,
            defFx: "easeInSine",
            scrollTopButtonOffset: 500,
            successText: "You have successfully subscribed",
            errorText: "Please, enter a valid email",
            collapseMenuWidth: 991,
            flickrId: "36587311@N08",
            instagrammId: 3677038064,
            markersColor: ["#DA3636", "#323232", "#7F7F7F"]
        },
        g = a(b),
        h = a("html, body"),
        i = !1;
    d.prototype = {
        init: function() {
            this.body = a(c.body), this.preloader = a(".preloader"), this.wrapper = a(".wrapper"), this.header = a(".header"), this.headerSidebar = a(".header-sidebar"), this.footer = a(".footer"), this.slider = a(".slider"), this.banner = a(".banner"), this.fullscreen = a(".fullscreen"), this.vmiddle = a(".middle"), this.gallery = a(".gallery"), this.internalLinks = a(".internal"), this.expandLink = a(".expand-link"), this.collapseLink = a(".collapse-link"), this.audio = a("audio"), this.chart = a(".chart"), this.select = a("select"), this.timer = a(".countdown"), this.counting = a(".counting"), this.map = a(".google-map"), this.mapAbsolute = a("[class*=google-map-absolute]"), this.modal = a(".modal"), this.countup = a(".countup"), this.quantity = a(".product-quantity"), this.parallax = a('[data-type="parallax"]'), this.dataToggle = a("[data-toggle]"), this.mixWrap = a(".mix-wrap"), this.magnific = a(".magnific"), this.magnificWrap = a(".magnific-wrap"), this.magnificGallery = a(".magnific-gallery"), this.magnificVideo = a(".magnific-video"), this.masonryWrap = a(".masonry-wrap"), this.isotopeWrap = a(".isotope-wrap"), this.cornerLink = a(".corner-link"), this.card = a(".card"), this.imgWrap = a(".img-wrap"), this.animateBlock = a("[data-animate]"), this.hoverBlock = a("[data-hover]"), this.clients = a(".clients"), this.rating = a(".raty"), this.instafeed = a("#instafeed"), this.flickrfeed = a("#flickrfeed"), this.verticalChart = a(".vertical-chart"), this.pieChart = a(".pie-chart"), this.widgetSubscrire = a(".widget_subscrire"), this.subscribe = this.widgetSubscrire.find("form"), this.loadmore = a(".load-more"), this.dropdownToggle = a(".dropdown-toggle"), this.dropdown = a(".dropdown"), this.navbar = a(".navbar"), this.navbarCollapse = a(".navbar-collapse"), this.navbarToggle = a(".navbar-toggle"), this.navbarToggleModal = a(".navbar-toggle-modal"), this.dataPopover = a('[data-toggle="popover"]'), this.widgetbarToggle = a(".widgetbar-toggle")
        },
        activate: function() {
            var b = this,
                d = b.options.speedAnimation;
            b.internalLinks.on("click", function(c) {
                c.preventDefault();
                var e, f = a(this),
                    g = f.attr("href").replace("#", ""),
                    i = a("#" + g);
                e = i.length ? i.offset().top : a('[name="' + g + '"]').offset().top, h.stop(!0, !0).animate({
                    scrollTop: e
                }, d, b.options.defFx)
            }), b.select.length > 0 && b.select.chosen({
                width: "100%"
            }), b.audio.length > 0 && b.audio.mediaelementplayer(), b.dataPopover.length > 0 && (b.dataPopover.popover({
                trigger: "hover focus"
            }), b.dataPopover.on("show.bs.popover", function() {
                var b = a(this),
                    c = b.data("color");
                c && setTimeout(function() {
                    b.parent().find(".popover").addClass("popover-color popover-" + c)
                }, 0)
            })), b.cornerLink.on("click", function(b) {
                b.preventDefault();
                var c = a(this),
                    e = c.parent(),
                    f = e.find(".container");
                c.toggleClass("vis"), f.stop(!0, !0).slideToggle(d)
            }), b.quantity.find("a").on("click", function(b) {
                b.preventDefault();
                var c, d = a(this),
                    e = d.parent().find("input"),
                    f = e.val();
                d.hasClass("plus") ? c = parseFloat(f) + 1 : d.hasClass("minus") && (c = f > 1 ? parseFloat(f) - 1 : 1), e.val(c)
            }), a(".single-product-page-cart-form select").on("change", function() {
                a(".collapse-group").slideDown(d)
            }), a(".collapse-group .reset").on("click", function(b) {
                b.preventDefault(), a(this).parents(".collapse-group").slideUp(d), a(".single-product-page-cart-form select").val("").trigger("chosen:updated")
            }), a(".cart .remove").on("click", function(b) {
                b.preventDefault();
                var c = a(this);
                c.parents("tr").fadeOut(d, function() {
                    a(this).remove()
                })
            }), b.header.hasClass("header-vertical") && !b.header.hasClass("header-vertical-hover") && b.body.addClass("is-header-vertical"), b.header.hasClass("header-left") ? b.body.addClass("is-header-left") : b.header.hasClass("header-right") && b.body.addClass("is-header-right"), b.animateBlock.on("appear", function() {
                var b = a(this),
                    c = b.data("animate");
                b.parent().css("position", "relative"), b.addClass("animated " + c)
            }).appear(), b.animateBlock.on("click", function(b) {
                var c = a(this),
                    e = c.data("animate");
                c.hasClass("animate-toggle") && (b.preventDefault(), c.removeClass("animated").removeClass(e)), setTimeout(function() {
                    c.addClass("animated").addClass(e)
                }, d / 2)
            }), b.hoverBlock.on({
                mouseenter: function() {
                    var b = a(this),
                        c = b.data("hover");
                    b.addClass("animated").addClass(c)
                },
                mouseleave: function() {
                    var b = a(this),
                        c = b.data("hover");
                    setTimeout(function() {
                        b.removeClass("animated").removeClass(c)
                    }, d)
                }
            }), b.card.hover(function() {
                var b = a(this),
                    c = b.find("[data-hover]"),
                    d = c.data("hover");
                b.hasClass("front") || b.toggleClass("hover"), c.length > 0 && c.toggleClass("animated").toggleClass(d)
            }), a(c).mouseup(function(a) {
                !b.headerSidebar.is(a.target) && 0 === b.headerSidebar.has(a.target).length && b.headerSidebar.hasClass("in") && b.headerSidebar.collapse("hide")
            }), b.loadmore.on("click", function(c) {
                c.preventDefault();
                var e, f = a(this),
                    g = f.attr("href");
                b.masonryWrap.append('<div class="next-posts">'), a(".next-posts:last").load(g, function() {
                    var c = a(this);
                    setTimeout(function() {
                        e = new Masonry(b.masonryWrap[0], {
                            itemSelector: ".msnr"
                        })
                    }, 100), f.attr("href", "msnr-2.html"), "msnr-2.html" === g && f.parent().hide(), c.animate({
                        opacity: 1
                    }, d), c.find("audio").length > 0 && c.find("audio").mediaelementplayer({
                        audioWidth: "100%"
                    }), c.find(".slider").length > 0 && setTimeout(function() {
                        b.sliders()
                    }, d / 2)
                })
            })
        },
        isotopeMix: function() {
            var b = this;
            b.mixWrap.each(function() {
                var c = a(this),
                    d = c.find(b.isotopeWrap).isotope({
                        itemSelector: ".mix",
                        layoutMode: "masonry",
                        transitionDuration: "0.3s",
                        transformsEnabled: !1,
                        getSortData: {
                            category: "[data-category]",
                            name: "[data-name]",
                            date: function(b) {
                                var c = a(b).data("date");
                                return Date.parse(c)
                            }
                        }
                    });
                b.dataToggle.on("click", function() {
                    setTimeout(function() {
                        d.isotope()
                    }, 315)
                }), c.find(b.select).on("change", function() {
                    var b = a(this),
                        c = b.val();
                    d.isotope({
                        sortBy: c
                    })
                }).change(), c.find(".mix-category li a").on("click", function(c) {
                    var e = a(this),
                        f = e.data("filter");
                    c.preventDefault(), e.parent().addClass("active").siblings().removeClass("active"), e.parents(".mix-wrap").find(b.isotopeWrap).length > 0 && d.isotope({
                        filter: f
                    })
                })
            })
        },
        masonryMix: function() {
            var b = this;
            b.masonryWrap.length > 0 && b.masonryWrap.each(function() {
                var c, d = a(this)[0];
                setTimeout(function() {
                    c = new Masonry(d, {
                        itemSelector: ".msnr"
                    })
                }, b.options.speedAnimation / 2)
            })
        },
        magnificPopup: function() {
            var b = this;
            b.magnificWrap.each(function() {
                var c = a(this);
                c.find(b.magnific).magnificPopup({
                    type: "image",
                    tLoading: "",
                    gallery: {
                        enabled: !0,
                        navigateByImgClick: !0
                    },
                    image: {
                        titleSrc: function(a) {
                            return a.el.attr("title")
                        }
                    }
                })
            }), b.magnificVideo.on("click", function(b) {
                b.preventDefault();
                var c = a(this),
                    d = c.attr("href");
                a.magnificPopup.open({
                    items: {
                        src: d,
                        type: "iframe",
                        fixedContentPos: !0
                    }
                })
            }), b.magnificGallery.on("click", function(b) {
                b.preventDefault();
                for (var c = a(this), d = [], e = c.data("gallery"), f = e.split(","), g = f.length, h = c.attr("title"), i = 0; g > i; i++) d.push({
                    src: f[i]
                });
                a.magnificPopup.open({
                    items: d,
                    type: "image",
                    gallery: {
                        enabled: !0
                    },
                    image: {
                        titleSrc: function() {
                            return h
                        }
                    }
                })
            })
        },
        ratings: function() {
            var b = this;
            b.rating.length > 0 && b.rating.raty({
                half: !0,
                starType: "i",
                readOnly: function() {
                    return a(this).data("readonly")
                },
                score: function() {
                    return a(this).data("score")
                },
                starOff: "fa fa-star star-off",
                starOn: "fa fa-star",
                starHalf: "fa fa-star-half-o"
            })
        },
        truncAny: function() {
            for (var b = [], c = 0; c < b.length; c++) b[c].el.dotdotdot({
                watch: "window",
                wrap: "word",
                height: b[c].height,
                callback: function() {
                    a(this).addClass("truncated")
                }
            })
        },
        dropMenu: function() {
            var b = this;
            b.navbarToggleModal.on("click", function() {
                b.body.toggleClass("overlaymenu"), a(".navbar-modal").stop(!0, !0).fadeToggle(b.options.speedAnimation / 2), a(".navbar-nav").toggleClass("in")
            }), a(".navbar-modal .dropdown").on({
                "show.bs.dropdown": function() {
                    var c = a(this);
                    c.find(".dropdown-menu").first().stop(!0, !0).slideDown(b.options.speedAnimation / 2)
                },
                "hide.bs.dropdown": function() {
                    var c = a(this);
                    c.find(".dropdown-menu").first().stop(!0, !0).slideUp(b.options.speedAnimation / 2)
                }
            }), a(".navbar-modal").find(".dropdown-menu:not(.sub-menu) a").on("click", function() {
                b.preloader.show()
            }), a(".dropdown-menu.sub-menu > li.dropdown > a").on("click", function(c) {
                var d = a(this),
                    e = d.next(),
                    f = d.parent().parent();
                f.find(".sub-menu:visible").not(e).stop(!0, !0).slideUp(b.options.speedAnimation / 2), e.stop(!0, !0).slideToggle(b.options.speedAnimation / 2), c.stopPropagation(), c.preventDefault()
            }), a(".dropdown-menu:not(.sub-menu) > li > a").on("click", function() {
                var c = a(this).closest(".dropdown");
                c.find(".sub-menu:visible").stop(!0, !0).slideUp(b.options.speedAnimation / 2)
            }), b.navbar.find(b.dropdownToggle).on("mousedown", function() {
                var b = a(this),
                    c = g.width(),
                    d = b.next(),
                    e = d.outerWidth(!0),
                    f = b.outerWidth(!0),
                    h = b.offset().left;
                h + f + e > c && d.addClass("reverse-list")
            }), b.dropdown.on("hide.bs.dropdown", function() {
                a(".dropdown-menu").removeClass("reverse-list")
            }), a(".pagetitle .dropdown").on("show.bs.dropdown", function() {
                var b = a(this),
                    c = g.width(),
                    d = b.find(".dropdown-menu"),
                    e = d.outerWidth(!0),
                    f = b.offset().left;
                f + e > c && d.addClass("reverse-list")
            })
        },
        moveMenu: function() {
            function a(a) {
                "open" === a && (b.body.addClass("is-move-menu"), b.header.hasClass("header-left") ? (b.header.animate({
                    left: 0
                }, b.options.speedAnimation), b.body.animate({
                    marginRight: -c,
                    marginLeft: c
                }, b.options.speedAnimation)) : b.header.hasClass("header-right") && (b.header.animate({
                    right: 0
                }, b.options.speedAnimation), b.body.animate({
                    marginLeft: -c,
                    marginRight: c
                }, b.options.speedAnimation))), "close" === a && (b.body.removeClass("is-move-menu"), b.body.animate({
                    marginRight: 0,
                    marginLeft: 0
                }, b.options.speedAnimation), b.header.hasClass("header-left") ? b.header.animate({
                    left: -c
                }, b.options.speedAnimation) : b.header.hasClass("header-right") && b.header.animate({
                    right: -c
                }, b.options.speedAnimation))
            }
            var b = this,
                c = b.header.outerWidth(!0);
            b.header.hasClass("header-vertical-move") && a(b.body.hasClass("is-move-menu") ? "close" : "open"), b.header.hasClass("header-vertical-move") && b.navbarToggle.on("click", function() {
                a(b.body.hasClass("is-move-menu") ? "close" : "open")
            })
        },
        sliders: function(b) {
            var c = this;
            ("" === b || null === b || void 0 === b) && (b = ".slider"), b = a(b), c.slider.length > 0 && b.each(function(b) {
                var d = a(this),
                    e = d.find("ul:first"),
                    f = e.data("fx"),
                    g = e.data("auto"),
                    h = e.data("timeout"),
                    j = e.data("speed-animation"),
                    k = e.data("circular"),
                    l = d.hasClass("vertical") && c.body.hasClass("fullpage") ? !0 : !1,
                    m = e.data("scroll-items"),
                    n = e.data("max-items"),
                    o = "#slider-",
                    p = d.hasClass("vertical") ? "up" : "left",
                    q = d.hasClass("oneslider") ? {
                        visible: {
                            min: 1,
                            max: 1
                        },
                        width: 870
                    } : {
                        height: "variable",
                        visible: {
                            min: 1,
                            max: n ? n : 6
                        }
                    };
                d.attr("id", "slider-" + b), e.carouFredSel({
                    direction: p,
                    responsive: !0,
                    width: "variable",
                    infinite: k,
                    circular: k,
                    auto: g ? g : c.options.sliderAuto,
                    scroll: {
                        fx: f ? f : c.options.sliderFx,
                        easing: "linear",
                        duration: j ? j : c.options.speedAnimation,
                        timeoutDuration: h ? h : c.options.sliderInterval,
                        items: m ? m : "page",
                        onBefore: function(b) {
                            var d = a(this),
                                e = d.find("li:first").attr("class") ? d.find("li:first").attr("class") : "",
                                f = a(b.items.old),
                                g = a(b.items.visible),
                                h = f.find("[data-animate]");
                            i || g.find("video").length > 0 && g.find("video").get(0).play(), h.length > 0 && (d.parent().removeClass().addClass("carousel-wrap " + e), d.parent().find("ul:last [data-animate]").removeClass("animated"), setTimeout(function() {
                                h.each(function() {
                                    var b = a(this),
                                        c = b.data("animate");
                                    b.removeClass(c).removeClass("animated")
                                })
                            }, c.options.speedAnimation)), d.find(".no-before").removeClass("no-before")
                        },
                        onAfter: function(b) {
                            var c = a(this),
                                d = c.parents(".slider"),
                                e = a(b.items.visible),
                                f = e.length,
                                g = e.find("[data-animate]");
                            (d.hasClass("steps-1") || d.hasClass("steps-2") || d.hasClass("steps-4") || d.hasClass("steps-5") || d.hasClass("steps-6")) && (c.find("li").filter(":nth-child(" + f + "n+" + (f + 1) + ")").addClass("no-before"), c.find("li:first-child").addClass("no-before")), g.length > 0 && (c.parent().removeClass().addClass("carousel-wrap"), g.each(function() {
                                var b = a(this),
                                    c = b.data("animate");
                                b.addClass(c).addClass("animated")
                            }))
                        }
                    },
                    onCreate: function(b) {
                        var c = a(b.items),
                            e = c.length;
                        a("[class*=steps].slider li:first-child").addClass("step-1"), (d.hasClass("steps-1") || d.hasClass("steps-2") || d.hasClass("steps-4") || d.hasClass("steps-5") || d.hasClass("steps-6")) && (d.find("li").filter(":nth-child(" + e + "n+" + (e + 1) + ")").addClass("no-before"), d.find("li:first-child").addClass("no-before")), i || c.find("video").length > 0 && c.find("video").get(0).play()
                    },
                    items: q,
                    swipe: {
                        onTouch: !0,
                        onMouse: !1
                    },
                    prev: a(o + b + " .slider-arrow-prev"),
                    next: a(o + b + " .slider-arrow-next"),
                    pagination: {
                        container: a(o + b + " > .slider-pagination")
                    },
                    mousewheel: l
                }, {
                    onWindowResize: "throttle",
                    wrapper: {
                        classname: "carousel-wrap"
                    }
                }).parent().css("margin", "auto")
            })
        },
        sliderRevolution: function() {
            var b = this,
                c = a(".banner-tabs");
            b.banner.length > 0 && b.banner.each(function() {
                var b = a(this);
                b.revolution({
                    autoplay: b.data("auto") ? b.data("auto") : !1,
                    delay: b.data("timeout") ? b.data("timeout") : "9000",
                    startwidth: 1110,
                    startheight: b.data("startheight") ? b.data("startheight") : 550,
                    startWithSlide: 0,
                    fullScreenAlignForce: "off",
                    autoHeight: "off",
                    minHeight: "off",
                    shuffle: "off",
                    onHoverStop: "on",
                    stopAtSlide: b.data("stopatslide") ? b.data("stopatslide") : -1,
                    stopAfterLoops: b.data("stopafterloops") ? b.data("stopafterloops") : -1,
                    thumbWidth: b.data("thumbwidth") ? b.data("thumbwidth") : 90,
                    thumbHeight: b.data("thumbheight") ? b.data("thumbheight") : 60,
                    thumbAmount: b.data("thumbamount") ? b.data("thumbamount") : 3,
                    hideThumbsOnMobile: "off",
                    hideNavDelayOnMobile: 1500,
                    hideBulletsOnMobile: "off",
                    hideArrowsOnMobile: "off",
                    hideThumbsUnderResoluition: 0,
                    hideThumbs: 0,
                    hideTimerBar: b.data("hidetimerbar") ? b.data("hidetimerbar") : "on",
                    keyboardNavigation: "on",
                    navigationType: b.data("navigationtype") ? b.data("navigationtype") : "bullet",
                    navigationArrows: b.data("navigationarrows") ? b.data("navigationarrows") : "solo",
                    navigationStyle: b.data("navigationstyle") ? b.data("navigationstyle") : "round",
                    navigationHAlign: b.data("navigationhalign") ? b.data("navigationhalign") : "center",
                    navigationVAlign: b.data("navigationvalign") ? b.data("navigationvalign") : "bottom",
                    navigationHOffset: b.data("navigationhoffset") ? b.data("navigationhoffset") : 0,
                    navigationVOffset: b.data("navigationvoffset") ? b.data("navigationvoffset") : 35,
                    soloArrowLeftHalign: b.data("soloarrowlefthalign") ? b.data("soloarrowlefthalign") : "left",
                    soloArrowLeftValign: b.data("soloarrowleftvalign") ? b.data("soloarrowleftvalign") : "center",
                    soloArrowLeftHOffset: b.data("soloarrowlefthoffset") ? b.data("soloarrowlefthoffset") : -2,
                    soloArrowLeftVOffset: b.data("soloarrowleftvoffset") ? b.data("soloarrowleftvoffset") : 0,
                    soloArrowRightHalign: b.data("soloarrowrighthalign") ? b.data("soloarrowrighthalign") : "right",
                    soloArrowRightValign: b.data("soloarrowrightvalign") ? b.data("soloarrowrightvalign") : "center",
                    soloArrowRightHOffset: b.data("soloarrowrighthoffset") ? b.data("soloarrowrighthoffset") : -2,
                    soloArrowRightVOffset: b.data("soloarrowrightvoffset") ? b.data("soloarrowrightvoffset") : 0,
                    parallax: b.data("parallax") ? b.data("parallax") : "mouse",
                    parallaxBgFreeze: b.data("parallaxbgfreeze") ? b.data("parallaxbgfreeze") : "on",
                    parallaxLevels: b.data("parallaxlevels") ? b.data("parallaxlevels") : [10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
                    dottedOverlay: b.data("dottedoverlay") ? b.data("dottedoverlay") : "none",
                    spinned: "spinner0",
                    fullWidth: b.data("fullwidth") ? b.data("fullwidth") : "off",
                    forceFullWidth: b.data("forcefullwidth") ? b.data("forcefullwidth") : "off",
                    fullScreen: b.data("fullscreen") ? b.data("fullscreen") : "off",
                    fullScreenOffsetContainer: b.data("fullscreenoffsetcontainer") ? b.data("fullscreenoffsetcontainer") : "",
                    shadow: 0
                }), c.on("click", "a", function(c) {
                    c.preventDefault();
                    var d = a(this),
                        e = d.parent().index() + 1;
                    b.revshowslide(e), d.parent().addClass("selected").siblings().removeClass("selected")
                }), b.bind("revolution.slide.onchange", function(a, b) {
                    var d = b.slideIndex - 1;
                    c.find("li").eq(d).addClass("selected").siblings().removeClass("selected")
                })
            })
        },
        pieCharts: function() {
            var b = this;
            b.pieChart.length > 0 && b.pieChart.each(function() {
                var c = a(this),
                    d = c.data("bar-color") ? c.data("bar-color") : !1,
                    e = c.data("track-color"),
                    f = c.data("line-width") ? c.data("line-width") : 6;
                c.on("appear", function() {
                    c.animate({
                        opacity: 1
                    }, b.options.speedAnimation), c.easyPieChart({
                        barColor: d,
                        trackColor: e,
                        lineWidth: f,
                        animate: 4 * b.options.speedAnimation,
                        onStep: function(b, c, d) {
                            a(this.el).hasClass("pie-icon") || a(this.el).find(".pie-percent").text(Math.round(d))
                        }
                    })
                }).appear()
            })
        },
        vCharts: function() {
            var b = this;
            b.verticalChart.length > 0 && b.verticalChart.each(function(b) {
                var c = a(this),
                    d = c.data("colors"),
                    e = c.data("postfix"),
                    f = c.data("value");
                c.attr("id", "bar-" + b), c.on("appear", function() {
                    0 === c.children().length && c.jqBarGraph({
                        data: [
                            [f]
                        ],
                        colors: [d],
                        postfix: e,
                        height: 240
                    })
                }).appear()
            })
        },
        countUp: function() {
            var b = this,
                c = {
                    delay: 40,
                    signPosition: "after",
                    orderSeparator: " ",
                    decimalSeparator: ","
                };
            b.countup.length > 0 && b.countup.each(function() {
                var b = a(this);
                b.hasClass("countup-fix") || b.hsCounter(c)
            })
        },
        fMiddle: function() {
            var b = this;
            b.vmiddle.each(function() {
                var b = a(this);
                b.css(b.prev().length ? {
                    marginTop: (b.parent().height() - b.height()) / 2 - b.prev().css("paddingTop").replace("px", "")
                } : {
                    marginTop: (b.parent().outerHeight() - b.outerHeight()) / 2
                })
            })
        },
        parallaxBG: function() {
            var b = this;
            b.parallax.each(function() {
                var b = a(this),
                    c = -(g.scrollTop() * b.data("speed")),
                    d = "50% " + c + "px";
                b.css(g.width() >= 768 ? {
                    backgroundPosition: d
                } : {
                    backgroundPosition: "50% 50%"
                })
            })
        },
        instagramm: function() {
            var a = this;
            if (a.instafeed.length) {
                var b = "{{link}}",
                    c = "{{image}}",
                    d = new Instafeed({
                        get: "user",
                        userId: a.options.instagrammId,
                        limit: 6,
                        accessToken: "3677038064.1677ed0.1fac723f09c8482c9c6bf406a2041331",
                        template: "<a href=" + b + ' target="_blank"><img alt="" src=' + c + " /></a>"
                    });
                d.run()
            }
        },
        flickr: function() {
            var a = this;
            if (a.flickrfeed.length) {
                var b = "{{image_b}}",
                    c = "{{image_s}}";
                a.flickrfeed.jflickrfeed({
                    limit: 6,
                    qstrings: {
                        id: a.options.flickrId
                    },
                    itemTemplate: "<a href=" + b + ' target="_blank"><img alt="{{title}}" src=' + c + " /></a>"
                })
            }
        },
        faqNav: function() {
            var b = this,
                c = a(".faq"),
                d = c.find(".panel-body");
            d.length > 0 && d.collapse({
                toggle: !1
            }), b.expandLink.on("click", function(a) {
                a.preventDefault(), d.collapse("show"), c.find("[data-toggle]").removeClass("collapsed")
            }), b.collapseLink.on("click", function(a) {
                a.preventDefault(), d.collapse({
                    toggle: !1
                }), d.collapse("hide"), c.find("[data-toggle]").addClass("collapsed")
            })
        },
        priceSlider: function() {
            var b = a(".price_slider"),
                c = a(".price_label"),
                d = c.find(".from"),
                e = c.find(".to");
            b.slider({
                range: !0,
                min: 0,
                max: 1e3,
                values: [10, 590],
                slide: function(a, b) {
                    d.html("$" + b.values[0]), e.html("$" + b.values[1])
                }
            }), d.val("$" + b.slider("values", 0)), e.val("$" + b.slider("values", 1))
        },
        scrll: function() {
            var b = this,
                c = g.height(),
                d = g.scrollTop(),
                e = b.header.outerHeight(!0),
                f = b.widgetbarToggle.data("top-position");
            g.scrollTop() > 130 ? (b.widgetbarToggle.css("top", 50), a(".is-header-vertical").find(b.widgetbarToggle).css("top", 50)) : b.widgetbarToggle.css("top", f), b.header.hasClass("header-sticky") && b.header.hasClass("navbar-fixed-bottom") && (b.header.hasClass("header-sticky-hidden") ? b.header.css("bottom", d) : d >= c - e ? b.header.addClass("navbar-fixed-top").removeAttr("style") : b.header.removeClass("navbar-fixed-top").css("bottom", d)), b.header.hasClass("header-bottom-hidden") && b.header.hasClass("navbar-fixed-bottom") && (b.header.css("bottom", -e), d >= 0 && e > d ? b.header.css("bottom", d - e) : b.header.hasClass("header-sticky-hidden") ? (b.header.css("bottom", d - e), b.header.hasClass("header-sticky") && (d >= c ? b.header.addClass("navbar-fixed-top").removeAttr("style") : b.header.removeClass("navbar-fixed-top").css("bottom", d - e))) : b.header.css("bottom", 0))
        },
        megaMenu: function() {
            var b = this,
                c = g.width();
            b.header.hasClass("header-vertical") || (c <= b.options.collapseMenuWidth ? b.navbar.length > 0 && b.navbar.superfish("destroy") : (b.navbarCollapse.removeClass("in"), b.navbar.length > 0 && a("body").hasClass("no-mobile") && b.navbar.superfish({
                delay: 100,
                animation: {
                    opacity: "show",
                    marginTop: 0,
                    marginBottom: 0
                },
                animationOut: {
                    opacity: "hide",
                    marginTop: "15px",
                    marginBottom: "15px"
                },
                speed: "fast",
                speedOut: "fast",
                onBeforeShow: function() {
                    var a = this,
                        b = a.prev(),
                        c = g.width(),
                        d = b.outerWidth(),
                        e = a.outerWidth(),
                        f = a.prev().length > 0 ? a.prev().offset().left : 0;
                    f + e + d > c && a.parent().find(".dropdown-menu").addClass("reverse-list")
                },
                onHide: function() {
                    this.removeClass("reverse-list")
                }
            })))
        },
        contactMap: function() {
            var b, c = this,
                d = a(".a-map"),
                e = a(".map-close"),
                f = null;
            c.map.length > 0 && a.each(c.map, function(e, g) {
                var h = a(g).find(".google-map-container"),
                    i = h.data("center").split(","),
                    j = h.data("markers").split("; "),
                    k = {
                        zoom: h.data("zoom"),
                        scrollwheel: !1,
                        panControl: h.data("pan-control") ? h.data("pan-control") : !1,
                        navigationControl: h.data("navigation-control") ? h.data("navigation-control") : !1,
                        mapTypeControl: h.data("map-type-control") ? h.data("map-type-control") : !1,
                        scaleControl: h.data("scale-control") ? h.data("scale-control") : !1,
                        draggable: !0,
                        zoomControl: !0,
                        zoomControlOptions: {
                            style: google.maps.ZoomControlStyle.SMALL,
                            position: google.maps.ControlPosition.LEFT_CENTER
                        },
                        center: new google.maps.LatLng(i[0], i[1]),
                        styles: h.data("style") ? h.data("style") : []
                    },
                    l = new google.maps.Map(h.get(0), k),
                    m = 0,
                    n = h.data("markers").split("; ").length,
                    o = c.options.markersColor ? c.options.markersColor : c.options.markersColor[0];
                for (f = new google.maps.InfoWindow, m; n > m; m++) b = new google.maps.Marker({
                    map: l,
                    position: new google.maps.LatLng(j[m].split(",")[0], j[m].split(",")[1]),
                    icon: {
                        path: fontawesome.markers.MAP_MARKER,
                        scale: .65,
                        fillColor: o[m],
                        fillOpacity: 1,
                        strokeColor: o[m],
                        anchor: new google.maps.Point(15, -5)
                    }
                }), google.maps.event.addListener(b, "click", function() {
                    f.setContent("<p>" + this.position.A + ", " + this.position.F + "</p>"), f.open(l, this)
                });
                h.parents(".map-wrap").find(d).on("click", function() {
                    var c = a(this),
                        d = a(c.attr("href")),
                        e = d.find(".google-map-popup");
                    setTimeout(function() {
                        var a = new google.maps.Map(e.get(0), k);
                        for (m = 0; n > m; m++) b = new google.maps.Marker({
                            map: a,
                            position: new google.maps.LatLng(j[m].split(",")[0], j[m].split(",")[1]),
                            icon: {
                                path: fontawesome.markers.MAP_MARKER,
                                scale: .65,
                                fillColor: o[m],
                                fillOpacity: 1,
                                strokeColor: o[m],
                                anchor: new google.maps.Point(15, -5)
                            }
                        }), google.maps.event.addListener(b, "click", function() {
                            f.setContent("<p>" + this.position.A + ", " + this.position.F + "</p>"), f.open(a, this)
                        })
                    }, 150)
                })
            }), e.on("click", function() {
                a(".google-map-popup").removeAttr("style").children().remove()
            })
        },
        rez: function() {
            var b = this,
                c = g.width(),
                d = g.height(),
                e = b.header.outerHeight(),
                f = a(".container"),
                h = f.outerWidth(),
                i = a(".slider-arrow"),
                j = function() {
                    b.body.removeClass("no-menu").addClass("is-menu"), a(".navbar-collapse").removeClass("collapse")
                },
                k = function() {
                    b.body.removeClass("is-menu").addClass("no-menu"), a(".navbar-collapse").addClass("collapse")
                };
            c > b.options.collapseMenuWidth ? j() : k(), b.body.hasClass("is-header-vertical") && !b.header.hasClass("header-vertical-move") && (1200 > c ? (a(".header-vertical").removeClass("in"), b.wrapper.removeClass("wrapper-margin"), b.footer.removeClass("footer-margin"), b.header.find(b.navbarToggle).addClass("visible")) : (a(".header-vertical").addClass("in"), b.wrapper.addClass("wrapper-margin"), b.footer.addClass("footer-margin"), b.header.find(b.navbarToggle).removeClass("visible"))), b.imgWrap.each(function() {
                var b = a(this),
                    c = b.parent(),
                    d = c.outerHeight(!0);
                g.width() > 767 ? (b.removeAttr("style"), b.height(d)) : b.removeAttr("style")
            }), b.mapAbsolute.each(function() {
                var d = a(this),
                    e = d.parents(".container"),
                    f = e.outerWidth(),
                    g = d.parents("[class*=col-]"),
                    h = g.outerWidth();
                d.width((c - f) / 2 + f * h / f), b.contactMap()
            }), i.each(function() {
                var b = a(this),
                    d = b.width(),
                    e = (c - h) / 4 - d / 2;
                0 > e && (e = 15), b.hasClass("slider-arrow-prev") && b.hasClass("arrow-margin") ? b.css("marginLeft", e) : b.hasClass("slider-arrow-next") && b.hasClass("arrow-margin") && b.css("marginRight", e)
            }), b.slider.each(function() {
                var b = a(this),
                    d = b.find("ul"),
                    e = d.data("max-items") ? d.data("max-items") : 1;
                c > 768 && 992 >= c ? d.trigger("configuration", ["items", {
                    visible: {
                        max: 3 > e ? e : 3
                    }
                }], !0) : c > 639 && 767 >= c ? d.trigger("configuration", ["items", {
                    visible: {
                        max: 2 > e ? e : 2
                    }
                }], !0) : 639 >= c ? d.trigger("configuration", ["items", {
                    visible: {
                        max: 1
                    }
                }], !0) : d.trigger("configuration", ["items", {
                    visible: {
                        max: e
                    }
                }], !0), b.hasClass("oneslider") && d.trigger("configuration", ["items", {
                    visible: {
                        max: 1
                    }
                }], !0)
            }), b.wrapper.css("minHeight", d - e - (b.footer.outerHeight(!0) || 0))
        },
        subscribeForm: function() {
            var b = this;
            1 === b.subscribe.length && (b.subscribe.find("input[type=email]").on("keyup", function() {
                var b = a(".success-block");
                b.is(":visible") && b.css("display", "none")
            }), b.subscribe.validatr({
                showall: !0,
                location: "top",
                template: '<div class="error-email">' + b.options.errorText + "</div>",
                valid: function() {
                    {
                        var c = b.subscribe,
                            d = a(".feedback-success"),
                            e = c.attr("action");
                        c.find("input[type=email]")
                    }
                    e = e.replace("/post?", "/post-json?").concat("&c=?");
                    var f = {},
                        g = c.serializeArray();
                    return a.each(g, function(a, b) {
                        f[b.name] = b.value
                    }), a.ajax({
                        url: e,
                        data: f,
                        success: function(a) {
                            function e() {
                                c.attr("style", " ")
                            }
                            var f = b.options.successText;
                            if ("success" === a.result) d.show().addClass("scale").find("span").html(f), b.notyOut(), setTimeout(e, 0);
                            else {
                                setTimeout(e, 0);
                                var g;
                                try {
                                    var h = a.msg.split(" - ", 2);
                                    if (void 0 === h[1]) g = a.msg;
                                    else {
                                        var i = parseInt(h[0], 10);
                                        g = i.toString() === h[0] ? h[1] : a.msg
                                    }
                                } catch (j) {
                                    g = a.msg
                                }
                                d.show().addClass("scale has-error").find("span").html(g), b.notyOut()
                            }
                            c.slideUp(0, function() {
                                d.slideDown()
                            })
                        },
                        dataType: "jsonp",
                        error: function(a, b) {
                            alert("Oops! AJAX error: " + b)
                        }
                    }), !1
                }
            }))
        },
        contactForm: function() {
            var b = a(".contact-form"),
                c = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            b.length && a.each(b, function(b, d) {
                d = a(d), d.find("input, textarea").not('[type="radio"]').focusout(function() {
                    var b = a(this),
                        d = b.attr("required") ? !0 : !1;
                    "email" == b.attr("type") ? (d && "" === b.val() || b.val() && !c.test(b.val())) && b.parent().addClass("has-error") : d && "" === b.val() && b.parent().addClass("has-error")
                }).focusin(function() {
                    a(this).parent().removeClass("has-error")
                }), d.find('input[type="radio"]').on("change", function() {
                    var b = a(this),
                        c = b.attr("required") ? !0 : !1;
                    c && "" === b.val() && b.parent().addClass("has-error")
                }), d.find("select").on("change", function() {
                    var b = a(this),
                        c = b.attr("required") ? !0 : !1;
                    b.parent().removeClass("has-error"), c && "" === b.val() && b.parent().addClass("has-error")
                }), d.on("submit", function() {
                    var b = !1,
                        d = a(this);
                    a.each(d.find("input, textarea").not('[type="radio"]'), function(d, e) {
                        var f = a(e),
                            g = f.attr("required") ? !0 : !1;
                        "email" == f.attr("type") ? (g && "" === f.val() || f.val() && !c.test(f.val())) && (b = !0, f.parent().addClass("has-error")) : g && "" === f.val() && (b = !0, f.parent().addClass("has-error"))
                    }), a.each(d.find("select"), function(c, d) {
                        var e = a(d),
                            f = e.attr("required") ? !0 : !1;
                        f && "" === e.val() && (b = !0, e.parent().addClass("has-error"))
                    }), a.each(d.find('input[type="radio"]'), function(c, d) {
                        var e = a(d),
                            f = e.attr("required") ? !0 : !1;
                        f && "" === e.val() && (b = !0, e.parent().addClass("has-error"))
                    });
                    var e = {};
                    return a.each(d.find("input, textarea, select"), function(b, c) {
                        c = a(c), c.attr("name") && (e[c.attr("name")] = {
                            required: c.attr("required"),
                            value: c.val(),
                            type: c.attr("type")
                        })
                    }), b || a.ajax({
                        type: "POST",
                        url: d.attr("action"),
                        data: e,
                        dataType: "json"
                    }).done(function(b) {
                        "undefined" != typeof b.status && "ok" == b.status ? (d[0].reset(), a(".succs-msg").fadeIn().css("display", "inline-block")) : alert("Message was not sent. Server-side error!")
                    }).fail(function() {
                        alert("Message was not sent. Client error or Internet connection problems.")
                    }), !1
                })
            })
        },
        scrollbarWidth: function() {
            var b, c, d;
            return void 0 === d && (b = a('<div style="width:50px; height:50px; overflow:auto;"><div/>').appendTo("body"), c = b.children(), d = c.innerWidth() - c.height(99).innerWidth(), b.remove()), d
        }
    }, a.fn[e] = function(b) {
        return this.each(function() {
            a.data(this, "plugin_" + e) || a.data(this, "plugin_" + e, new d(this, b))
        })
    }
}(jQuery, window, document),
function(a) {
    a(document.body).Aisconverse(), document.all && !window.atob && a("[placeholder]").focus(function() {
        var b = a(this);
        b.val() == b.attr("placeholder") && (b.val(""), b.removeClass("placeholder"))
    }).blur(function() {
        var b = a(this);
        ("" === b.val() || b.val() === b.attr("placeholder")) && (b.addClass("placeholder"), b.val(b.attr("placeholder")))
    }).blur().parents("form").submit(function() {
        a(this).find("[placeholder]").each(function() {
            var b = a(this);
            b.val() == b.attr("placeholder") && b.val("")
        })
    })
}(jQuery);