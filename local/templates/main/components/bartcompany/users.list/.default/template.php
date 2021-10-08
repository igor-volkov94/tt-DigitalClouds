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
        <th><?=Loc::getMessage("TASK_USER");?></th>
        <th><?=Loc::getMessage("TASK_POSITION");?></th>
        <th><?=Loc::getMessage("TASK_ACTION");?></th>
    </tr>
    </thead>
    <tbody class="js-line-user">
    <?php foreach ($arResult["USERS"] as $user): ?>
        <tr>
            <th scope="row">
                <?=$user['ID']?>
            </th>
            <td>
                <?=$user['FULL_NAME']?>
            </td>
            <td>
                <?=$user['WORK_POSITION']?>
            </td>
            <td>
                <a href="" class="task_action task_edit" data-user-id="<?=$user['ID']?>">
                    <?php include 'local/templates/main/css/edit.svg';?>
                </a>
                <a href="" class="task_action task_delete" data-user-id="<?=$user['ID']?>" data-user-fullName="<?=$user['FULL_NAME']?>">
                    <?php include 'local/templates/main/css/delete.svg';?>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="" class="footer-menu__callback js_modal btn btn-success btn-lg">
        <?=Loc::getMessage("TASK_ADD");?>
    </a>
</div>
