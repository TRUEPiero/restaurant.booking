<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
IncludeModuleLangFile(__FILE__);

$arComponentParameters = array(
    'GROUPS' => array(
        
    ),
    'PARAMETERS' => array(
        'SHOW_MAP' => [
			'PARENT' => 'VISUAL',
            "NAME" => GetMessage('PARAM_SHOW_MAP'),
            'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'N',
        ]
    )
);
?>
