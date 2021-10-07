<?php
CModule::IncludeModule("iblock");

class BAddUser extends CBitrixComponent
{
    public function executeComponent()
    {
        global $USER, $APPLICATION;
        $this->arResult['success'] = false;

        if ($_POST['add-user-form'] == 'Y') {

            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = substr(str_shuffle($permitted_chars), 0, 10);

            $user = new CUser;
            $arFields = Array(
                "NAME" => $_POST['firstName'],
                "LAST_NAME" => $_POST['lastName'],
                "WORK_POSITION" => $_POST['workPosition'],
                "EMAIL" => "{$randomString}@newuser.ru",
                "LOGIN" => "{$randomString}@newuser.ru",
                "PASSWORD" => "cYOdjc",
                "CONFIRM_PASSWORD" => "cYOdjc",
                "ACTIVE" => "Y",
                "GROUP_ID" => array(2)
            );

            $ID = $user->Add($arFields);

            if (intval($ID) > 0) {
                $arResult = array('success' => "added");
            } else {
                $arResult = array('success' => "error", "error" => $user->LAST_ERROR);
            }

            $APPLICATION->RestartBuffer();
            echo json_encode($arResult);
            die();
        }

        $this->includeComponentTemplate();
    }
}
