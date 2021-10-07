<?php
/**
 * @var $APPLICATION
 * @var $arResult array
 * @var $this CBitrixComponentTemplate
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
\Bitrix\Main\UI\Extension::load("ui.alerts");

?>

<div class="modal-windows">
    <div class="col-md-8 mx-auto">
        <h4 class="mb-3">Добавление пользователя</h4>
        <form action="/local/ajax/modal/addUser.php" method="POST" class="form needs-validation js-add-user-form" data-form>
        <div class="row g-3">

            <div class="col-12">
                <label for="firstName" class="form-label">Имя</label>
                <input type="text" class="form-control" name="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <div class="col-12">
                <label for="lastName" class="form-label">Фамилия</label>
                <input type="text" class="form-control" name="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>

            <div class="col-12">
                <label for="username" class="form-label">Должность</label>
                <input type="text" class="form-control" name="workPosition" placeholder="" required>
                <div class="invalid-feedback">
                    Your username is required.
                </div>
            </div>

            <?=bitrix_sessid_post();?>
            <input type="hidden" name="add-user-form" value="Y">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success btn-lg" type="submit"><?= Loc::getMessage("ADD_USER"); ?></button>
            </div>

        </div>
    </form>
    </div>
</div>

<script>
    $(document).ready(function (){

        $('.js-add-user-form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/local/ajax/modal/addUser.php',
                method: 'POST',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function (res) {

                    if (res.success == "added") {
                        $('.modal-windows').empty().prepend("<div class=\"ui-alert ui-alert-success\"><span class=\"ui-alert-message\"><strong>Внимание!</strong>Пользователь успешно добавлен.</span></div>")

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
                        }, 3000);
                    }

                    if (res.success == "error") {
                        $('.modal-windows').prepend("<div class=\"ui-alert ui-alert-danger\"><span class=\"ui-alert-message\"><strong>Внимание!</strong>"+res.error+"</span></div>")
                    }
                }
            })
        })

    })
</script>