<?php

CModule::IncludeModule('iblock');
$arResult = [
    'items' => []
];
$iblockId = (int)$arParams['IBLOCK_ID'];
$res = CIBlockElement::GetList(['SORT' => 'ASC'], [
    'IBLOCK_ID' => $iblockId,
    'ACTIVE' => 'Y',
], false, false, ['ID', 'NAME', 'PREVIEW_PICTURE', 'PREVIEW_TEXT', 'PROPERTY_LINK']);
while ($item = $res->Fetch()) {
    $item['PREVIEW_PICTURE'] = CFile::GetPath($item['PREVIEW_PICTURE']);
    $arResult['items'][] = $item;
}

$this->IncludeComponentTemplate();
