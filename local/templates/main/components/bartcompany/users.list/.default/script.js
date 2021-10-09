$(document).ready(function (){

    $('.user_delete').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var user = $(this).attr('data-user-id');

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id: $(this).attr('data-user-id'),
                fullName: $(this).attr('data-user-fullName')
            },
            dataType: 'json',
            success: function (res) {

                if (res.delete == "Y") {
                    var message = "<div class=\"ui-alert ui-alert-success js-alert\"><span class=\"ui-alert-message\">Пользователь "+ res.fullName + " удален.</span></div>";

                    $('.padding-up').prepend(message);

                    $.ajax({
                        url: '',
                        method: 'POST',
                        data: $(this).serializeArray(),
                        dataType: 'html',
                        success: function (res) {
                            $('#user_'+ user).remove();
                        }
                    })

                    setTimeout(function () {
                        $(".js-alert").remove();
                    }, 2000);
                } else {
                    var messageError = "<div class=\"ui-alert ui-alert-danger js-alert\"><span class=\"ui-alert-message\">Пользователь "+ res.fullName + " занят в задаче.</span></div>";
                    $('.padding-up').prepend(messageError);
                }

            }
        })

    })

})
