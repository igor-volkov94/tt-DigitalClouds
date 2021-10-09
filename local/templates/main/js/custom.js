$(document).ready(function (){
    initActionDel();
    initTaskDel();
    //открытие формы
    $(document).on("click", ".js_modal", function(e) {
        initActionEdit();
        e.preventDefault();// отменяем переход по ссылке
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: "POST",
            data: {},
            success: function(data) {
                $("body").append(data);
                initActionEdit();
                initTaskEdit();
            }
        });
    });

    //закрытие формы
    $(document).on("click", ".close_form", function(e) {
        e.preventDefault();
        $(".modal_background").hide().remove();
        initActionDel();
        initTaskDel();
    });
});

function initActionDel () {
    $('.table-hover').each(function () {
        var del = $(this).find('.user_delete');

        del.on('click', function (e) {
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
                        var message = "<div class=\"ui-alert ui-alert-success js-alert\"><span class=\"ui-alert-message\">Пользователь " + res.fullName + " удален.</span></div>";

                        $('.padding-up').prepend(message);

                        $.ajax({
                            url: '',
                            method: 'POST',
                            data: $(this).serializeArray(),
                            dataType: 'html',
                            success: function (res) {
                                $('#user_' + user).remove();
                            }
                        })

                        setTimeout(function () {
                            $(".js-alert").remove();
                        }, 2000);
                    } else {
                        var messageError = "<div class=\"ui-alert ui-alert-danger js-alert\"><span class=\"ui-alert-message\">Пользователь " + res.fullName + " занят в задаче.</span></div>";
                        $('.padding-up').prepend(messageError);
                    }

                }
            })

        })
    })
}

function initActionEdit () {
    $('.modal_form').each(function () {
        var edit = $(this).find('.js-user-form');

        edit.on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/local/ajax/modal/modalUser.php',
                method: 'POST',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function (res) {

                    if (res.success == "Y") {
                        $('.modal-windows').empty().prepend(res.message);

                        $.ajax({
                            url: '',
                            method: 'POST',
                            data: $(this).serializeArray(),
                            dataType: 'html',
                            success: function (res) {
                                var a = $('.js-line-user', res);
                                $('.js-line-user').html(a.html());
                                initActionDel();
                            }
                        })

                        setTimeout(function () {
                            $(".modal_background").hide().remove();
                        }, 2000);
                    }

                    if (res.success == "error") {
                        $('.modal-windows').prepend("<div class=\"ui-alert ui-alert-danger\"><span class=\"ui-alert-message\"><strong>Внимание!</strong>" + res.error + "</span></div>")
                    }

                }
            })
        })
    })
}

function initTaskDel () {
    $('.table-hover').each(function () {
        var del = $(this).find('.task_delete');
        del.on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var task = $(this).attr('data-task-id');

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
                        var message = "<div class=\"ui-alert ui-alert-success js-alert\"><span class=\"ui-alert-message\">Задача " + res.name + " удалена.</span></div>";

                        $('.padding-up').prepend(message);

                        $.ajax({
                            url: '',
                            method: 'POST',
                            data: $(this).serializeArray(),
                            dataType: 'html',
                            success: function (res) {
                                $('#task_' + task).remove();
                            }
                        })

                        setTimeout(function () {
                            $(".js-alert").remove();
                        }, 2000);
                    } else {
                        var messageError = "<div class=\"ui-alert ui-alert-danger js-alert\"><span class=\"ui-alert-message\">Задача " + res.name + " не удалена.</span></div>";
                        $('.padding-up').prepend(messageError);
                    }

                }
            })

        })
    })
}

function initTaskEdit () {
    $('.modal_form').each(function () {
        var edit = $(this).find('.js-task-form');

        edit.on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/local/ajax/modal/modalTask.php',
                method: 'POST',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function (res) {

                    if (res.success == "Y") {
                        $('.modal-windows').empty().prepend(res.message);

                        $.ajax({
                            url: '',
                            method: 'POST',
                            data: $(this).serializeArray(),
                            dataType: 'html',
                            success: function (res) {
                                var a = $('.js-line-task', res);
                                $('.js-line-task').html(a.html());
                                initTaskDel();
                            }
                        })

                        setTimeout(function () {
                            $(".modal_background").hide().remove();
                        }, 2000);
                    }

                    if (res.success == "error") {
                        $('.modal-windows').prepend("<div class=\"ui-alert ui-alert-danger\"><span class=\"ui-alert-message\"><strong>Внимание!</strong>"+res.error+"</span></div>")
                    }
                }
            })
        })
    })
}