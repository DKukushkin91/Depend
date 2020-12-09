<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Depend");
$res = CIBlockSection::GetList([], [
	'IBLOCK_ID' => 4,
	'ACTIVE' => 'Y'
], false, [], false);
while ($ob = $res->GetNext()) {
	$sections[] = $ob;
}
$APPLICATION->AddChainItem('О недержании', '/advices/cure/');
?>
<?$APPLICATION->AddHeadString('<meta property="og:description" content="Полезные статьи про заботу о близких с недержанием, рекомендации, мифы, хитрости - Depend"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:image" content="https://www.depend.ru/upload/iblock/8d5/8d51b78ecd8ca654937117ec8037c88f.jpg"/>');?>
<section class="advices">
	<section class="content-top-banner">
		<div class="banner-text">
			<h1>Забота о близком</h1>
		</div>
	</section>
	<?
	$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
			"START_FROM" => '0',
			"PATH" => "",
			"SITE_ID" => "s1"
		)
	);
	?>
	<article>
		<section class="advices-tabs tabs">
			<nav class="tabs-inner">
				<div class="mobile-arrow"></div>
                <a href="/advices/zabota-o-blizkom/" class="tabs__item active top" onclick="ga('send','event','DP','DPZOB','zabota');">Забота о близком</a>
                <a href="/advices/poleznye-sovety/" class="tabs__item" onclick="ga('send','event','DP','DPSOV','sovet');">Полезные советы</a>
                <a href="/advices/" class="tabs__item" onclick="ga('send','event','DP','DPALLART','allarticle');">Все статьи</a>
			</nav>
		</section>
		<? $APPLICATION->IncludeComponent("bitrix:news.list","advices-list",Array(
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"AJAX_MODE" => "Y",
				"IBLOCK_TYPE" => "incontinence",
				"IBLOCK_ID" => "4",
				"NEWS_COUNT" => "200",
				"SORT_BY1" => "ID",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2" => "ACTIVE_FROM",
				"SORT_ORDER2" => "DESC",
				"FILTER_NAME" => "",
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
				"SET_TITLE" => "Y",
				"SET_BROWSER_TITLE" => "Y",
				"SET_META_KEYWORDS" => "Y",
				"SET_META_DESCRIPTION" => "Y",
				"SET_LAST_MODIFIED" => "Y",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
				"PARENT_SECTION" => 4,
				"PARENT_SECTION_CODE" => "",
				"INCLUDE_SUBSECTIONS" => "Y",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"CACHE_FILTER" => "Y",
				"CACHE_GROUPS" => "Y",
				"DISPLAY_TOP_PAGER" => "Y",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "Партнеры",
				"PAGER_SHOW_ALWAYS" => "Y",
				"PAGER_TEMPLATE" => "",
				"PAGER_DESC_NUMBERING" => "Y",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "Y",
				"PAGER_BASE_LINK_ENABLE" => "Y",
				"SET_STATUS_404" => "Y",
				"SHOW_404" => "Y",
				"MESSAGE_404" => "",
				"PAGER_BASE_LINK" => "",
				"PAGER_PARAMS_NAME" => "arrPager",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_ADDITIONAL" => ""
			)
		);?>
	</article>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>