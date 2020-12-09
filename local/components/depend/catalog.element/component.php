<?php
$arResult = [];
$code = htmlspecialchars(trim(strip_tags($arParams['element_code'])));
$productRes = CIBlockElement::GetList([], [
    'IBLOCK_ID' => 1,
    'CODE' => $code,
], false, ['nTopCount' => 1], [])->GetNextElement();


if ($productRes) {
    $product = $productRes->GetFields();
    $props = $productRes->GetProperties();

    $images = [];
	for ($i = 0; $i <  sizeof($props['IMAGES']['VALUE']); $i++) {
		$images[] = [
			'large' => CFile::GetPath($props['IMAGES']['VALUE'][$i]),
			'medium' => CFile::ResizeImageGet($props['IMAGES']['VALUE'][$i], ['width' => 360, 'height' => 360], BX_RESIZE_IMAGE_PROPORTIONAL_ALT)['src'],
			'small' => CFile::ResizeImageGet($props['IMAGES']['VALUE'][$i], ['width' => 65, 'height' => 55], BX_RESIZE_IMAGE_PROPORTIONAL_ALT)['src']
		] ;
	}

	$section = CIBlockSection::GetByID($product['IBLOCK_SECTION_ID'])->GetNext();
    $previmg = CFile::ResizeImageGet($product['PREVIEW_PICTURE'], array(), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);


    //характеристики
    $kharakteristiki = [];
    $khRes = CIBlockElement::GetProperty(1, $product['ID'], [], [
        'CODE' => 'PROPS',
    ]);
    while($khItem = $khRes->Fetch()) {
        $kh = CIBlockElement::GetByID($khItem['VALUE'])->Fetch();
        $kharakteristiki[] = $kh;
    }

	$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(1, $product['ID']);
	$seoRes = $ipropValues->getValues();
	$APPLICATION->SetPageProperty("title", $seoRes['ELEMENT_META_TITLE']);
	$APPLICATION->SetPageProperty("description",  $seoRes['ELEMENT_META_DESCRIPTION']);
	$APPLICATION->SetPageProperty("keywords",  $seoRes['ELEMENT_META_KEYWORDS']);
	$APPLICATION->SetTitle($seoRes['ELEMENT_META_TITLE']);

    $APPLICATION->AddChainItem($section['NAME'], $section['SECTION_PAGE_URL']);
    $APPLICATION->AddChainItem($product['NAME'], $product['DETAIL_PAGE_URL']);

    
    $APPLICATION->AddHeadString('<meta property="og:description" content="'.$seoRes['ELEMENT_META_DESCRIPTION'].'"/>');
    $APPLICATION->AddHeadString('<meta property="og:image" content="https://www.depend.ru'.$previmg['src'].'"/>');
//    $APPLICATION->SetTitle($product['NAME']);

    $product['props'] = $props;
    $product['images'] = $images;
    $product['kharakteristiki'] = $kharakteristiki;
    $arResult['product'] = $product;
    $this->IncludeComponentTemplate();
} else {
    define('ERROR_404', 'Y');
}
