<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
IncludeModuleLangFile(__FILE__);
?>

<div class="main_block" id="main_block">
    <div class="section collapsible">
        <input type="text" name="name">
        <input type="text" name="phone">
        <input type="email" name="email">

        <button @click="() => console.log('далее')"><?=GetMessage('NEXT')?></button>
    </div>
    <div class="section collapsible">
        <select name="hall" id="hall">
            <option value="1">Тест 1</option>
            <option value="2">Тест 2</option>
        </select>

        <input type="datetime" name="date_start">
        <input type="datetime" name="date_end">

        <select name="guest_count" id="guest_count">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>

        <div class="map">
            <?if($arParams["SHOW_MAP"] == 'Y') {?>
                MAP
            <?}?>
        </div>
    </div>
</div>

