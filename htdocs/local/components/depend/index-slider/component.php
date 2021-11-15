<?php

CModule::IncludeModule('iblock');
$arResult = [
    'items' => []
];
$iblockId = (int)$arParams['IBLOCK_ID'];
$res = CIBlockElement::GetList(['SORT' => 'ASC'], [
    'IBLOCK_ID' => $iblockId,
    'ACTIVE' => 'Y',
], false, false, ['ID', 'NAME', 'PREVIEW_PICTURE', 'PREVIEW_TEXT', 'PROPERTY_LINK', 'PROPERTY_LINK_TEXT', 'PROPERTY_VIDEO_MP',
	'PROPERTY_IMAGE_1920', 'PROPERTY_VIDEO_OG', 'PROPERTY_VIDEO_WEBM', 'PROPERTY_IMAGE_1280', 'PROPERTY_IMAGE_991', 'PROPERTY_IMAGE_575']);
while ($item = $res->Fetch()) {
    $item['PREVIEW_PICTURE'] = CFile::GetPath($item['PREVIEW_PICTURE']);
    $item['PROPERTY_VIDEO_MP'] = CFile::GetPath($item['PROPERTY_VIDEO_MP_VALUE']);
    $item['PROPERTY_VIDEO_OG'] = CFile::GetPath($item['PROPERTY_VIDEO_OG_VALUE']);
    $item['PROPERTY_VIDEO_WEBM'] = CFile::GetPath($item['PROPERTY_VIDEO_WEBM_VALUE']);
    $item['PROPERTY_IMAGE_1920'] = CFile::GetPath($item['PROPERTY_IMAGE_1920_VALUE']);
    $item['PROPERTY_IMAGE_1280'] = CFile::GetPath($item['PROPERTY_IMAGE_1280_VALUE']);
    $item['PROPERTY_IMAGE_991'] = CFile::GetPath($item['PROPERTY_IMAGE_991_VALUE']);
    $item['PROPERTY_IMAGE_575'] = CFile::GetPath($item['PROPERTY_IMAGE_575_VALUE']);

    $arResult['items'][] = $item;
}

$this->IncludeComponentTemplate();
