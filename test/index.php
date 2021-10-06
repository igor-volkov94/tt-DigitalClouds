<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */

$APPLICATION->SetTitle("test"); ?>

    <?php
/*        $APPLICATION->IncludeComponent(
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
    */?>



<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>