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
//
//$ozonapi = OzonAPI::getInstance();
//$ozonapi->setPersonEmail('d.sayapov@12.digital');

//нужно для корректного чтения файла
mb_internal_encoding("ISO-8859-1");

include IMPORT_DIR . 'simplexlsx.class.php';
$xlsx = new SimpleXLSX('import7.xlsx');

//нужно для корректной записи
mb_internal_encoding("UTF-8");

//$sections = [
//    1 => 4,
//    2 => 3,
//    3 => 2,
//    4 => 1,
//    5 => 14,
//    6 => 15,
//];

for ($i = 1; $i <= $xlsx->sheetsCount(); $i++) {
    $rows = $xlsx->rows($i);
    array_shift($rows);
    foreach ($rows as $row) {
        $row = array_map('trim', $row);
//       // var_dump($row);
//        $weight = isset($row[3]) ? $row[3] : '';
//        $explode = explode("-", $weight);
//
//        // var_dump($explode);

        $product_list= array();
        $product_id = importGetArticle(isset($row[0]) ? $row[0] : '');
        $product_list[]= importGetArticle(isset($row[3]) ? $row[3] : '');
        $product_list[]= importGetArticle(isset($row[4]) ? $row[4] : '');
        $product_list[]= importGetArticle(isset($row[5]) ? $row[5] : '');
        $product_list[]= importGetArticle(isset($row[6]) ? $row[6] : '');
        CIBlockElement::SetPropertyValuesEx($product_id, false, ['RECOMMENDED' => $product_list]);
        var_dump($product_id, $product_list);
//        $props['ARTICUL'] = isset($row[1]) ? $row[1] : '';
//        // var_dump($props , $row[1]);
//        $props['LINE'] = isset($row[8]) ? importGetLine($row[8]) : '';
//        $props['NAME2'] = isset($row[9]) ? $row[9] : '';
//        $props['WEIGHT_MIN'] = $explode[0];
//        $props['WEIGHT_MAX'] = $explode[1];
//        $props['GENDER'] = isset($row[4]) ? $row[4] : '';
//        $props['SIZE'] = isset($row[2]) ? $row[2] : '';
//        $props['PACK'] = isset($row[5]) ? $row[5] : '';
//        $props['VIDEO'] = isset($row[11]) ? $row[11] : '';
//
//        // $props['VES'] = isset($row[9]) ? $row[9] : '';
//        // $props['MATERIAL'] = isset($row[12]) ? $row[12] : '';
//        // $props['RAIN'] = isset($row[13]) && mb_strtolower($row[13]) == 'да' ? 'Y' : '';
//        // $props['WATER'] = isset($row[14]) && mb_strtolower($row[14]) == 'да' ? 'Y' : '';
//        // $props['HAND'] = isset($row[15]) && mb_strtolower($row[15]) == 'да' ? 'Y' : '';
//        // $props['MINI'] = isset($row[16]) && mb_strtolower($row[16]) == 'да' ? 'Y' : '';
//        // $props['WHEEL'] = isset($row[17]) && mb_strtolower($row[17]) == 'да' ? 'Y' : '';
//        // $props['DRY'] = isset($row[19]) && mb_strtolower($row[19]) == 'да' ? 'Y' : '';
//        // $props['ZIPPER'] = isset($row[20]) && mb_strtolower($row[20]) == 'да' ? 'Y' : '';
//        // $props['HEADPHONES'] = isset($row[21]) && mb_strtolower($row[21]) == 'да' ? 'Y' : '';
//        // $props['ORGINIZER'] = isset($row[22]) && mb_strtolower($row[22]) == 'да' ? 'Y' : '';
//        // $props['NOTEBOOK'] = isset($row[23]) && mb_strtolower($row[23]) == 'да' ? 'Y' : '';
//        // $props['WET'] = isset($row[24]) && mb_strtolower($row[24]) == 'да' ? 'Y' : '';
//        // $props['ERGO'] = isset($row[25]) && mb_strtolower($row[25]) == 'да' ? 'Y' : '';
//        $item = [
//            'IBLOCK_ID' => 1,
//            'NAME' => $row[0],
//            'CODE' => importTranslit($row[0]) . '-' . $props['ARTICUL'],
//            'PREVIEW_TEXT' => isset($row[10]) ? $row[10] : '',
//            'DETAIL_TEXT' => isset($row[7]) ? $row[7] : '',
////            'VIDEO' => isset($row[11]) ? $row[11] : '',
//            'ACTIVE' => 'Y',
//            'IBLOCK_SECTION_ID' => $sections[$i],
//            'PROPERTY_VALUES' => $props
//        ];
//
//
//        //проверка картинок
//        for($k = 1; $k < 10; $k++) {
//            if ($k == 1) {
//                $fileName = IMPORT_DIR . 'catalog4/'. $props['ARTICUL'] . '/' . $props['ARTICUL'] . '_1.jpg';
//            }
//            else {
//                $fileName = IMPORT_DIR . 'catalog4/'. $props['ARTICUL'] . '/jpg/' . $props['ARTICUL'] . '_' . $k . '.jpg';
//            }
//            // var_dump($fileName, file_exists($fileName));
//            $fileNameTmpPreview = IMPORT_TMP . $props['ARTICUL'] . ($k > 0 ? '_' . $k : '') . '.jpg';
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
//        $price = 0;
//        // получить цену с озона
//        if ($props['OZON_ID'] > 0) {
//            $ozonProduct = $ozonapi->productsProduct($props['OZON_ID']);
//            if (is_array($ozonProduct)) {
//                $price = $ozonProduct['price'];
//            }
//        }
//
////        var_dump($item['NAME']);
////        print_r($item);
////        exit;
////        var_dump($price);
//        $saved = importSaveProduct($item, $price);
//        // var_dump($saved);

        }
    }

