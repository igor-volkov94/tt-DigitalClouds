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
    <tbody>
    <?php foreach ($arResult['ITEMS'] as $item): ?>
        <tr>
            <th scope="row"><?= $item['ID'] ?></th>
            <td><?= $item['NAME'] ?></td>
            <td>
                <?php foreach ($item['PROPERTIES']['TASKS_USERS']['VALUE'] as $users): ?>
                    <?php
                    $rsUser = CUser::GetByID($users);
                    $arUser = $rsUser->Fetch();
                    echo $arUser['NAME'] . " " . $arUser['LAST_NAME'] . "</br>";
                    ?>
                <?php endforeach; ?>
            </td>
            <td><?= $item['PROPERTIES']['TASKS_STATUS']['VALUE'] ?></td>
            <td>
                <a href="#" class="task_action task_edit">
                    <?php include 'local/templates/main/css/edit.svg';?>
                </a>
                <a href="#" class="task_action">
                    <?php include 'local/templates/main/css/delete.svg';?>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button class="btn btn-success btn-lg" type="submit"><?=Loc::getMessage("TASK_ADD"); ?></button>
</div>