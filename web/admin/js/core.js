$.validator.setDefaults({
    highlight: function (e) {
        $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
    },
    success: function (e) {
        e.closest(".form-group").removeClass("has-error").addClass("has-success")
    },
    errorElement: "span",
    errorPlacement: function (e, r) {
        e.appendTo(r.is(":radio") || r.is(":checkbox") ? r.parent().parent().parent() : r.parent())
    },
    errorClass: "help-block m-b-none",
    validClass: "help-block m-b-none"
}), $().ready(function () {
    $("#commentForm").validate();
    var e = "<i class='fa fa-times-circle'></i> ";
    $("#signupForm").validate({
        rules: {
            title: "required",
            source: "required",
            keyword: "required"
        },
        messages: {
            title: e + "请输入标题",
            source: e + "请输入来源",
            keyword: e + "请输入关键词"
        }
    })
    // , $(".tj").click(function () {
    //     var e = $("#cont").val();
    //     if (e.length < 0) {
    //         console.log('sdfs');
    //     }
    // })
});
