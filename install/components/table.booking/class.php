<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

CModule::IncludeModule("restaurant.booking");

use Restaurant\Booking\HallService;

class TableBookingComponent extends CBitrixComponent {
    public function executeComponent() {

		try {
            $this->getResult();
        } catch (SystemException $e) {
            ShowError($e->getMessage());
        }
    }

    protected function getResult()
    {
        if ($this->startResultCache()) {
            $res = HallService::getWithTables();

            foreach ($res as $arHall) {
                $this->arResult['HALLS'][] = $arHall;
            }
            $this->SetResultCacheKeys(array());

            $this->IncludeComponentTemplate();
        }
    }
}
?>