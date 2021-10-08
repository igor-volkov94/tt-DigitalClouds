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
        <form action="/local/ajax/modal/modalUser.php" method="POST" class="form needs-validation js-user-form" data-form>
            <input type="hidden" name="<?=$arParams[0]["HIDDEN_NAME"]?>" value="<?=$arParams[0]["HIDDEN_VALUE"]?>">

            <div class="row g-3">
                <div class="col-12">
                    <label for="firstName" class="form-label"><?=Loc::getMessage("FIRST_NAME");?></label>
                    <input type="text" class="form-control" name="firstName" value="<?=$arParams[0]["NAME"]?>" required>
                </div>

                <div class="col-12">
                    <label for="lastName" class="form-label"><?=Loc::getMessage("LAST_NAME");?></label>
                    <input type="text" class="form-control" name="lastName" value="<?=$arParams[0]["LAST_NAME"]?>" required>
                </div>

                <div class="col-12">
                    <label for="workPosition" class="form-label"><?=Loc::getMessage("WORK_POSITION");?></label>
                    <input type="text" class="form-control" name="workPosition" value="<?=$arParams[0]["WORK_POSITION"]?>" required>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success btn-lg" type="submit"><?=Loc::getMessage($arParams[0]['BUTTON']);?></button>
                </div>

            </div>
        </form>
    </div>
</div>
