! function(t) {
    "use strict";
    var e = t(window),
        a = t("body"),
        o = t(document);

    function i() {
        return e.width()
    }
    "ontouchstart" in document.documentElement || a.addClass("no-touch");
    var n = i();
    e.on("resize", function() {
        n = i()
    });
    var s = t(".is-sticky"),
        l = t(".topbar"),
        r = t(".topbar-wrap");
    /*if (s.length > 0) {
        var c = s.offset();
        e.scroll(function() {
            var t = e.scrollTop(),
                a = l.height();
            t > c.top ? s.hasClass("has-fixed") || (s.addClass("has-fixed"), r.css("padding-top", a)) : s.hasClass("has-fixed") && (s.removeClass("has-fixed"), r.css("padding-top", 0))
        })
    }*/
    var d = t("[data-percent]");
    d.length > 0 && d.each(function() {
        var e = t(this),
            a = e.data("percent");
        e.css("width", a + "%")
    });
    var g = window.location.href,
        h = g.split("#"),
        f = t("a");
    f.length > 0 && f.each(function() {
        g === this.href && "" !== h[1] && t(this).closest("li").addClass("active").parent().closest("li").addClass("active")
    });
    var p = t(".countdown-clock");
    p.length > 0 && p.each(function() {
        var e = t(this),
            a = e.attr("data-date");
        e.countdown(a).on("update.countdown", function(e) {
            t(this).html(e.strftime('<div><span class="countdown-time countdown-time-first">%D</span><span class="countdown-text">Day</span></div><div><span class="countdown-time">%H</span><span class="countdown-text">Hour</span></div><div><span class="countdown-time">%M</span><span class="countdown-text">Min</span></div><div><span class="countdown-time countdown-time-last">%S</span><span class="countdown-text">Sec</span></div>'))
        })
    });
    var v = t(".select");
    v.length > 0 && v.each(function() {
        t(this).select2({
            theme: "flat"
        })
    });
    var u = t(".select-bordered");
    u.length > 0 && u.each(function() {
        t(this).select2({
            theme: "flat bordered"
        })
    });
    var m = ".toggle-tigger";
    t(m).length > 0 && o.on("click", m, function(e) {
        var a = t(this);
        t(m).not(a).removeClass("active"), t(".toggle-class").not(a.parent().children()).removeClass("active"), a.toggleClass("active").parent().find(".toggle-class").toggleClass("active"), e.preventDefault()
    }), o.on("click", "body", function(e) {
        var a = t(m),
            o = t(".toggle-class");
        o.is(e.target) || 0 !== o.has(e.target).length || a.is(e.target) || 0 !== a.has(e.target).length || (o.removeClass("active"), a.removeClass("active"))
    });
    var C = t(".toggle-nav"),
        b = t(".navbar");

    function w(t) {
        n < 991 ? t.delay(500).addClass("navbar-mobile") : t.delay(500).removeClass("navbar-mobile")
    }
    C.length > 0 && C.on("click", function(t) {
        C.toggleClass("active"), b.toggleClass("active"), t.preventDefault()
    }), o.on("click", "body", function(t) {
        C.is(t.target) || 0 !== C.has(t.target).length || b.is(t.target) || 0 !== b.has(t.target).length || (C.removeClass("active"), b.removeClass("active"))
    }), w(b), e.on("resize", function() {
        w(b)
    });
    var y = t('[data-toggle="tooltip"]');
    y.length > 0 && y.tooltip();
    var k = t(".date-picker"),
        x = t(".date-picker-dob"),
        S = t(".time-picker");

    function T(e, a) {
        "success" === a ? t(e).parent().find(".copy-feedback").text("Copied to Clipboard").fadeIn().delay(1e3).fadeOut() : t(e).parent().find(".copy-feedback").text("Faild to Copy").fadeIn().delay(1e3).fadeOut()
    }
    k.length > 0 && k.each(function() {
        t(this).datepicker({
            format: "mm/dd/yyyy",
            maxViewMode: 2,
            clearBtn: !0,
            autoclose: !0,
            todayHighlight: !0
        })
    }), x.length > 0 && x.each(function() {
        t(this).datepicker({
            format: "mm/dd/yyyy",
            startView: 2,
            maxViewMode: 2,
            clearBtn: !0,
            autoclose: !0
        })
    }), S.length > 0 && S.each(function() {
        t(this).parent().addClass("has-timepicker"), t(this).timepicker({
            timeFormat: "HH:mm",
            interval: 15
        })
    }), new ClipboardJS(".copy-clipboard").on("success", function(t) {
        T(t.trigger, "success"), t.clearSelection()
    }).on("error", function(t) {
        T(t.trigger, "fail")
    }), new ClipboardJS(".copy-clipboard-modal", {
        container: document.querySelector(".modal")
    }).on("success", function(t) {
        T(t.trigger, "success"), t.clearSelection()
    }).on("error", function(t) {
        T(t.trigger, "fail")
    });
    var L = t(".knob");
    L.length > 0 && L.each(function() {
        t(this).knob({
            readOnly: !0,
            displayInput: !1
        })
    });
    var z = t(".switch-toggle"),
        D = t(".switch-toggle-link"),
        F = ".switch-content";

    function _(e, a, o) {
        e.length > 0 && e.each(function() {
            "add" === o && t(this).data("switch") === a.data("switch") && t(this).addClass("link-disable"), "remove" === o && t(this).data("switch") === a.data("switch") && t(this).removeClass("link-disable")
        })
    }
    z.length > 0 && z.each(function() {
        t(this).on("change", function() {
            var e = t(this),
                a = e.data("switch");
            e.is(":checked") ? (t(F + "." + a).addClass("switch-active").slideDown(300), _(D, t(this), "remove")) : e.is(":checked") || (t(F + "." + a).removeClass("switch-active").slideUp(300), _(D, t(this), "add"))
        }), t(this).is(":checked") ? (t(F + "." + t(this).data("switch")).addClass("switch-active").slideDown(100), _(D, t(this), "remove")) : (t(F + "." + t(this).data("switch")).removeClass("switch-active").slideUp(100), _(D, t(this), "add"))
    }), D.length > 0 && D.each(function() {
        t(this).on("click", function(e) {
            var a = t(this),
                o = a.data("switch");
            if (a.hasClass("link-disable")) return !1;
            t(F + "." + o).toggleClass("switch-active").slideToggle(300), e.preventDefault()
        })
    });
    var M = t(".input-file");
    M.length > 0 && M.each(function() {
        var e = t(this),
            a = t(this).next(),
            o = t(this).next().text();
        e.on("change", function() {
            var t = e.val();
            a.html(t), a.is(":empty") && a.html(o)
        })
    });
    var O = t(".upload-zone");
    O.length > 0 && (Dropzone.autoDiscover = !1, O.each(function() {
        t(this).addClass("dropzone").dropzone({
            url: "/images"
        })
    }));
    var A = t(".image-popup");
    A.length > 0 && A.magnificPopup({
        type: "image",
        preloader: !0,
        removalDelay: 400,
        mainClass: "mfp-fade"
    });
    var B = t(".dt-init");
    B.length > 0 && B.each(function() {
        var e = t(this),
            a = e.data("items") ? e.data("items") : 5;
        e.DataTable({
            ordering: !1,
            autoWidth: !1,
            dom: '<"table-wrap"t><"row align-items-center"<"col-md-9"p><"col-md-3 text-left text-md-right"i>>',
            pageLength: a,
            bPaginate: t(".data-table tbody tr").length > a,
            iDisplayLength: a,
            language: {
                search: "",
                searchPlaceholder: "Type in to Search",
                info: "_START_ -_END_ of _TOTAL_",
                infoEmpty: "No records",
                infoFiltered: "( Total _MAX_  )",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Prev"
                }
            }
        })
    });
    var P = t(".dt-filter-init");
    if (P.length > 0) {
        var I = P.DataTable({
            ordering: !1,
            autoWidth: !1,
            dom: '<"row justify-content-between pdb-1x"<"col-9 col-sm-6 text-left"f><"col-3 text-right"<"data-table-filter relative d-inline-block">>><"table-wrap"t><"row align-items-center"<"col-md-9"p><"col-md-3 text-left text-md-right"i>>',
            pageLength: 6,
            bPaginate: t(".data-table tbody tr").length > 6,
            iDisplayLength: 6,
            language: {
                search: "",
                searchPlaceholder: "Type in to Search",
                info: "_START_ -_END_ of _TOTAL_",
                infoEmpty: "No records",
                infoFiltered: "( Total _MAX_  )",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Prev"
                }
            }
        });
        t(".data-filter").on("change", function() {
            var e = t(this).val(),
                a = t(this).parents(".data-table-filter"),
                o = a.data("filter-col") ? a.data("filter-col") : "dt-filter";
            I.columns("." + o).search(e || "", !0, !1).draw()
        })
    }
    if (t("#tknSale").length > 0) {
        var H = document.getElementById("tknSale").getContext("2d");
        new Chart(H, {
            type: "line",
            data: {
                labels: ["01 Oct", "02 Oct", "03 Oct", "04 Oct", "05 Oct", "06 Oct", "07 Oct"],
                datasets: [{
                    label: "",
                    tension: .4,
                    backgroundColor: "transparent",
                    borderColor: "#2c80ff",
                    pointBorderColor: "#2c80ff",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 2,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#2c80ff",
                    pointHoverBorderWidth: 2,
                    pointRadius: 6,
                    pointHitRadius: 6,
                    data: [110, 80, 125, 55, 95, 75, 90]
                }]
            },
            options: {
                legend: {
                    display: !1
                },
                maintainAspectRatio: !1,
                tooltips: {
                    callbacks: {
                        title: function(t, e) {
                            return "Date : " + e.labels[t[0].index]
                        },
                        label: function(t, e) {
                            return e.datasets[0].data[t.index] + " Tokens"
                        }
                    },
                    backgroundColor: "#eff6ff",
                    titleFontSize: 13,
                    titleFontColor: "#6783b8",
                    titleMarginBottom: 10,
                    bodyFontColor: "#9eaecf",
                    bodyFontSize: 14,
                    bodySpacing: 4,
                    yPadding: 15,
                    xPadding: 15,
                    footerMarginTop: 5,
                    displayColors: !1
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: !0,
                            fontSize: 12,
                            fontColor: "#9eaecf"
                        },
                        gridLines: {
                            color: "#e5ecf8",
                            tickMarkLength: 0,
                            zeroLineColor: "#e5ecf8"
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 12,
                            fontColor: "#9eaecf",
                            source: "auto"
                        },
                        gridLines: {
                            color: "transparent",
                            tickMarkLength: 20,
                            zeroLineColor: "#e5ecf8"
                        }
                    }]
                }
            }
        })
    }
    window.pieColors = {
        pieColor1: "#00d285",
        pieColor2: "#ffc100"
    };
    if (t("#phaseStatus").length > 0) {
        var E = document.getElementById("phaseStatus").getContext("2d");
        new Chart(E, {
            type: "doughnut",
            data: {
                labels: ["Sold", "Unsold Tokens"],
                datasets: [{
                    label: "7960000",
                    lineTension: 0,
                    backgroundColor: [window.pieColors.pieColor1, window.pieColors.pieColor2],
                    borderColor: "#fff",
                    borderWidth: 2,
                    hoverBorderColor: "#fff",
                    data: [15.74, 84.26]
                }]
            },
            options: {
                legend: {
                    display: !1,
                    labels: {
                        boxWidth: 10,
                        fontColor: "#000"
                    }
                },
                rotation: -1.6,
                cutoutPercentage: 80,
                maintainAspectRatio: !1,
                tooltips: {
                    callbacks: {
                        title: function(t, e) {
                            return e.labels[t[0].index]
                        },
                        label: function(t, e) {
                            return e.datasets[0].data[t.index] + " %"
                        }
                    },
                    backgroundColor: "#eff6ff",
                    titleFontSize: 13,
                    titleFontColor: "#6783b8",
                    titleMarginBottom: 10,
                    bodyFontColor: "#9eaecf",
                    bodyFontSize: 14,
                    bodySpacing: 4,
                    yPadding: 15,
                    xPadding: 15,
                    footerMarginTop: 5,
                    displayColors: !1
                }
            }
        })
    }
    if (t("#regStatistics").length > 0) {
        var N = document.getElementById("regStatistics").getContext("2d");
        new Chart(N, {
            type: "bar",
            data: {
                labels: ["S", "S", "M", "T", "W", "T", "F", "S", "S", "M", "T", "W", "T", "F", "S"],
                datasets: [{
                    label: "",
                    lineTension: 0,
                    backgroundColor: "#2b56f5",
                    borderColor: "#2b56f5",
                    barThickness: .4,
                    data: [3, 9, 5, 7, 10, 6, 2, 3, 9, 5, 7, 10, 6, 2, 3]
                }]
            },
            options: {
                legend: {
                    display: !1
                },
                maintainAspectRatio: !1,
                tooltips: {
                    enabled: !1
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: !0,
                            fontSize: 10,
                            fontColor: "#9eaecf"
                        },
                        gridLines: {
                            color: "transparent",
                            tickMarkLength: 0,
                            zeroLineColor: "transparent"
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 9,
                            fontColor: "#9eaecf",
                            source: "auto"
                        },
                        gridLines: {
                            color: "transparent",
                            tickMarkLength: 7,
                            zeroLineColor: "transparent"
                        }
                    }]
                }
            }
        })
    }
    t(".modal").on("shown.bs.modal", function() {
        a.hasClass("modal-open") || a.addClass("modal-open")
    });
    var R = t(".drop-toggle");
    R.length > 0 && R.on("click", function(a) {
        e.width() < 991 && (t(this).parent().children(".navbar-dropdown").slideToggle(400), t(this).parent().siblings().children(".navbar-dropdown").slideUp(400), t(this).parent().toggleClass("current"), t(this).parent().siblings().removeClass("current"), a.preventDefault())
    });
    var W = t(".form-validate");
    W.length > 0 && W.each(function() {
        t(this).validate()
    });
    var V = t(".wizard-wrap").show();
    V.steps({
        headerTag: ".wizard-head",
        bodyTag: ".wizard-content",
        labels: {
            finish: "Submit",
            next: "Next",
            previous: "Prev",
            loading: "Loading ..."
        },
        onStepChanging: function(t, e, a) {
            return e > a || (e < a && (V.find(".body:eq(" + a + ") label.error").remove(), V.find(".body:eq(" + a + ") .error").removeClass("error")), V.validate().settings.ignore = ":disabled,:hidden", V.valid())
        },
        onFinishing: function(t, e) {
            return V.validate().settings.ignore = ":disabled", V.valid()
        },
        onFinished: function(t, e) {
            window.location.href = "thank-you.html"
        }
    }).validate({
        errorPlacement: function(t, e) {
            e.after(t)
        }
    });
    var j = t(".chat-wrap"),
        U = t(".chat-information-wrap"),
        X = t(".chat-contacts"),
        q = t(".show-information"),
        J = t(".chat-contact-trigger");
    q.length > 0 && q.on("click", function(t) {
        q.toggleClass("active"), U.toggleClass("active"), X.toggleClass("short"), j.toggleClass("information-active"), t.preventDefault()
    }), J.length > 0 && J.on("click", function(t) {
        X.toggleClass("active"), j.toggleClass("contact-active"), t.preventDefault()
    });
    var Z = t(".chat-messages-search"),
        Q = t(".show-search");
    Q.length > 0 && Q.on("click", function(e) {
        t(this).toggleClass("active"), Z.toggleClass("active"), e.preventDefault()
    }), o.on("click", "body", function(t) {
        J.is(t.target) || 0 !== J.has(t.target).length || X.is(t.target) || 0 !== X.has(t.target).length || (X.removeClass("active"), j.removeClass("contact-active")), !q.is(t.target) && 0 === q.has(t.target).length && !U.is(t.target) && 0 === U.has(t.target).length && e.width() < 992 && (q.removeClass("active"), U.removeClass("active"), X.removeClass("short"), j.removeClass("information-active")), Q.is(t.target) || 0 !== Q.has(t.target).length || Z.is(t.target) || 0 !== Z.has(t.target).length || (Q.removeClass("active"), Z.removeClass("active"))
    });
    var G = t(".load-timeline");
    G.length > 0 && G.on("click", function(e) {
        e.preventDefault();
        var a = t(this),
            o = a.data("target"),
            i = a.data("show") ? a.data("show") : 5;
        if (o) {
            var n = t("#" + o).find(".hidden");
            n.length > 0 && (n.slice(0, i).removeClass("hidden"), n.length <= i && (a.parent().fadeOut("slow"), t("#" + o).addClass("loaded")))
        }
    });
    var K = t(".color-trigger");
    K.length > 0 && K.on("click", function() {
        var e = t(this).attr("title");
        return t("body").fadeOut(function() {
            t("#layoutstyle").attr("href", "assets/css/" + e + ".css"), t(this).delay(150).fadeIn()
        }), !1
    });
    var Y = t(".promo-trigger"),
        $ = t(".promo-content"),
        tt = t(".promo-close");
    tt.length > 0 && tt.on("click", function() {
        var t = Cookies.get("twz-offer");
        return $.removeClass("active"), Y.addClass("active"), null == t && Cookies.set("twz-offer", "true", {
            expires: 1,
            path: ""
        }), !1
    }), e.on("load", function() {
        null == Cookies.get("twz-offer") ? $.addClass("active") : Y.addClass("active")
    })
}(jQuery);