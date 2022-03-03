<?php

$_SERVER["DOCUMENT_ROOT"] = realpath(__DIR__ . '/../../');

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('iblock');
CModule::IncludeModule('sale');
CModule::IncludeModule('catalog');

define('IMPORT_DIR', dirname(__FILE__) . '/');
define('IMPORT_TMP', dirname(__FILE__) . '/tmp/');

include IMPORT_DIR . 'functions.php';

$ozonapi = OzonAPI::getInstance();
$ozonapi->setPersonEmail('d.sayapov@12.digital');

//нужно для корректного чтения файла
mb_internal_encoding("ISO-8859-1");

include IMPORT_DIR . 'simplexlsx.class.php';
$xlsx = new SimpleXLSX('import3.xlsx');



//echo $xlsx->sheetsCount();
//var_dump($xlsx->sheets());
//print_r($xlsx->rows());

//нужно для корректной записи
mb_internal_encoding("UTF-8");
