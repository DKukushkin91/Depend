<?php
$APPLICATION->SetTitle("Продукция");

/*
 * Список товаров категории
 */
$arResult = [
    'items' => []
];
$sectionCode = $arParams['section_code'];
$sectionId = $arParams['section_id'];

CModule::IncludeModule('iblock');


if ($sectionId > 0) {
    $section = CIBlockSection::GetList([], ['IBLOCK_ID' => 1, 'ACTIVE' => 'Y', 'ID' => $sectionId])->GetNext();
    $sectionCode = $section['CODE'];
}

if(!empty($sectionCode)) {
    $section = CIBlockSection::GetList([], ['IBLOCK_ID' => 1, 'ACTIVE' => 'Y', 'CODE' => $sectionCode])->GetNext();
}

if ($section['IBLOCK_SECTION_ID'] > 0) {
    $parent = CIBlockSection::GetList([], ['IBLOCK_ID' => 1, 'ACTIVE' => 'Y', 'ID' => $section['IBLOCK_SECTION_ID']])->GetNext();
//    $APPLICATION->AddChainItem($parent['NAME'], $parent['SECTION_PAGE_URL']);
}

$sectionId = (int)$section['ID'];
if ($sectionId > 0) {
//    $APPLICATION->AddChainItem($section['NAME'], $section['SECTION_PAGE_URL']);

    //получение категорий текущего уровня
    $categories = [];
    $res = CIBlockSection::GetList(['SORT' => 'ASC'], [
        'IBLOCK_ID' => 1,
        'ACTIVE' => 'Y',
        'SECTION_ID' => $section['IBLOCK_SECTION_ID']
    ]);
    while ($cat = $res->GetNext()) {
        $categories[] = $cat;
    }
    $arResult['section'] = $section;

    $arResult['categories'] = $categories;
}

if ($_POST['sortorder'] !== 'asc' && $_POST['sortorder'] !== 'desc')  {
    $sortParams['SORT'] = 'ASC';
}

if (isset($arParams['sort_popular']) && $arParams['sort_popular']) {
    $sortParams['PROPERTY_BUY_COUNT'] = 'DESC';
}

if (isset($arParams['sortby']) && $arParams['sortby'] == 'rand') {
    $sortParams["rand"] = 'asc';
}

if ($arParams['ignoresession'] && !$_POST['category'] && $_SESSION['catalog_filter']) {
    $_POST = $_SESSION['catalog_filter'];
}

if (isset($_POST['sortby']) && $_POST['sortby'] == 'price') {
    $sortParams['CATALOG_PRICE_1'] = htmlspecialchars($_POST['sortorder']);
}
if (isset($_POST['sortby']) && $_POST['sortby'] == 'name') {
    $sortParams["NAME"] = htmlspecialchars($_POST['sortorder']);
}
if (isset($_POST['sortby']) && $_POST['sortby'] == 'popular') {
    $sortParams["PROPERTY_BUY_COUNT"] = htmlspecialchars($_POST['sortorder']);
}

$filterParams = [
    'IBLOCK_ID' => 1,
    'ACTIVE' => 'Y',
    'PROPERTY_CATALOG_SHOW' => 'Y',
//    '>=CATALOG_QUANTITY' => 1,
];
if($sectionId > 0){
    $filterParams['SECTION_ID'] = $sectionId;
}

if (isset($arParams['category'])) {
    $filterParams['section_code'] = $arParams['section_code'];
}

if (isset($_POST['name'])) {
    $filterParams['NAME'] = $_POST['name'];
}
if (isset($_POST['color'])) {
    $filterParams['PROPERTY_COLOR'] = $_POST['color'];
}
if (isset($_POST['saturation'])) {
    $filterParams['PROPERTY_SATURATION'] = $_POST['saturation'];
}
if (isset($_POST['mug_size'])) {
    $filterParams['PROPERTY_MUGS_SIZE'] = $_POST['mug_size'];
}
if (isset($_POST['drink_kind'])) {
    $filterParams['PROPERTY_DRINK_KIND'] = $_POST['drink_kind'];
}
if (isset($_POST['name2'])) {
    $filterParams['PROPERTY_NAME2'] = $_POST['name2'];
}
if (isset($_POST['price'])) {
    if (in_array(0, $_POST['price'])) {
        $filterParams['<CATALOG_PRICE_1'] = 4000;
    }
    if (in_array(1, $_POST['price'])) {
        $filterParams['>=CATALOG_PRICE_1'] = 4000;
    }
}

$pageParams = [
    'iNumPage' => isset($_GET['page']) ? (int)$_GET['page'] : (isset($_POST['page']) ? (int)$_POST['page'] : 1),
    'nPageSize' => isset($arParams['limit']) ? $arParams['limit'] : 15
];
$selectedFields = [
    'ID', 'NAME', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL', 'PROPERTY_NAME2', 'CATALOG_GROUP_1',
    'PROPERTY_SALE_LEADER', 'CATALOG_GROUP_1', 'PROPERTY_PRICE', 'PROPERTY_COLOR', 'PROPERTY_ARTICUL', 'PROPERTY_GOOD_COLORS'
];

//количество записей
$count = CIBlockElement::GetList([], $filterParams, false, false, ['ID'])->SelectedRowsCount();

//количество страниц
$pagesCount = ceil($count / $pageParams['nPageSize']);

//товары
$res = CIBlockElement::GetList(['SORT' => 'ASC'], $filterParams, false, $pageParams, $selectedFields);
while ($product = $res->GetNext()) {

    $color = CIBlockElement::GetProperty(1, $product["ID"], [], ['CODE' => 'GOOD_COLORS']);
    while ($ob = $color->GetNext()) {
            $productColors = CIBlockElement::GetByID($ob['VALUE'])->Fetch();
        $product['colors_goods'][] = [
                'image' => CFile::ResizeImageGet($productColors['PREVIEW_PICTURE'], [
                    'width' => 183,
                    'height' => 200,
                ],BX_RESIZE_IMAGE_PROPORTIONAL_ALT)['src'],
                'url' => $productColors['CODE']
            ];
        }

    if ($product['PREVIEW_PICTURE']) {
        $product['PREVIEW_PICTURE'] = CFile::ResizeImageGet($product['PREVIEW_PICTURE'], [
            'width' => 180,
            'height' => 310,
        ], BX_RESIZE_IMAGE_PROPORTIONAL_ALT)['src'];
    }
    else {
        $product['PREVIEW_PICTURE'] = SITE_TEMPLATE_PATH . '/images/no-image.jpg';
    }


    $arResult['items'][] = $product;
}

$arResult['pages_count'] = $pagesCount;
$arResult['pages_params'] = $pageParams;


if($sectionId > 0){
    $APPLICATION->SetTitle($section['NAME']);
}

$this->IncludeComponentTemplate();

return $arResult;




