!(function (NioApp) {
    "use strict";
    (NioApp.Quill = function (selector, opt) {
        let elm = document.querySelectorAll(selector);
        "undefined" != elm &&
            null != elm &&
            elm.forEach((item) => {
                let toolbarConfig = {
                        default: [
                            ["bold", "italic", "underline", "strike"],
                            ["blockquote", "code-block"],
                            [{ list: "ordered" }, { list: "bullet" }],
                            [{ script: "sub" }, { script: "super" }],
                            [{ indent: "-1" }, { indent: "+1" }],
                            [{ header: [1, 2, 3, 4, 5, 6] }],
                            [{ color: [] }, { background: [] }],
                            [{ font: [] }],
                            [{ align: [] }],
                            ["clean"],
                        ],
                        minimal: [
                            ["bold", "italic", "underline"],
                            ["blockquote", { list: "bullet" }],
                            [
                                { header: 1 },
                                { header: 2 },
                                { header: [3, 4, 5, 6, !1] },
                            ],
                            [{ align: [] }],
                            ["clean"],
                        ],
                    },
                    placeholder = item.dataset.placeholder
                        ? item.dataset.placeholder
                        : null,
                    readOnly =
                        !!item.dataset.readOnly &&
                        JSON.parse(item.dataset.readOnly),
                    toolbar = item.dataset.toolbar
                        ? item.dataset.toolbar.includes("#", 0)
                            ? item.dataset.toolbar
                            : eval("toolbarConfig." + item.dataset.toolbar)
                        : toolbarConfig.default,
                    quill = new Quill(item, {
                        placeholder: placeholder,
                        readOnly: readOnly,
                        modules: { toolbar: toolbar },
                        theme: "snow",
                    });
            });
    }),
        (NioApp.Quill.init = function () {
            NioApp.Quill(".js-quill");
        }),
        NioApp.winLoad(NioApp.Quill.init);
})(NioApp);
