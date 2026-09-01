<?php

if($APPLICATION->GetGroupRight('restaurant.booking') > 'D') {
    $aMenu = array(
        "parent_menu" => "global_menu_content",
        "sort"        => 100,
        "url"         => "#",
        "text"        => "Restaurant Booking",
        "title"       => "Restaurant Booking",
        "icon"        => "clouds_menu_icon",
        "page_icon"   => "clouds_menu_icon",
        "items_id"    => "menu_cloud_booking",
        "items"       => array(),
    );

    $items = [
        ["NAME" => 'Hall', "LINK" => 'booking_hall_list.php'],
        ["NAME" => 'Table', "LINK" => 'booking_table_list.php'],
    ];

    foreach ($items  as $value) {

      $aMenu["items"][] =  array(
        "text" => $value["NAME"],
        "url"  => $value["LINK"],
        "icon" => "iblock_menu_icon_iblocks",
        "page_icon" => "form_page_icon",
        "more_url"  => array(),
        "title" => $value["NAME"]
       );
    }

    return $aMenu;
}

return false;
?>