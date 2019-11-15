<?php

function importGetProduct($productCode = '')
{
    return CIBlockElement::GetList([], [
        'IBLOCK_ID' => 3,
        'CODE' => $productCode
    ])->Fetch();
}

function importSaveProduct($product = [], $price = 0)
{
    $action = 'add';

    $exists = importGetProduct($product['CODE']);
    if (!is_array($exists)) {
        //товара нет
        $action = 'add';
    }
    else {
        $action = 'update';

        if ($exists['IBLOCK_SECTION_ID'] == $product['IBLOCK_SECTION_ID']) {
            //товар есть в своей категории

        }
        else {
            //товар в другой категории
            $product['IBLOCK_SECTION'] = [
                $exists['IBLOCK_SECTION_ID'],
                $product['IBLOCK_SECTION_ID']
            ];
            unset($product['IBLOCK_SECTION_ID']);
        }
    }

    if ($action == 'update') {
        $el = new CIBlockElement;

        //удалить старые картинки
        $el->SetPropertyValuesEx($exists['ID'], 1,['IMAGES' => ['VALUE' => []]]);
        $el->Update($exists['ID'], $product);

        $res = CPrice::GetList([], [
                "PRODUCT_ID" => $exists['ID'],
                "CATALOG_GROUP_ID" => 1
            ]
        );

        if ($arr = $res->Fetch()){
            CPrice::Update($arr['ID'], [
                'PRICE' => $price
            ]);
        }
    }
    if ($action == 'add') {
        $el = new CIBlockElement;
        $exists['ID'] = $el->Add($product);

        //var_dump($el -> LAST_ERROR); //todo Проверка на ошибки

        CCatalogProduct::Add([
            'ID' => $exists['ID'],
            'QUANTITY' => 100
        ]);

        CPrice::Add([
            'PRODUCT_ID' => $exists['ID'],
            'CATALOG_GROUP_ID' => 1,
            'PRICE' => $price,
            'CURRENCY' => 'RUB',
        ]);
    }
    //set price $offer['price']

    return $exists['ID'];
}


function importGetLine($text, $name)
{
    $exists = CIBlockElement::GetList([], [
        'IBLOCK_ID' => 5,
        'CODE' => md5($text),
    ])->Fetch();
    if (!is_array($exists)) {
        $el = new CIBlockElement;
        $exists['ID'] = $el->Add([
            'IBLOCK_ID' => 5,
            'ACTIVE' => 'Y',
            'CODE' => md5($text),
            'NAME' => $text,
            'PREVIEW_TEXT' => $name,
        ]);
    }
    return (int)$exists['ID'];
}

function importGetColor($text, $name)
{
    $exists = CIBlockElement::GetList([], [
        'IBLOCK_ID' => 4,
        'CODE' => md5($text),
    ])->Fetch();
    if (!is_array($exists)) {
        $el = new CIBlockElement;
        $exists['ID'] = $el->Add([
            'IBLOCK_ID' => 4,
            'ACTIVE' => 'Y',
            'CODE' => md5($text),
            'NAME' => $text,
            'PREVIEW_TEXT' => $name,
        ]);
    }
    return (int)$exists['ID'];
}


function importGetArticle($Article = '')
{
    $exists = CIBlockElement::GetList([], [
        'IBLOCK_ID' => 3,
        'PROPERTY_ARTICUL' => $Article
    ])->Fetch();
    if (is_array($exists)) {
        return (int)$exists['ID'];
    }
}

function importTranslit($s) {
//    return Cutil::translit($s, [
//        'replace_space' => '-',
//        'replace_other' => '-'
//    ]);

    $s = (string) $s; // преобразуем в строковое значение
    $s = strip_tags($s); // убираем HTML-теги
    $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
    $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
    $s = trim($s); // убираем пробелы в начале и конце строки
    $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
    $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
    $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
    $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
    return $s; // возвращаем результат
}
