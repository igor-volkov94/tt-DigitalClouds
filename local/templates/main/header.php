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

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <?php Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/custom.css') ?>
        <?php Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/list-groups.css') ?>

    </head>
<body>
<?php $APPLICATION->ShowPanel(); ?>
