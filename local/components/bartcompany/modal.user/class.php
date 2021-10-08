<?php
CModule::IncludeModule("iblock");

class BModalUser extends CBitrixComponent
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
                $arResult = array(
                    "success" => "Y",
                    "message" => "<div class=\"ui-alert ui-alert-success\"><span class=\"ui-alert-message\">Пользователь успешно добавлен.</span></div>",
                );
            } else {
                $arResult = array('success' => "error", "error" => $user->LAST_ERROR);
            }

            $APPLICATION->RestartBuffer();
            echo json_encode($arResult);
            die();
        }

        if (isset($_POST['edit-user-form'])) {

            $user = new CUser;
            $fields = Array(
                "NAME" => $_POST['firstName'],
                "LAST_NAME" => $_POST['lastName'],
                "WORK_POSITION" => $_POST['workPosition'],
                "ACTIVE" => "Y",
                "GROUP_ID" => array(2),

            );
            $ID = $user->Update($_POST['edit-user-form'], $fields);

            if (intval($ID) > 0) {
                $arResult = array(
                    "success" => "Y",
                    "message" => "<div class=\"ui-alert ui-alert-success\"><span class=\"ui-alert-message\">Данные пользователя изменены.</span></div>",
                );
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
