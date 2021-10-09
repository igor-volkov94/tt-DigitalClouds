<?php
/**
 * @global $APPLICATION CMain
 */
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Application;

global $USER, $APPLICATION;


$arResult['delete'] = false;


if (isset($_POST)) {


    $arTaskUser = false;
    $arFilter = array("PROPERTY_TASKS_USERS" => $_POST['id']);
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_TASK_USER");
    $res = CIBlockElement::GetList(
        false,
        $arFilter,
        false,
        false,
        $arSelect
    );

    while($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();
        $arTaskUser[$arFields['ID']] = $arProps['TASKS_USERS']['VALUE'];
    }
    $error = false;
    foreach ($arTaskUser as $task) {
        if (count($task) >= 2 && in_array($_POST['id'], $task)) {
            $error .= 1;
        }
    }

    if (!$error || empty($arTaskUser)) {
        CUser::Delete($_POST['id']);
        $arResult = [ "delete" => "Y", "fullName" => $_POST["fullName"] ];
        echo json_encode($arResult);
    } else {
        $arResult = [ "delete" => "N", "fullName" => $_POST["fullName"] ];
        echo json_encode($arResult);
    }

}
