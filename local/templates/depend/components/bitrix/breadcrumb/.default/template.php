<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;
//delayed function must return a string
if(empty($arResult))
    return "";

$strReturn = '<div class="breadcrumbs breadcrumbs"><div class="breadcrumbs-inner">';
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
			<span class="breadcrumbs__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"'.$child.$nextRef.'>
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'" class="breadcrumbs__link" title="'.$title.'" itemprop="url">
					<span class="breadcrumbs__text" itemprop="title">'.$title.'</span>
				</a>
			</span>';
	}
	else
	{
		$strReturn .= '
			<span class="breadcrumbs__item active">
				'.$arrow.'
				<span class="breadcrumbs__text">'.$title.'</span>
			</span>';
	}
}

$strReturn .= '</div></div>';

return $strReturn;
