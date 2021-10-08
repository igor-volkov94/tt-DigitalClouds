<?php
/**
 * @var $APPLICATION
 * @var $arResult array
 * @var $this CBitrixComponentTemplate
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
\Bitrix\Main\UI\Extension::load("ui.alerts");

?>

<div class="modal-windows">
    <div class="col-md-8 mx-auto">
        <h4 class="mb-3"><?=Loc::getMessage("HEAD_TITLE_ADD_USER");?></h4>
        <form action="/local/ajax/modal/addUser.php" method="POST" class="form needs-validation js-add-user-form" data-form>
            <input type="hidden" name="add-user-form" value="Y">

            <div class="row g-3">
                <div class="col-12">
                    <label for="firstName" class="form-label"><?=Loc::getMessage("FIRST_NAME");?></label>
                    <input type="text" class="form-control" name="firstName" value="" required>
                </div>

                <div class="col-12">
                    <label for="lastName" class="form-label"><?=Loc::getMessage("LAST_NAME");?></label>
                    <input type="text" class="form-control" name="lastName" value="" required>
                </div>

                <div class="col-12">
                    <label for="workPosition" class="form-label"><?=Loc::getMessage("WORK_POSITION");?></label>
                    <input type="text" class="form-control" name="workPosition" value="" required>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success btn-lg" type="submit"><?=Loc::getMessage("ADD_USER");?></button>
                </div>

            </div>
        </form>
    </div>
</div>
