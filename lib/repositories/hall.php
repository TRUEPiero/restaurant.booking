<?php
namespace Restaurant\Booking\Repo;
use Bitrix\Main\Entity;

class HallRepository extends Entity\DataManager 
{
    public static function getFilePath()
	{
		return __FILE__;
	}
    
    public function getTableName () {
        return 'booking_hall';
    } 

    public function getMap() {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\StringField('CODE'),
            new Entity\StringField('NAME'),
            new Entity\StringField('MAP'),
            new Entity\BooleanField('ACTIVE', array('values' => array('N', 'Y'))),
        );
    }
}
?>