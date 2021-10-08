$(document).ready(function (){

    $('.task_delete').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/local/ajax/deleteUser.php',
            method: 'POST',
            data: {
                id: $(this).attr('data-user-id'),
                fullName: $(this).attr('data-user-fullName')
            },
            dataType: 'json',
            success: function (res) {

                if (res.delete == "Y") {
                    $('.padding-up').prepend("<div class=\"ui-alert ui-alert-success js-alert\"><span class=\"ui-alert-message\">Пользователь "+ res.fullName + " удален.</span></div>")

                    $.ajax({
                        url: '',
                        method: 'POST',
                        data: $(this).serializeArray(),
                        dataType: 'html',
                        success: function (res) {
                            var a = $('.js-line-user', res);
                            $('.js-line-user').html(a.html());
                        }
                    })

                    setTimeout(function () {
                        $(".js-alert").remove();
                    }, 3000);
                }

            }
        })
    })

})