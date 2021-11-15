<?php
/**
 * Created by PhpStorm.
 * User: v.avetisyan
 * Date: 02/11/2018
 * Time: 17:38
 */
$res = CIBlockSection::GetList([], [
	'IBLOCK_ID' => 6,
	'ACTIVE' => 'Y'
], false, [], false);
while ($ob = $res->GetNext()) {
	$sections[] = $ob;
}
?>
		<div class="shops-tabs tabs">
            <nav class="tabs-inner">
                <div class="mobile-arrow"></div>
                <?foreach ($sections as $index => $item): ?>
                    <a class="tabs__item top <?= ($index == 0) ? 'active' : '' ?> js-categoty-click"><?= $item['NAME']; ?></a>
                <? endforeach; ?>
            </nav>
        </div>
        <div class="buy-list">
			<? foreach ($sections as $index => $item) {
				$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"buy-list", 
	array(
		"IBLOCK_TYPE" => "-",
		"IBLOCK_ID" => "6",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"FILTER_NAME" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "DETAIL_PICTURE",
			2 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "LIKES",
			2 => "VIEWS",
			3 => "COMMENTS",
			4 => "TAGS",
			5 => "DATE_START",
			6 => "DATE_FINISH",
			7 => "",
		),
		"PARENT_SECTION" => $item["ID"],
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"PAGER_BASE_LINK" => "",
		"PAGER_PARAMS_NAME" => "arrPager",
		"FIRST_ELEMENT" => ($index==0)?"1":"",
		"COMPONENT_TEMPLATE" => "buy-list",
		"NEWS_COUNT" => "20",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);
			}
			?>
        </div>
