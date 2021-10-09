<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

use Bitrix\Main\Page\Asset;
use Bitrix\Main\Localization\Loc;

\Bitrix\Main\UI\Extension::load("ui.alerts");

?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title><?php $APPLICATION->ShowTitle()?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <?php $APPLICATION->ShowHead()?>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <?php Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/custom.css') ?>
        <?php Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/list-groups.css') ?>
    </head>
<body>
<?php $APPLICATION->ShowPanel(); ?>

<?php
    $APPLICATION->IncludeComponent(
        "bitrix:search.title",
        "search",
        array(
            "SHOW_INPUT" => "Y",
            "INPUT_ID" => "title-search-input",
            "CONTAINER_ID" => "title-search",
            "PRICE_CODE" => "",
            "PRICE_VAT_INCLUDE" => "Y",
            "PREVIEW_TRUNCATE_LEN" => "150",
            "SHOW_PREVIEW" => "Y",
            "PREVIEW_WIDTH" => "75",
            "PREVIEW_HEIGHT" => "75",
            "CONVERT_CURRENCY" => "Y",
            "CURRENCY_ID" => "RUB",
            "PAGE" => "#SITE_DIR#",
            "NUM_CATEGORIES" => "3",
            "TOP_COUNT" => "10",
            "ORDER" => "date",
            "USE_LANGUAGE_GUESS" => "Y",
            "CHECK_DATES" => "Y",
            "SHOW_OTHERS" => "Y",
            "CATEGORY_0_TITLE" => "Новости",
            "CATEGORY_0" => array(
            ),
            "CATEGORY_0_iblock_news" => array(
                0 => "all",
            ),
            "CATEGORY_1_TITLE" => "Форумы",
            "CATEGORY_1" => array(
                0 => "forum",
            ),
            "CATEGORY_1_forum" => array(
                0 => "all",
            ),
            "CATEGORY_2_TITLE" => "Каталоги",
            "CATEGORY_2" => array(
            ),
            "CATEGORY_2_iblock_books" => "all",
            "CATEGORY_OTHERS_TITLE" => "Прочее",
            "COMPONENT_TEMPLATE" => "search",
            "TEMPLATE_THEME" => "blue"
        ),
        false
    );
?>