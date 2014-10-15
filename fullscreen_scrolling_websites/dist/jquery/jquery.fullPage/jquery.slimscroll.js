/*! Copyright (c) 2011 Piotr Rochala (http://rocha.la)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Version: 1.3.2 (modified for fullpage.js)
 *
 */
(function(f) {
    jQuery.fn.extend({
        slimScroll: function(g) {
            var a = f.extend({
                width: "auto",
                height: "250px",
                size: "7px",
                color: "#000",
                position: "right",
                distance: "1px",
                start: "top",
                opacity: .4,
                alwaysVisible: !1,
                disableFadeOut: !1,
                railVisible: !1,
                railColor: "#333",
                railOpacity: .2,
                railDraggable: !0,
                railClass: "slimScrollRail",
                barClass: "slimScrollBar",
                wrapperClass: "slimScrollDiv",
                allowPageScroll: !1,
                wheelStep: 20,
                touchScrollStep: 200,
                borderRadius: "7px",
                railBorderRadius: "7px"
            }, g);
            this.each(function() {
                function s(d) {
                    d = d || window.event;
                    var c = 0;
                    d.wheelDelta && (c = -d.wheelDelta / 120);
                    d.detail && (c = d.detail / 3);
                    f(d.target || d.srcTarget || d.srcElement).closest("." + a.wrapperClass).is(b.parent()) && m(c, !0);
                    d.preventDefault && !k && d.preventDefault();
                    k || (d.returnValue = !1)
                }

                function m(d, f, g) {
                    k = !1;
                    var e = d,
                        h = b.outerHeight() - c.outerHeight();
                    f && (e = parseInt(c.css("top")) + d * parseInt(a.wheelStep) / 100 * c.outerHeight(), e = Math.min(Math.max(e, 0), h), e = 0 < d ? Math.ceil(e) : Math.floor(e), c.css({
                        top: e + "px"
                    }));
                    l = parseInt(c.css("top")) / (b.outerHeight() - c.outerHeight());
                    e = l * (b[0].scrollHeight - b.outerHeight());
                    g && (e = d, d = e / b[0].scrollHeight * b.outerHeight(), d = Math.min(Math.max(d, 0), h), c.css({
                        top: d + "px"
                    }));
                    b.scrollTop(e);
                    b.trigger("slimscrolling", ~~e);
                    u();
                    p()
                }

                function C() {
                    window.addEventListener ? (this.addEventListener("DOMMouseScroll", s, !1), this.addEventListener("mousewheel", s, !1)) : document.attachEvent("onmousewheel", s)
                }

                function v() {
                    r = Math.max(b.outerHeight() / b[0].scrollHeight * b.outerHeight(), D);
                    c.css({
                        height: r + "px"
                    });
                    var a = r == b.outerHeight() ? "none" : "block";
                    c.css({
                        display: a
                    })
                }

                function u() {
                    v();
                    clearTimeout(A);
                    l == ~~l ? (k = a.allowPageScroll, B != l && b.trigger("slimscroll", 0 == ~~l ? "top" : "bottom")) : k = !1;
                    B = l;
                    r >= b.outerHeight() ? k = !0 : (c.stop(!0, !0).fadeIn("fast"), a.railVisible && h.stop(!0, !0).fadeIn("fast"))
                }

                function p() {
                    a.alwaysVisible || (A = setTimeout(function() {
                        a.disableFadeOut && w || x || y || (c.fadeOut("slow"), h.fadeOut("slow"))
                    }, 1E3))
                }
                var w, x, y, A, z, r, l, B, D = 30,
                    k = !1,
                    b = f(this);
                if (b.parent().hasClass(a.wrapperClass)) {
                    var n = b.scrollTop(),
                        c = b.parent().find("." + a.barClass),
                        h = b.parent().find("." +
                            a.railClass);
                    v();
                    if (f.isPlainObject(g)) {
                        if ("height" in g && "auto" == g.height) {
                            b.parent().css("height", "auto");
                            b.css("height", "auto");
                            var q = b.parent().parent().height();
                            b.parent().css("height", q);
                            b.css("height", q)
                        }
                        if ("scrollTo" in g) n = parseInt(a.scrollTo);
                        else if ("scrollBy" in g) n += parseInt(a.scrollBy);
                        else if ("destroy" in g) {
                            c.remove();
                            h.remove();
                            b.unwrap();
                            return
                        }
                        m(n, !1, !0)
                    }
                } else {
                    a.height = "auto" == g.height ? b.parent().height() : g.height;
                    n = f("<div></div>").addClass(a.wrapperClass).css({
                        position: "relative",
                        overflow: "hidden",
                        width: a.width,
                        height: a.height
                    });
                    b.css({
                        overflow: "hidden",
                        width: a.width,
                        height: a.height
                    });
                    var h = f("<div></div>").addClass(a.railClass).css({
                            width: a.size,
                            height: "100%",
                            position: "absolute",
                            top: 0,
                            display: a.alwaysVisible && a.railVisible ? "block" : "none",
                            "border-radius": a.railBorderRadius,
                            background: a.railColor,
                            opacity: a.railOpacity,
                            zIndex: 90
                        }),
                        c = f("<div></div>").addClass(a.barClass).css({
                            background: a.color,
                            width: a.size,
                            position: "absolute",
                            top: 0,
                            opacity: a.opacity,
                            display: a.alwaysVisible ?
                                "block" : "none",
                            "border-radius": a.borderRadius,
                            BorderRadius: a.borderRadius,
                            MozBorderRadius: a.borderRadius,
                            WebkitBorderRadius: a.borderRadius,
                            zIndex: 99
                        }),
                        q = "right" == a.position ? {
                            right: a.distance
                        } : {
                            left: a.distance
                        };
                    h.css(q);
                    c.css(q);
                    b.wrap(n);
                    b.parent().append(c);
                    b.parent().append(h);
                    a.railDraggable && c.bind("mousedown", function(a) {
                        var b = f(document);
                        y = !0;
                        t = parseFloat(c.css("top"));
                        pageY = a.pageY;
                        b.bind("mousemove.slimscroll", function(a) {
                            currTop = t + a.pageY - pageY;
                            c.css("top", currTop);
                            m(0, c.position().top, !1)
                        });
                        b.bind("mouseup.slimscroll", function(a) {
                            y = !1;
                            p();
                            b.unbind(".slimscroll")
                        });
                        return !1
                    }).bind("selectstart.slimscroll", function(a) {
                        a.stopPropagation();
                        a.preventDefault();
                        return !1
                    });
                    h.hover(function() {
                        u()
                    }, function() {
                        p()
                    });
                    c.hover(function() {
                        x = !0
                    }, function() {
                        x = !1
                    });
                    b.hover(function() {
                        w = !0;
                        u();
                        p()
                    }, function() {
                        w = !1;
                        p()
                    });
                    b.bind("touchstart", function(a, b) {
                        a.originalEvent.touches.length && (z = a.originalEvent.touches[0].pageY)
                    });
                    b.bind("touchmove", function(b) {
                        k || b.originalEvent.preventDefault();
                        b.originalEvent.touches.length &&
                            (m((z - b.originalEvent.touches[0].pageY) / a.touchScrollStep, !0), z = b.originalEvent.touches[0].pageY)
                    });
                    v();
                    "bottom" === a.start ? (c.css({
                        top: b.outerHeight() - c.outerHeight()
                    }), m(0, !0)) : "top" !== a.start && (m(f(a.start).position().top, null, !0), a.alwaysVisible || c.hide());
                    C()
                }
            });
            return this
        }
    });
    jQuery.fn.extend({
        slimscroll: jQuery.fn.slimScroll
    })
})(jQuery);