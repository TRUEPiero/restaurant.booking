<?php
namespace Restaurant\Booking\Repo;
use Bitrix\Main\Entity;

class TableRepository extends Entity\DataManager 
{
    public static function getFilePath()
	{
		return __FILE__;
	}
    
    public function getTableName () {
        return 'booking_table';
    } 

    public function getMap() {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\StringField('CODE'),
            new Entity\StringField('NAME'),
            new Entity\IntegerField('HALL_ID'),
            new Entity\ReferenceField(
                'HALL',
                'Restaurant\Booking\Hall',
                array('=this.HALL_ID' => 'ref.ID')
            ),
            new Entity\BooleanField('ACTIVE', array('values' => array('N', 'Y'))),
        );
    }
}
?>