<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;
//delayed function must return a string
if(empty($arResult))
    return "";

$strReturn = '<div class="breadcrumbs breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList"><div class="breadcrumbs-inner">';
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
//    if (strlen($title) > 70) {
//        $title = substr($title, 0, 70) . '...';
//    }

	$nextRef = ($index < $itemSize-2 && $arResult[$index+1]["LINK"] <> ""? ' itemref="bx_breadcrumb_'.($index+1).'"' : '');
	$child = ($index > 0? ' itemprop="child"' : '');
	$arrow = ($index > 0? '<span class="breadcrumbs__arr"></span>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<span class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'" class="breadcrumbs__link" title="'.$title.'" itemprop="item">
					<span class="breadcrumbs__text" itemprop="name">'.$title.'</span>
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</span>';
	}
	else
	{
		$strReturn .= '
			<span class="breadcrumbs__item active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				'.$arrow.'
				<a itemprop="item" href="'.$arResult[$index]["LINK"].'"><span itemprop="name" class="breadcrumbs__text">'.$title.'</span></a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</span>';
	}
}

$strReturn .= '</div></div>';

return $strReturn;
