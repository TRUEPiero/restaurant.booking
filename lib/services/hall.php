<?php
namespace Restaurant\Booking;

use Restaurant\Booking\Repo\HallRepository;

class HallService {
    private static $Repo = new HallRepository();

    public static function getWithTables() {
        $result = [];

        $res = self::$Repo::getList([]);

        while($arItem = $res->fetch()) {
            $result[] = $arItem;
        }

        return $result;
    }
}
?>