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


function submitForm(evt) {
    evt.preventDefault();
    var self = this;

    $.ajax({
        url: self.action,
        data: new FormData(self),
        method: self.method,
        contentType: false,
        processData: false,
        success: function(resp) {
            var rForm = $('#' + self.id, resp);
            if (rForm) {
                $('#' + self.id).html(rForm.html());
            }
        }
    });
}

function submitFormHandler($formID) {
    var form = document.getElementById($formID);
    if (form) {
        form.removeEventListener('submit', submitForm);
        form.addEventListener('submit', submitForm);
    }
}