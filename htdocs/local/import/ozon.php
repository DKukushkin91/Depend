<?php
/**
 * загрузка товаров
 */
error_reporting(E_ALL | E_WARNING);
$_SERVER["DOCUMENT_ROOT"] = '/var/www/edistr/public';
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');

define('IMPORT_DIR', dirname(__FILE__) . '/');
define('IMPORT_TMP', dirname(__FILE__) . '/tmp/');

include IMPORT_DIR . 'functions.php';
include IMPORT_DIR . 'excel_reader2.php';
//include $_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/pclzip.lib.php';

//$pres = CIBlockProperty::GetList([], ['IBLOCK_ID' => 4]);
//while ($pitem = $pres->Fetch()) {
//    if ($pitem['ID'] < 42) continue;
//    CIBlockProperty::Delete($pitem['ID']);
//}
//exit;
$xlsFile = 'tmp/OZON_ID_1992.xls';
$xmlFiles = [
    '1158896.xml',
    '1178855.xml',
    '1178857.xml',
    '1180017.xml',
    '1180072.xml',
    '1181157.xml',
    '1181191.xml',
    '1181528.xml',
    '1181942.xml',
    '1183397.xml',
    '1158900.xml',
    '1178856.xml',
    '1180015.xml',
    '1180071.xml',
    '1180074.xml',
    '1181160.xml',
    '1181500.xml',
    '1181691.xml',
    '1181943.xml',
    '1158994.xml',
];
$xmlCategories = [
    1178855 => 36,
    1178857 => 33,
    1180017 => 37,
    1180072 => 41,
    1181157 => 38,
    1181191 => 43,
    1181528 => 39,
    1181942 => 34,
    1183397 => 32,
    1158900 => 49,
    1178856 => 44,
    1180015 => 37,
    1180071 => 38,
    1180074 => 42,
    1181160 => 43,
    1181500 => 31,
    1181691 => 35,
    1158994 => 53,
];
$allProps = [];
if ($argv[1] == 'reload') {
    $products = [];
    foreach($xmlFiles as $xmlFile) {
        $xml = simplexml_load_file('tmp/' . $xmlFile);

        foreach($xml->shop->offers->offer as $offer) {
            $product = [
                'id' => (int)$offer->attributes()['id'],
                'category' => (int)$offer->categoryId,
                'price' => (double)$offer->price,
                'picture' => (string)$offer->picture,
                'name' => (string)$offer->name,
                'vendor' => (string)$offer->vendor,
                'description' => (string)$offer->description,
                'weight' => (double)$offer->weight,
                'params' => []
            ];

            foreach($offer->param as $param) {
                $paramName = (string)$param->attributes()['name'];
                $paramUnit = (string)$param->attributes()['unit'];
                
                if (!empty($paramUnit)) {
                    $paramName .= ', ' . $paramUnit;
                }
                $paramCode = 'P_' . CUtil::translit($paramName, 'ru', ['change_case' => 'U', 'replace_space' => '', 'replace_other' => '']);
                $product['params'][] = [
                    'name' => $paramName,
                    'value' => (string)$param,
                    'code' => $paramCode
                ];
                if (!isset($allProps[$paramCode])) {
                    $allProps[$paramCode] = $paramName;
                }
            }

            $products[$product['id']] = $product;
        }
    }

    file_put_contents('products', serialize($products));
}
else {
    $products = unserialize(file_get_contents('products'));
}

//print_r($allProps);
//exit;
//получить свойства товара
$productProps = [];
$pres = CIBlockProperty::GetList([], ['IBLOCK_ID' => 4]);
while ($pitem = $pres->Fetch()) {
    $productProps[$pitem['CODE']] = $pitem['NAME'];
}



//найти новые
$notFound = [];
foreach($allProps as $apCode => $apName) {
    if (!isset($productProps[$apCode])) {
        $notFound[$apCode] = $apName;
    }
}


//print_r($allProps);
//print_r($productProps);
//print_r($notFound);
//exit;

if (sizeof($notFound) > 0) {
    $propsAdded = [];
    foreach($notFound as $nfCode => $nfName) {
        
        if (!isset($propcode, $propsAdded)) {
            $prop = new CIBlockProperty;
            $added = $prop->Add([
                'NAME' => $nfName,
                'ACTIVE' => 'Y',
                'CODE' => $nfCode,
                'PROPERTY_TYPE' => 'S',
                'IBLOCK_ID' => 4,
            ]);
            $propsAdded[] = $propcode;
        }
    }
}

//exit;
//нужно для корректного чтения файла
mb_internal_encoding("ISO-8859-1");

$xls = new Spreadsheet_Excel_Reader();
$xls->read($xlsFile);
$sheet = $xls->sheets[0];

//для корректной работы с кирилицей
mb_internal_encoding("UTF-8");

for($i = 2; $i < sizeof($sheet['cells']); $i++) {
    $cell = $sheet['cells'][$i];
    $productName = trim($cell[1]);
    $ozonIds = array_map('intval', explode(',', $cell[2]));
    
    //найти товары в файлах
    foreach($ozonIds as $productId) {
        if (isset($products[$productId]) && isset($xmlCategories[$products[$productId]['category']])) {
            
            $prod = $products[$productId];
            $code = CUtil::translit($prod['name'], 'ru', ['replace_space' => '-', 'replace_other' => '-']);
//            var_dump($code);
            if (preg_match('/(.*)-$/', $code, $match)) {
                $code = substr($code, 0, -1);
            }
            $fields = [
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => 4,
                'IBLOCK_SECTION_ID' => $xmlCategories[$prod['category']],
                'NAME' => $prod['name'],
                'CODE' => $code,
                'DETAIL_TEXT' => $prod['description'],
                'PROPERTY_VALUES' => [
                    'OZON_ID' => $productId,
                ]
            ];
            
//            print_r($prod['params']);
            foreach($prod['params'] as $param) {
                $code = $param['code'];
                if (!empty($code)) {
                    $fields['PROPERTY_VALUES'][$code] = $param['value'];
                }
            }
            
//            print_r($fields);
//            exit;
            
            if (!empty($prod['picture'])) {
                $pictureTemp = IMPORT_TMP . 'picture.jpg';
                $pictureDetailTemp = IMPORT_TMP . 'picture_detail.jpg';
                
                if (file_put_contents($pictureTemp, file_get_contents($prod['picture']))) {
                    //копируем в детальную
                    copy($pictureTemp, $pictureDetailTemp);

//                    imageResize($pictureTemp, 220, 310);
                    $file = CFile::MakeFileArray($pictureTemp);
                    $file['MODULE_ID'] = 'main';
                    $fileId = CFile::SaveFile($file, 'main');
                    $fields['PREVIEW_PICTURE'] = CFile::MakeFileArray($fileId);
                    @unlink($pictureTemp);

                    $file = CFile::MakeFileArray($pictureDetailTemp);
                    $file['MODULE_ID'] = 'main';
                    $fileId = CFile::SaveFile($file, 'main');
                    $fields['PROPERTY_VALUES']['IMAGES'][] = CFile::MakeFileArray($fileId);
                    @unlink($pictureDetailTemp);
                }
            }


            $saved = importSaveProduct($fields, $prod['price']);
            var_dump($saved);
//            exit;
            break;
        }
        else {
//            echo 'not added ' . $productId . PHP_EOL;
        }
    }
}
unset($xls, $sheet);