$(function() {
    //открытие формы
    $(document).on("click", ".js_modal", function(e) {
        e.preventDefault();// отменяем переход по ссылке

        $.ajax({
            url: "/local/ajax/modal/addUser.php",
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
