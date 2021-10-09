<?php
CModule::IncludeModule("iblock");

class BModalTask extends CBitrixComponent
{
    public function executeComponent()
    {
        global $USER, $APPLICATION;
        $this->arResult['success'] = false;

        if ($_POST['add-task-form'] == 'Y') {

            $task = new CIBlockElement;

            $PROP = [];
            $PROP["TASKS_USERS"] = $_POST['taskUser'];
            $PROP["TASKS_STATUS"] = ["VALUE" => $_POST['taskStatus']];


            $arLoadProductArray = Array(
                "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
                "IBLOCK_SECTION_ID" => false, // элемент лежит в корне раздела
                "IBLOCK_ID" => 2,
                "PROPERTY_VALUES" => $PROP,
                "NAME" => $_POST['taskName'],
                "ACTIVE" => "Y"
            );

            $PRODUCT_ID = $task->Add($arLoadProductArray);

            if ($PRODUCT_ID) {
                $arResult = array(
                    "success" => "Y",
                    "message" => "<div class=\"ui-alert ui-alert-success\"><span class=\"ui-alert-message\">Задача успешно добавлен.</span></div>",
                );
            } else {
                $arResult = array('success' => "error", "error" => $task->LAST_ERROR);
            }

            $APPLICATION->RestartBuffer();
            echo json_encode($arResult);
            die();
        }

        if (isset($_POST['edit-task-form'])) {

            $task = new CIBlockElement;

            $PROP = [];
            $PROP["TASKS_USERS"] = $_POST['taskUser'];
            $PROP["TASKS_STATUS"] = ["VALUE" => $_POST['taskStatus']];

            $arLoadProductArray = Array(
                "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
                "IBLOCK_SECTION_ID" => false, // элемент лежит в корне раздела
                "IBLOCK_ID" => 2,
                "PROPERTY_VALUES" => $PROP,
                "NAME" => $_POST['taskName'],
                "ACTIVE" => "Y"
            );

            $PRODUCT_ID = $task->Update($_POST['edit-task-form'], $arLoadProductArray);

            if ($PRODUCT_ID) {
                $arResult = array(
                    "success" => "Y",
                    "message" => "<div class=\"ui-alert ui-alert-success\"><span class=\"ui-alert-message\">Задача успешно изменена.</span></div>"
                );
            } else {
                $arResult = array('success' => "error", "error" => $task->LAST_ERROR);
            }

            $APPLICATION->RestartBuffer();
            echo json_encode($arResult);
            die();
        }

        $this->includeComponentTemplate();
    }
}
