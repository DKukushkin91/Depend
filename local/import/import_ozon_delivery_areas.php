<?php

/**
 * Генерация файла для импорта местоположений
 */

ini_set('max_execution_time', 300);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (!isAdmin()) {
    exit;
}

$email = 'testphilips111@mail.ru';
$ozonapi = OzonAPI::getInstance();
$ozonapi->setPersonEmail($email);

$deliveryAreas = $ozonapi->ordersGetDeliveryAreas();
if (!is_array($deliveryAreas)) {
    $deliveryAreas = [];
}

$fileName = 'import_ozon.dat';
$str = 'CODE;PARENT_CODE;TYPE_CODE;NAME.RU.NAME;EXT.OZON.3' . "\r\n";
foreach($deliveryAreas as $region) {
//    $str .= ('p' . $region['id'] . ';;COUNTRY;' . $region['name'] . ';' . $region['id']) . "\r\n";
    foreach($region['deliveryAreas'] as $area) {
//        $str .= ('c' . $area['id'] . ';p' . $region['id'] . ';CITY;' . $area['name'] . ';' . $area['id']) . "\r\n";
        $str .= ('c' . $area['id'] . ';p;CITY;' . $area['name'] . ';' . $area['id']) . "\r\n";
    }
}

//echo $str; exit;
file_put_contents($fileName, $str);
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename($fileName));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($fileName));
// читаем файл и отправляем его пользователю
readfile($fileName);
//print_r($deliveryAreas);