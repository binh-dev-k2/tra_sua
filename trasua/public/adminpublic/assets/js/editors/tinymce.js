!(function (t) {
    "use strict";
    (t.Tinymce = function (t, e) {
        let n = document.querySelectorAll(t);
        "undefined" != n &&
            null != n &&
            n.forEach((t) => {
                let e = t.id,
                    n = !t.dataset.toolbar || JSON.parse(t.dataset.toolbar),
                    i = !t.dataset.menubar || JSON.parse(t.dataset.menubar),
                    a = !!t.dataset.inline && JSON.parse(t.dataset.inline),
                    s = t.dataset.height ? parseInt(t.dataset.height) : 300;
                tinymce.init({
                    selector: "#" + e,
                    content_css: !1,
                    height: s,
                    skin: !1,
                    branding: !1,
                    toolbar: n,
                    menubar: i,
                    inline: a,
                });
            });
    }),
        (t.Tinymce.init = function () {
            t.Tinymce(".js-tinymce");
        }),
        t.winLoad(t.Tinymce.init);
})(NioApp);
