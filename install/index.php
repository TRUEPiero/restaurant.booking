<?php

IncludeModuleLangFile(__FILE__);
if (class_exists("restaurant_booking"))
	return;

class restaurant_booking extends CModule
{
    /**
     * ID модуля
     *
     * @var string
     */
    public  $MODULE_ID;
    /**
     * версия модуля
     *
     * @var string
     */
    public  $MODULE_VERSION;
    /**
     * дата релиза версии модуля
     *
     * @var string
     */
    public  $MODULE_VERSION_DATE;
    /**
     * название модуля
     *
     * @var string
     */
    public  $MODULE_NAME;
    /**
     * описание модуля
     *
     * @var string
     */
    public  $MODULE_DESCRIPTION;
    /**
     * имя партнера выпустившего модуль
     *
     * @var string
     */
    public  $PARTNER_NAME;
    /**
     * ссылка на рисурс партнера выпустившего модуль
     *
     * @var string
     */
    public  $PARTNER_URI;
    /**
     * в конструкторе заполняем свойства
     *
     * @return void
     */
    function __construct()
    {
        $arModuleVersion = array();
        include_once(__DIR__ . '/version.php');

        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_ID = "restaurant.booking";
        
        $this->MODULE_NAME = GetMessage("MODULE_NAME");
        $this->MODULE_DESCRIPTION = GetMessage("MODULE_DESCRIPTION");

        $this->PARTNER_NAME = "True Piero";
        $this->PARTNER_URI = "https://piero.ru";
    }

    

	function GetModuleTasks()
	{
		return array();
	}

	function InstallDB()
	{
		global $DB, $APPLICATION, $DBType;
		$this->errors = $DB->RunSQLBatch(__DIR__ . "/db/".$DBType."/install.sql");
		if ($this->errors !== false)
		{
			$APPLICATION->ThrowException(implode("<br>", $this->errors));
			return false;
		}

        return true;
	}

	function UnInstallDB()
	{
		global $DB, $APPLICATION, $DBType;
		$this->errors = $DB->RunSQLBatch(__DIR__ . "/db/".$DBType."/uninstall.sql");
		if ($this->errors !== false)
		{
			$APPLICATION->ThrowException(implode("<br>", $this->errors));
			return false;
		}
		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles()
	{
        CopyDirFiles(
            __DIR__ . "/admin",
            $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin",
            true,
            true
        );

		CopyDirFiles(
            __DIR__ . "/components",
            $_SERVER["DOCUMENT_ROOT"] . "/local/components" . $this->MODULE_ID,
            true,
            true
        );

        return true;
	}

	function UnInstallFiles()
	{

        DeleteDirFiles(
            __DIR__ . "/admin",
            $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin"
        );

        if (is_dir($_SERVER["DOCUMENT_ROOT"] . "/local/components/" . $this->MODULE_ID)) {

            DeleteDirFilesEx(
                "/local/components/" . $this->MODULE_ID
            );
        }

		return true;
	}

	function DoInstall()
	{
		global $USER;

		if ($USER->IsAdmin())
		{
			if ($this->InstallDB())
			{
		        RegisterModule($this->MODULE_ID);
				$this->InstallEvents();
				$this->InstallFiles();
			}
			$GLOBALS["errors"] = $this->errors;			
		}

        return true;
	}

	function DoUninstall()
	{	
		global $USER;
		if ($USER->IsAdmin())
		{			
			if($this->UnInstallDB()) {
        		UnRegisterModule($this->MODULE_ID);
                $this->UnInstallEvents();
                $this->UnInstallFiles();
            }
		}

        return true;
	}
}