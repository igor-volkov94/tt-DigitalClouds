<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

use Bitrix\Main\UserTable;
use Bitrix\Main\Localization\Loc;

?>

<table class="table table-hover">
    <thead>
    <tr>
        <th><?=Loc::getMessage("TASK_ID");?></th>
        <th><?=Loc::getMessage("TASK_NAME");?></th>
        <th><?=Loc::getMessage("TASK_USER");?></th>
        <th><?=Loc::getMessage("TASK_STATUS");?></th>
        <th><?=Loc::getMessage("TASK_ACTION");?></th>
    </tr>
    </thead>
    <tbody class="js-line-task">
        <?php foreach ($arResult['ITEMS'] as $task): ?>

            <tr id="task_<?=$task['ID']?>">
                <th scope="row">
                    <?=$task['ID']?>
                </th>
                <td>
                    <?=$task['NAME']?>
                </td>
                <td>
                    <?php foreach ($task['PROPERTIES']['TASKS_USERS']['VALUE'] as $users): ?>
                        <?php $arUser = CUser::GetByID($users)->Fetch();
                            if (!empty($arUser)) {
                                echo $arUser['NAME'] . " " . $arUser['LAST_NAME'] . "</br>";
                            }
                        ?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?=$task['PROPERTIES']['TASKS_STATUS']['VALUE']?>
                </td>
                <td>

                    <?php
                    $taskUsers = implode("&taskUsers[]=", $task['PROPERTIES']['TASKS_USERS']['VALUE']);
                    $getParams = "?action=edit&id={$task['ID']}&taskName={$task['NAME']}&taskUsers[]={$taskUsers}&taskStatus={$task['PROPERTIES']['TASKS_STATUS']['VALUE']}&taskEnumID={$task['PROPERTIES']['TASKS_STATUS']['VALUE_ENUM_ID']}"; ?>

                    <a href="/local/ajax/modal/modalTask.php<?=$getParams;?>" class="action_btn task_edit js_modal">
                        <?php include 'local/templates/main/css/edit.svg';?>
                    </a>
                    <a href="/local/ajax/deleteTask.php" class="action_btn task_delete" data-task-id="<?=$task['ID']?>" data-task-name="<?=$task['NAME']?>">
                        <?php include 'local/templates/main/css/delete.svg';?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="/local/ajax/modal/modalTask.php?action=add" class="footer-menu__callback js_modal btn btn-success btn-lg"><?=Loc::getMessage("TASK_ADD");?></a>
</div>
