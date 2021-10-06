<?php
/**
 * @global $APPLICATION CMain
 */
include($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
$APPLICATION->ShowAjaxHead();

?>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:form.result.new",
    "add_user",
    array(
        "WEB_FORM_ID" => "ADD_USER",
        "CACHE_TYPE" => "N",
        "LIST_URL" => "/local/ajax/modal/addUser.php",
        "EDIT_URL" => "/local/ajax/modal/addUser.php",
        "SUCCESS_URL" => "/local/ajax/modal/addUser.php"
    )
)
?>