<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die;
}

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;
//delayed function must return a string
if (empty($arResult)) {
	return '';
}

$strReturn = '<div class="breadcrumb about-item__breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">'
			. '<ul class="breadcrumb__list">';
//echo '<pre>';
if ($arParams['START_FROM'] > 0) {
	$arResult = array_slice($arResult, $arParams['START_FROM']);
}
for ($index = 0; $index < count($arResult); $index++) {
	$title = htmlspecialcharsex($arResult[$index]['TITLE']);
//	print_r($arResult[$index]);

	if ($arResult[$index]['LINK'] <> '' && $index != count($arResult) - 1) {
		$strReturn .= '<li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'
				. '<a class="breadcrumb__link" href="#" title="' . $title . '">' . $title . '</a>'
				. '</li>';
	} else {
		$strReturn .= '<li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'
				. '<span class="breadcrumb__link-current">' . $title . '</span>'
				. '</li>';
	}
}

$strReturn .= '</ul></div>';

return $strReturn;
