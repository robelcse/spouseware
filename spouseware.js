"use strict";
! function() {
    document.querySelectorAll(".main-menu-button").forEach(function(e) {
        e.addEventListener("click", function() {
            e.classList.toggle("open"), document.body.classList.toggle("mobile-menu-open")
        })
    });
    var e = document.querySelector(".language-select");
    null !== e && e.addEventListener("click", function() {
        e.classList.toggle("open")
    });
    var t = document.querySelectorAll(".disclaimer-more"),
        n = document.querySelector(".disclaimer-wr");
    0 < t.length && t.forEach(function(e) {
        e.addEventListener("click", function() {
            n.classList.toggle("more")
        })
    });
    var o = document.querySelectorAll(".drop-seo-wr");
    0 < o.length && o.forEach(function(e) {
        e.querySelector(".drop-seo-head").addEventListener("click", function() {
            e.classList.toggle("open") ? ga("send", "event", "Spoiler SEO", "Show", location.pathname) : ga("send", "event", "Spoiler SEO", "Hide", location.pathname)
        })
    });
    var c = document.querySelectorAll(".play-video"),
        l = document.querySelector(".video-popup");
    if (0 < c.length && null !== l) {
        var r = l.querySelector(".video-box");
        c.forEach(function(e) {
            e.addEventListener("click", function() {
                l.classList.add("show"), r.innerHTML = '<iframe width="560" height="315" \n                src="'.concat(r.dataset.link, '" frameborder="0" allowfullscreen></iframe>')
            })
        }), l.addEventListener("click", function() {
            l.classList.remove("show"), r.innerHTML = ""
        })
    }
    document.querySelectorAll(".faq-i").forEach(function(e) {
        e.querySelector(".faq-head").addEventListener("click", function() {
            e.classList.toggle("open")
        })
    });
    var i = document.querySelector(".cookie-l");
    if (null !== i) {
        var a = i.querySelector("#cookie-btn"),
            u = document.querySelector("html");
        a.addEventListener("click", function() {
            document.cookie = "cklp=agree", i.classList.add("disabled"), u.setAttribute("data-clp", "false")
        })
    }
    document.querySelectorAll(".fq-item").forEach(function(e) {
        e.querySelector(".fq-head").addEventListener("click", function() {
            e.classList.toggle("closed")
        })
    });
    var s = document.querySelector(".scroll-up");
    if (null !== s) {
        var d = function e() {
                f += Math.pow(f, .4), window.scrollBy(0, -f), 1 < window.pageYOffset ? requestAnimationFrame(e) : window.scrollTo(0, 0)
            },
            f = 5;
        window.addEventListener("scroll", function() {
            400 <= pageYOffset ? s.classList.add("visible") : s.classList.remove("visible")
        }), s.addEventListener("click", function(e) {
            e.preventDefault(), f = 5, requestAnimationFrame(d)
        })
    }
    var m = document.querySelectorAll(".mb-tst .col-2"),
        v = document.querySelectorAll(".products-head .col-2");

    function b(e, t) {
        document.querySelectorAll("".concat(e)).forEach(function(e) {
            e.innerHTML = t
        })
    }
    m.forEach(function(e) {
        e.addEventListener("mouseenter", function() {
            v.forEach(function(e) {
                e.classList.remove("active")
            })
        })
    });
    var g = document.querySelector("header");
    if (-1 !== document.cookie.indexOf("try_now=20")) {
        var h = g.getAttribute("data-button-translate");
        b("header .l-side .buy-now-button div", h), b(".main-block .button-box .button.button-green span", h), b(".main-block .button-box-mobile .button.button-green span", h), b(".features-box .l-side .button-box .button.button-green span", h)
    }
}();
"use strict";
"use strict";

function initGA() {
    function c(t) {
        var e = t.dataset.namePeriod ? " ".concat(t.dataset.namePeriod) : "";
        ga("send", "event", t.dataset.gaGroup, "".concat(t.dataset.gaDetails).concat(e), window.location.pathname)
    }
    document.querySelectorAll("[data-ga-event]").forEach(function(t) {
        var e, a, n = function(t) {
            switch (t) {
                case "onClick":
                    return "click";
                case "onSelect":
                    return "change";
                default:
                    return !1
            }
        }(t.dataset.gaEvent);
        n ? (a = n, (e = t).addEventListener("".concat(a), function() {
            c("onSelect" === e.dataset.gaEvent ? e.querySelector("option:checked") : e)
        })) : "onLoad" === t.dataset.gaEven && setTimeout(function() {
            c(t)
        }, 3e3)
    })
}
"use strict";
! function() {
    var t = [].slice.call(document.querySelectorAll(".b-lazy"));
    if ("IntersectionObserver" in window) {
        var r = new IntersectionObserver(function(t) {
            t.forEach(function(t) {
                if (t.isIntersecting) {
                    var e = t.target;
                    "IMG" === e.tagName ? e.src = e.getAttribute("data-src") : e.style.backgroundImage = "url(".concat(e.getAttribute("data-src"), ")"), e.removeAttribute("data-src"), r.unobserve(e)
                }
            })
        });
        t.forEach(function(t) {
            r.observe(t)
        })
    } else t.forEach(function(t) {
        "IMG" === t.tagName ? t.setAttribute("src", t.getAttribute("data-src")) : t.style.backgroundImage = "url(".concat(t.getAttribute("data-src"), ")"), t.removeAttribute("data-src")
    })
}();