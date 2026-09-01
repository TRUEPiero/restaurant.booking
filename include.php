<?
use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(__DIR__  . "/include/js/vue.min.js", true);
Asset::getInstance()->addJs(__DIR__  . "/include/js/vue-select.js", true);
?>