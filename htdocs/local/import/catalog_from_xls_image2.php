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

$ares = CIBlockElement::GetList([], [
    'IBLOCK_ID' => 1
], false, false, [
    'ID', 'PROPERTY_ARTICUL'
]);

while ($item = $ares->Fetch()) {
        $articul = $item['PROPERTY_ARTICUL_VALUE'];

        $images = [];

        //проверка картинок
        for($k = 0; $k < 10; $k++) {
            $fileName = IMPORT_DIR . 'catalog/' . $articul . ($k > 0 ? '_' . $k : '') . '.jpg';
            $fileNameTmpDetail = IMPORT_TMP . $articul . ($k > 0 ? '_' . $k : '') . 'detail.jpg';

            if (file_exists($fileName)) {
                copy($fileName, $fileNameTmpDetail);

                $file = CFile::MakeFileArray($fileNameTmpDetail);
                $file['MODULE_ID'] = 'main';
                $fileId = CFile::SaveFile($file, 'main');
                $images[] = CFile::MakeFileArray($fileId);
                @unlink($fileNameTmpDetail);
            }
        }

        var_dump($images);
        //var_dump($images);
        var_dump($item['ID']);
        CIBlockElement::SetPropertyValuesEx($item['ID'], 1, ['IMAGES' => $images]);

        $res = CIBlockElement::GetProperty(1, $item['ID'], [], ['CODE' => 'IMAGES']);
        while($image = $res->Fetch()) {
            var_dump('image', $image['VALUE']);
        }
//exit;

//        print_r($item);
//        var_dump($price);
//        exit;
//        $saved = importSaveProduct($item, $price);
//        var_dump($saved);
//        exit;
    }
