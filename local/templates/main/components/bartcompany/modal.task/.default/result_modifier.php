<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$rsUser = CUser::GetList();
while($arUser = $rsUser->Fetch()) {
    $arResult['USERS'][] = array(
        "ID" => $arUser['ID'],
        "NAME" => $arUser['NAME'],
        "LAST_NAME" => $arUser['LAST_NAME'],
        "FULL_NAME" => $arUser['NAME'] . " " . $arUser['LAST_NAME'],
        "WORK_POSITION" => $arUser['WORK_POSITION']
    );
}