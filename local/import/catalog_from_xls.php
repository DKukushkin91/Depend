<?php
/**
 * Синхронизация товаров изc файла
 */


$_SERVER["DOCUMENT_ROOT"] = realpath(__DIR__ . '/../../');

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('iblock');
CModule::IncludeModule('sale');
CModule::IncludeModule('catalog');

define('IMPORT_DIR', dirname(__FILE__) . '/');
define('IMPORT_TMP', dirname(__FILE__) . '/tmp/');

error_reporting(E_ERROR | E_WARNING);

include IMPORT_DIR . 'functions.php';

//$ozonapi = OzonAPI::getInstance();
//$ozonapi->setPersonEmail('d.sayapov@12.digital');

//нужно для корректного чтения файла
mb_internal_encoding("ISO-8859-1");

include IMPORT_DIR . 'simplexlsx.class.php';
$xlsx = new SimpleXLSX('coffe.xlsx');

//нужно для корректной записи
mb_internal_encoding("UTF-8");

$sections = [
    1 => 4,
    2 => 3,
    3 => 2,
    4 => 1,
    5 => 14,
    6 => 15,
];


for ($i = 1; $i <= $xlsx->sheetsCount(); $i++) {
    $rows = $xlsx->rows($i);
    array_shift($rows);
//    var_dump($rows[1]);
//    exit;

    foreach ($rows as $row) {
        $row = array_map('trim', $row);


//        $arr = [
//          importGetLine($row[7], $row[8]),
//          importGetLine($row[9], $row[10]),
//          importGetLine($row[11], $row[12]),
//          importGetLine($row[13], $row[14]),
//          importGetLine($row[15], $row[16]),
//          importGetLine($row[17], $row[18]),
//        ];
//
//        $arDesc = [
//            importGetColor($row[4], $row[0]),
//        ];



//        $props['FUNCTIONS'] = $arr;
//        $props['COLOR'] = $arDesc;
        $props['TYPE'] = isset($row[19]) ? $row[19] : '';
        $props['MODEL'] = isset($row[20]) ? $row[20] : '';
        $props['COFFE_KIND'] = isset($row[21]) ? $row[21] : '';
        $props['CAPSULE_STANDART'] = isset($row[22]) ? $row[22] : '';
        $props['RECIPES'] = isset($row[23]) ? $row[23] : '';
        $props['MUG_COUNT'] = isset($row[24]) ? $row[24] : '';
        $props['WATER_CAPACITY'] = isset($row[25]) ? $row[25] : '';
        $props['POWER'] = isset($row[26]) ? $row[26] : '';
        $props['FEATURES'] = isset($row[27]) ? $row[27] : '';
        $props['SAFETY'] = isset($row[28]) ? $row[28] : '';
        $props['EQUIPMENT'] = isset($row[29]) ? $row[29] : '';
        $props['SIZE'] = isset($row[30]) ? $row[30] : '';
        $props['PACK_SIZE'] = isset($row[31]) ? $row[31] : '';
        $props['GUARANTEE'] = isset($row[32]) ? $row[32] : '';
        $props['PACK_WEIGHT'] = isset($row[33]) ? $row[33] : '';
        $props['COUNTRY'] = isset($row[34]) ? $row[34] : '';



        $res = importGetProduct($row[1]);


        CIBlockElement::SetPropertyValuesEx($res['ID'],3, $props);



//        $price = 4000;
        // получить цену с озона
//        if ($props['OZON_ID'] > 0) {
//            $ozonProduct = $ozonapi->productsProduct($props['OZON_ID']);
//            if (is_array($ozonProduct)) {
//                $price = $ozonProduct['discountPrice'];
//                $props['PRICE'] = $ozonProduct['price'];
//                $props['QUANTITY'] = $ozonProduct['quantity'];
//            }
//        }


//        $item = [
//            'IBLOCK_ID' => 3,
//            'NAME' => $row[0],
//            'CODE' => mb_strtolower($row[1]),
////            'PREVIEW_TEXT' => isset($row[10]) ? $row[10] : '',
//            'DETAIL_TEXT' => isset($row[6]) ? $row[6] : '',
////            'VIDEO' => isset($row[11]) ? $row[11] : '',
//            'ACTIVE' => 'Y',
//            'IBLOCK_SECTION_ID' => $sections[$i],
//            'PROPERTY_VALUES' => $props
//        ];


        //проверка картинок
//        for($k = 1; $k < 10; $k++) {
//            if ($k == 1) {
//                $fileName = IMPORT_DIR . 'coffeemachines/'. $props['ARTICUL'] . '/' . $props['ARTICUL'] . '_1.png';
//            }
//            else {
//                $fileName = IMPORT_DIR . 'coffeemachines/'. $props['ARTICUL'] . '/png/' . $props['ARTICUL'] . '_' . $k . '.png';
//            }
////             var_dump($fileName, file_exists($fileName));
//            $fileNameTmpPreview = IMPORT_TMP . $props['ARTICUL'] . ($k > 0 ? '_' . $k : '') . '.png';
//            // $fileNameTmpDetail = IMPORT_TMP . $props['ARTICUL'] . ($k > 0 ? '_' . $k : '') . 'detail.jpg';
//            // var_dump($fileNameTmpPreview);
//
//            if (file_exists($fileName)) {
//    //            copy($fileName, $fileNameTmpPreview);
//                copy($fileName, $fileNameTmpPreview);
//
//                //превью
//                if ($k == 1) {
////                    CFile::ResizeImageFile($fileName, $fileNameTmpPreview, ['width' => 190, 'height' => 240], BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
//                    $file = CFile::MakeFileArray($fileNameTmpPreview);
//                    $file['MODULE_ID'] = 'main';
//                    $fileId = CFile::SaveFile($file, 'main');
//                    $item['PREVIEW_PICTURE'] = CFile::MakeFileArray($fileId);
////                    @unlink($fileNameTmpPreview);
//                }
//                else {
//                    $file = CFile::MakeFileArray($fileNameTmpPreview);
//                    $file['MODULE_ID'] = 'main';
//                    $fileId = CFile::SaveFile($file, 'main');
//                    $item['PROPERTY_VALUES']['IMAGES'][] = CFile::MakeFileArray($fileId);
//                }
//                    @unlink($fileNameTmpPreview);
//            }
//        }


//
//        var_dump($item['NAME']);
//        $saved = importSaveProduct($item, $price);
    }
}

