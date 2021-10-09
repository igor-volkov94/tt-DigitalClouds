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
        <th><?=Loc::getMessage("USER_ID");?></th>
        <th><?=Loc::getMessage("USER_USER");?></th>
        <th><?=Loc::getMessage("USER_POSITION");?></th>
        <th><?=Loc::getMessage("USER_ACTION");?></th>
    </tr>
    </thead>
    <tbody class="js-line-user">
    <?php foreach ($arResult["USERS"] as $user): ?>

    <?php $getParams = "?action=edit&id={$user['ID']}&name={$user['NAME']}&lastName={$user['LAST_NAME']}&workPosition={$user['WORK_POSITION']}"; ?>

        <tr id="user_<?=$user['ID']?>">
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
                <a href="/local/ajax/modal/modalUser.php<?=$getParams;?>" class="action_btn user_edit js_modal">
                    <?php include 'local/templates/main/css/edit.svg';?>
                </a>
                <a href="/local/ajax/deleteUser.php" class="action_btn user_delete" data-user-id="<?=$user['ID']?>" data-user-fullName="<?=$user['FULL_NAME']?>">
                    <?php include 'local/templates/main/css/delete.svg';?>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="/local/ajax/modal/modalUser.php?action=add" class="footer-menu__callback js_modal btn btn-success btn-lg"><?=Loc::getMessage("USER_ADD");?></a>
</div>
