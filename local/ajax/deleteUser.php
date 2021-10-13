<?php
/**
 * @global $APPLICATION CMain
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
use Bitrix\Main\Application;
global $USER, $APPLICATION;

$arResult['delete'] = false;

if (isset($_POST)) {
    $arFilter = array("PROPERTY_TASKS_USERS" => $_POST['id']);
    $arSelect = array("ID", "IBLOCK_ID", "NAME", "PROPERTY_TASK_USER");

    $res = CIBlockElement::GetList(
        false,
        $arFilter,
        false,
        false,
        $arSelect
    );

    $arTaskUser = false;

    while($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();
        $arTaskUser[$arFields['ID']] = $arProps['TASKS_USERS']['VALUE'];
    }

    $error = false;

    foreach ($arTaskUser as $task) {
        if (count($task) >= 2) {
            CUser::Delete($_POST['id']);
            $arResult = [ "delete" => "Y", "fullName" => $_POST["fullName"] ];
        }  else {
            $arResult = [ "delete" => "N", "fullName" => $_POST["fullName"] ];
        }
    }

    echo json_encode($arResult);
}
