<?php
/**
 * @global $APPLICATION CMain
 */
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
$APPLICATION->ShowAjaxHead();

?>

    <div class="modal_background">
        <div class="modal_form">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="#" class="close_form task_action">
                    <?php include 'local/templates/main/css/delete.svg';?>
                </a>
            </div>

            <?php
                $APPLICATION->IncludeComponent(
                    "bartcompany:modal.add.user",
                    ""
                )
            ?>

        </div>
    </div>

<?php //require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");?>