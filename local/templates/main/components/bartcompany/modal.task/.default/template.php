<?php
/**
 * @var $APPLICATION
 * @var $arResult array
 * @var $arParams array
 * @var $this CBitrixComponentTemplate
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
\Bitrix\Main\UI\Extension::load("ui.alerts");

?>

<div class="modal-windows">
    <div class="col-md-8 mx-auto">
        <h4 class="mb-3"><?=Loc::getMessage($arParams[0]['TITLE']);?></h4>

        <form action="/local/ajax/modal/modalTask.php" method="POST" class="form needs-validation js-task-form" data-form>
            <input type="hidden" name="<?=$arParams[0]["HIDDEN_NAME"]?>" value="<?=$arParams[0]["HIDDEN_VALUE"]?>">

            <div class="row g-3">
                <div class="col-12">
                    <label for="taskName" class="form-label"><?=Loc::getMessage("TASK_NAME");?></label>
                    <input type="text" class="form-control" name="taskName" value="<?=$arParams[0]["TASK_NAME"]?>" required>
                </div>

                <div class="col-12">
                    <label for="taskUser" class="form-label"><?=Loc::getMessage("TASK_USER");?></label>
                    <select class="form-select" multiple required name="taskUser[]" aria-label="Укажите исполнителя">
                        <?php foreach ($arResult['USERS'] as $user): ?>
                            <option value="<?=$user['ID']?>" <?php if (in_array($user['ID'], $arParams[0]["TASK_USER"])) echo "selected"; ?>><?=$user['FULL_NAME']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-12">
                    <label for="workPosition" class="form-label"><?=Loc::getMessage("TASK_STATUS");?></label>
                    <select class="form-select js-status-select" required name="taskStatus" aria-label="Укажите статус">
                        <?php foreach ($arResult['STATUS_SELECT'] as $status): ?>
                            <option value="<?=$status['VALUE']?>" <?=($arParams[0]["TASK_STATUS_ENUM_ID"] == $status['VALUE']) ? "selected" : ""; ?>><?=$status['NAME']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success btn-lg" type="submit"><?=Loc::getMessage($arParams[0]['BUTTON']);?></button>
                </div>

            </div>
        </form>
    </div>
</div>
