<?php
$arResult['ITEMS'] = [];



use Bitrix\Main\Loader;
Loader::includeModule('sale');

foreach($arResult['SEARCH'] as $item) {
    $product = getProductById($item['ITEM_ID'], [
        'ID', 'NAME', 'DETAIL_PAGE_URL', 'PREVIEW_PICTURE', 'PREVIEW_TEXT',
    ]);

	$itemSearch = [
		'ID' => $product['ID'],
		'NAME' => $product['NAME'],
		'PREVIEW_PICTURE' => CFile::ResizeImageGet($product['PREVIEW_PICTURE'], [
			'width' => 185,
			'height' => 180,
		], BX_RESIZE_IMAGE_PROPORTIONAL_ALT)['src'],
		'DETAIL_PAGE_URL' => $product['DETAIL_PAGE_URL'],
		'PREVIEW_TEXT' => $product['PREVIEW_TEXT']
	];
	$arResult['total_found'] = $arResult["NAV_RESULT"]->SelectedRowsCount();


	$arResult['ITEMS'][] = $itemSearch;
}


