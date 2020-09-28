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
				$APPLICATION->IncludeComponent("bitrix:news.list","buy-list",Array(
						"IBLOCK_TYPE" => "buy",
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
							3 => "",
							4 => "",
						),
						"PROPERTY_CODE" => Array("LIKES", 'VIEWS', 'COMMENTS', 'TAGS', 'DATE_START', 'DATE_FINISH'),
						"PARENT_SECTION" => $item['ID'],
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "Y",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "3600",
						"CACHE_FILTER" => "Y",
						"CACHE_GROUPS" => "Y",
						"PAGER_BASE_LINK" => "",
						"PAGER_PARAMS_NAME" => "arrPager",
						"FIRST_ELEMENT" => ($index == 0) ? '1' : ''
					)
				);
			}
			?>
        </div>
