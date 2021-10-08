$(document).ready(function (){

    $('.task_delete').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id: $(this).attr('data-task-id'),
                name: $(this).attr('data-task-name')
            },
            dataType: 'json',
            success: function (res) {

                if (res.delete == "Y") {
                    var message = "<div class=\"ui-alert ui-alert-success js-alert\"><span class=\"ui-alert-message\">Задача "+ res.name + " удалена.</span></div>";

                    $('.padding-up').prepend(message);

                    $.ajax({
                        url: '',
                        method: 'POST',
                        data: $(this).serializeArray(),
                        dataType: 'html',
                        success: function (res) {
                            var a = $('.js-line-task', res);
                            $('.js-line-task').html(a.html());
                        }
                    })

                    setTimeout(function () {
                        $(".js-alert").remove();
                    }, 3000);
                } else {
                    var messageError = "<div class=\"ui-alert ui-alert-danger js-alert\"><span class=\"ui-alert-message\">Задача "+ res.name + " не удалена.</span></div>";
                    $('.padding-up').prepend(messageError);
                }

            }
        })

    })

})