<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 **/

use Bitrix\Main\Page\Asset;

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
<?php
Asset::getInstance()->addJS(SITE_TEMPLATE_PATH . '/js/jquery-1.12.4.min.js');
Asset::getInstance()->addJS(SITE_TEMPLATE_PATH . '/js/custom.js');
?>

</html>
