<?php
/**
 * @var $arResult array
 * @var $arParams array
 */

use Bitrix\Main\Context;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$request = Context::getCurrent()->getRequest();

$resultId = $request->getQuery('RESULT_ID');
$formResult = $request->getQuery('formresult');
$webFormId = $request->getQuery('WEB_FORM_ID');

if (intval($resultId) > 0 && $formResult == 'addok' && $webFormId === $arResult['arForm']['ID']) {
    $arResult['STATUS'] = 'success';
}