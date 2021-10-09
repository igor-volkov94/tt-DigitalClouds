<?php
CModule::IncludeModule("iblock");

class BUserList extends CBitrixComponent
{
    public function executeComponent()
    {
        $rsUser = CUser::GetList();
        while($arUser = $rsUser->Fetch()) {
            if ($arUser['ID'] != 1) {
                $this->arResult['USERS'][] = array(
                    "ID" => $arUser['ID'],
                    "NAME" => $arUser['NAME'],
                    "LAST_NAME" => $arUser['LAST_NAME'],
                    "FULL_NAME" => $arUser['NAME'] . " " . $arUser['LAST_NAME'],
                    "WORK_POSITION" => $arUser['WORK_POSITION']
                );
            }
        }

        $this->includeComponentTemplate();
    }
}
