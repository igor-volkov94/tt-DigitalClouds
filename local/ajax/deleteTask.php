<?php
/**
 * @global $APPLICATION CMain
 */
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Application;

global $USER, $APPLICATION;

$arResult['delete'] = false;

if (isset($_POST['id'])) {
    if (CIBlockElement::Delete($_POST['id']))  {
        $arResult = [ "delete" => "Y", "name" => $_POST["name"] ];
    }
}

echo json_encode($arResult);
