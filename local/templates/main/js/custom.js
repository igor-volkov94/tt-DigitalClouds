$(function() {
    //открытие формы
    $(document).on("click", ".js_modal", function(e) {
        e.preventDefault();// отменяем переход по ссылке
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: "POST",
            data: {},
            success: function(data) {
                $("body").append(data);
            }
        });
    });

    //закрытие формы
    $(document).on("click", ".close_form", function(e) {
        e.preventDefault();
        $(".modal_background").hide().remove();
    });
});
