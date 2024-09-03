$(document).ready(function () {
    $("#summernote").summernote({
        height: 300, // Tinggi editor
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "italic", "underline", "clear"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["insert", ["link", "picture", "video", "preCode"]],
            ["view", ["fullscreen", "codeview", "help"]],
        ],
        buttons: {
            preCode: function () {
                var ui = $.summernote.ui;
                return ui
                    .button({
                        contents: '<i class="note-icon-code"/> PreCode',
                        tooltip: "Insert Code Block",
                        click: function () {
                            // Sisipkan template kode <pre><code>
                            var node = $("<pre><code></code></pre>")[0];
                            $("#summernote").summernote("insertNode", node);
                        },
                    })
                    .render();
            },
        },
    });

    $("#summernote").on("summernote.hide", function () {
        $(".modal-backdrop").remove();
    });

    $("#summernote").on("click", function () {
        $(".modal-backdrop").remove();
    });
});
