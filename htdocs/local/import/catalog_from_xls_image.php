<?php
/**
 * Синхронизация товаров из файла
 */

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

include IMPORT_DIR . 'excel_reader2.php';
$xls = new Spreadsheet_Excel_Reader();
$xls->read('import2.xls');

//нужно для корректной записи
mb_internal_encoding("UTF-8");

$sections = [
    0 => 5,
    1 => 8,
    2 => 7,
    3 => 6,
    4 => 13,
    5 => 12,
    6 => 11
];

for ($i = 0; $i < sizeof($xls->sheets); $i++) {
    $sheet = $xls->sheets[$i];

    for ($j = 2; $j < sizeof($sheet['cells']); $j++) {
        $row = $sheet['cells'][$j];
        $articul = $row[3];

        $images = [];

        //проверка картинок
        for($k = 1; $k < 10; $k++) {
            $fileName = IMPORT_DIR . 'catalog/' . $articul . ($k > 1 ? '_' . $k : '') . '.jpg';
            $fileNameTmpDetail = IMPORT_TMP . $articul . ($k > 1 ? '_' . $k : '') . 'detail.jpg';

            if (file_exists($fileName)) {
                copy($fileName, $fileNameTmpDetail);

                $file = CFile::MakeFileArray($fileNameTmpDetail);
                $file['MODULE_ID'] = 'main';
                $fileId = CFile::SaveFile($file, 'main');
                $images[] = CFile::MakeFileArray($fileId);
                @unlink($fileNameTmpDetail);
            }
        }

        $exists = importGetProduct(importTranslit($row[4]));
var_dump('id', $exists['ID']);
//var_dump($images);
//var_dump($images);
//        var_dump($exists['ID']);
        CIBlockElement::SetPropertyValuesEx($exists['ID'], 1, ['IMAGES' => $images]);

        $res = CIBlockElement::GetProperty(1, $exists['ID'], [], ['CODE' => 'IMAGES']);
        while($image = $res->Fetch()) {
            var_dump('image', $image['VALUE']);
        }
exit;

//        print_r($item);
//        var_dump($price);
//        exit;
//        $saved = importSaveProduct($item, $price);
//        var_dump($saved);
//        exit;
    }
}

exit;
for($i = 2; $i < sizeof($sheet['cells']); $i++) {
    $row = $sheet['cells'][$i];
    $row = array_map('trim', $row);

    if (empty($row[3])) {
        continue;
    }

    $props['OZON_ID'] = (int)$row[1];
    $props['TYPE'] = $row[4];
    $props['WORLD'] = $row[5];
    $props['GENDER'] = $row[6];
    $props['AGE'] = $row[7];
    $props['SCHITINA'] = $row[8];
    $props['SKIN_TYPE'] = $row[9];
    $props['EFFECT'] = $row[10];
    $props['ZONA'] = $row[11];
    $props['PRIMENENIE'] = $row[12];
    $props['OSOB_ZUB'] = $row[13];
    $props['SORT'] = $row[14];
    $props['FORMA'] = $row[15];
    $props['VID'] = $row[16];
    $props['VID_GLAZURI'] = $row[17];
    $props['SERIA'] = $row[18];
    $props['VKUS'] = $row[19];
    $props['DOBAVKI'] = $row[20];
    $props['OSOBENNOSTI'] = $row[21];
    $props['OSOB_SOSTAVA'] = $row[22];
    $props['TEKSTURA'] = $row[23];
    $props['OSTROTA_SOUSA'] = $row[24];
    $props['KONSIST'] = $row[25];
    $props['NAZNACHENIE'] = $row[26];
    $props['KHRANENIE'] = $row[27];
    $props['SROK_GODNOSTI'] = $row[28];
    $props['UPAKOVKA'] = $row[29];
    $props['MATERIAL'] = $row[30];
    $props['COUNT'] = $row[31];
    $props['KKAL'] = $row[32];
    $props['ML'] = $row[33];
    $props['COUNTRY'] = $row[34];
    $props['PROTEINS'] = $row[35];
    $props['FLATS'] = $row[36];
    $props['CARBS'] = $row[37];
    $props['ARTICUL'] = $row[38];
    $props['VES_NETTO'] = $row[39];
    $props['VES_BRUTTO'] = $row[40];
    $props['RAZMER_UPAKOVKI'] = $row[41];
    $props['SOSTAV'] = $row[43];
    $props['BRAND'] = importGetBrand($row[44]);
    $props['RAZMER_MAK'] = $row[45];
    $props['TECHNOLOGY'] = $row[46];
    $props['STEPEN_OBZHARKI'] = $row[47];
    $props['STEPEN_POMOLA'] = $row[48];

    $item = [
        'IBLOCK_ID' => 4,
        'NAME' => $row[3],
        'CODE' => importTranslit($row[3]),
        'DETAIL_TEXT' => $row[42],
        'ACTIVE' => 'Y',
        'IBLOCK_SECTION_ID' => importGetSection($row[2]),
        'PROPERTY_VALUES' => $props
    ];

    $first = 1;
    //проверка картинок
    for($j = 0; $j < 10; $j++) {
//        break;
        $fileName = IMPORT_DIR . 'images/' . $props['OZON_ID'] . ($j > 0 ? '_' . $j : '') . '.jpg';
        $fileNameTmpPreview = IMPORT_TMP . $props['OZON_ID'] . ($j > 0 ? '_' . $j : '') . '.jpg';
        $fileNameTmpDetail = IMPORT_TMP . $props['OZON_ID'] . ($j > 0 ? '_' . $j : '') . 'detail.jpg';

        if (file_exists($fileName)) {
//            copy($fileName, $fileNameTmpPreview);
            copy($fileName, $fileNameTmpDetail);

            //превью
            if ($first == 1) {
                CFile::ResizeImageFile($fileName, $fileNameTmpPreview, ['width' => 190, 'height' => 240], BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
                $file = CFile::MakeFileArray($fileNameTmpPreview);
                $file['MODULE_ID'] = 'main';
                $fileId = CFile::SaveFile($file, 'main');
                $item['PREVIEW_PICTURE'] = CFile::MakeFileArray($fileId);
                @unlink($fileNameTmpPreview);

                $first = 0;
            }

            $file = CFile::MakeFileArray($fileNameTmpDetail);
            $file['MODULE_ID'] = 'main';
            $fileId = CFile::SaveFile($file, 'main');
            $item['PROPERTY_VALUES']['IMAGES'][] = CFile::MakeFileArray($fileId);
            @unlink($fileNameTmpDetail);

            @unlink($fileNameTmp);
        }


    }


    $price = 0;
    //получить цену с озона
    if ($props['OZON_ID'] > 0) {
        $ozonProduct = $ozonapi->productsProduct($props['OZON_ID']);
        if (is_array($ozonProduct)) {
            $price = $ozonProduct['price'];
        }
    }
//    var_dump($row[2], $item['IBLOCK_SECTION_ID']);
//    print_r($item);exit;
    $saved = importSaveProduct($item, $price);
//    exit;
}

