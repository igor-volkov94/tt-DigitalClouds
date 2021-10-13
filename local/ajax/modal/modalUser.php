<?php
/**
 * @global $APPLICATION CMain
 */
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

$arParams = false;

if ($_GET['action'] == 'add') {
    $arParams = [
        "TITLE" => "HEAD_TITLE_ADD_USER",
        "BUTTON" => "ADD_USER",
        "HIDDEN_NAME" => "add-user-form",
        "HIDDEN_VALUE" => "Y"
    ];
} elseif ($_GET['action'] == 'edit') {
    $arParams = [
        "TITLE" => "HEAD_TITLE_EDIT_USER",
        "BUTTON" => "EDIT_USER",
        "ID" => $_GET['id'],
        "NAME" => $_GET['name'],
        "LAST_NAME" => $_GET['lastName'],
        "WORK_POSITION" => $_GET['workPosition'],
        "HIDDEN_NAME" => "edit-user-form",
        "HIDDEN_VALUE" => $_GET['id']
    ];
}

?>

    <div class="modal_background">
        <div class="modal_form">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="" class="close_form action_btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </a>
            </div>

            <?php
                $APPLICATION->IncludeComponent(
                    "bartcompany:modal.user",
                    "",
                    array($arParams)
                )
            ?>

        </div>
    </div>
