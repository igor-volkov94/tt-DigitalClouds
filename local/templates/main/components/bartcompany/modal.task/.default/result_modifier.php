<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arResult
 * @var array $arParams
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

$property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>2, "CODE"=>"TASKS_STATUS"));
while($enum_fields = $property_enums->GetNext())
{
    $arResult['STATUS_SELECT'][] = [
        "VALUE" => $enum_fields["ID"],
        "NAME" => $enum_fields["VALUE"]
    ];
}
