<?
$res = CIBlockSection::GetList([], [
	'IBLOCK_ID' => 4,
	'ACTIVE' => 'Y'
], false, [], false);
while ($ob = $res->GetNext()) {
	$sections[] = $ob;
}
?>
<h2 class="txt-center">О недержании</h2>
<div class="articles-tabs">
	<div class="rubricator">
		<div class="mob-arrow"></div>
        <?php
        $onClickMenuArray = ["Забота о близком" => "onclick=\"ga('send','event','DP','DPZOB','zabota');\"",
	                        "Полезные советы" => "onclick=\"ga('send','event','DP','DPSOV','sovet');\""];
        ?>
		<? foreach ($sections as $index => $item): ?>
		<div class="rubric js-advice-click" data-code="<?=$item['CODE']; ?>" data-id="<?= $item['ID'];?>" <?=$onClickMenuArray[$item['NAME']]?>><?= $item['NAME']; ?></div>
		<? endforeach; ?>
        <div class="rubric js-advice-click current-rubric" data-id="0" data-code="all" onclick="ga('send','event','DP','DPALLART','allarticle');">Все статьи</div>
	</div>
</div>
<div class="advices-list js-load-advice">
	<?
		$arrFilter = [];
		$arrFilter['PROPERTY_SHOW_ON_MAIN'] = 'Y';
		$APPLICATION->IncludeComponent("bitrix:news.list","advices-list",Array(
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"AJAX_MODE" => "Y",
				"IBLOCK_TYPE" => "incontinence",
				"IBLOCK_ID" => "4",
				"NEWS_COUNT" => '3',
				"SORT_BY1" => "RAND",
				"SORT_ORDER1" => 'DESC',
				"SORT_BY2" => "ACTIVE_FROM",
				"SORT_ORDER2" => "DESC",
				"FILTER_NAME" => "arrFilter",
				"FIELD_CODE" => array(
					0 => "ID",
					1 => "DETAIL_PICTURE",
					2 => "",
					3 => "",
					4 => "",
				),
				"PROPERTY_CODE" => Array("LIKES", 'VIEWS', 'COMMENTS', 'TAGS', 'DATE_START', 'DATE_FINISH'),
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"SET_TITLE" => "N",
				"SET_BROWSER_TITLE" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_LAST_MODIFIED" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
				"PARENT_SECTION" => $item['ID'],
				"PARENT_SECTION_CODE" => "",
				"INCLUDE_SUBSECTIONS" => "Y",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"CACHE_FILTER" => "Y",
				"CACHE_GROUPS" => "Y",
				"DISPLAY_TOP_PAGER" => "Y",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "",
				"PAGER_SHOW_ALWAYS" => "Y",
				"PAGER_TEMPLATE" => "",
				"PAGER_DESC_NUMBERING" => "",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "",
				"PAGER_BASE_LINK_ENABLE" => "Y",
				"SET_STATUS_404" => "N",
				"SHOW_404" => "N",
				"MESSAGE_404" => "",
				"PAGER_BASE_LINK" => "",
				"PAGER_PARAMS_NAME" => "arrPager",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				'FIRST_ELEMENT' => ($index == 0) ? '1' : ''
			)
		);
	?>
</div>
