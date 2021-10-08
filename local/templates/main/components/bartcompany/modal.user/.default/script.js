$(document).ready(function (){

    $('.js-user-form').on('submit', function (e) {
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