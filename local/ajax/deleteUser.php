<?php
/**
 * @global $APPLICATION CMain
 */
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Application;

global $USER, $APPLICATION;

$arResult['delete'] = false;

if (isset($_POST['id'])) {
    if (CUser::Delete($_POST['id']))  {
        $arResult = array("delete" => "Y", "fullName" => $_POST["fullName"]);
    }
}

//        if (isset($_GET['edit'])) {
//
//        }


echo json_encode($arResult);
