<?php
    // $arResult['categories'] - список категорий
    // $arResult['products'] - список товаров
    // var_dump($arResult['categories']);
?>
<?/* $APPLICATION->IncludeComponent('tradeup:catalog.category.top', '', [
    'section' => $arResult['section']
]); */?>


    <?/*$APPLICATION->IncludeComponent("depend:top-image", 'index', [
            'IBLOCK_ID' => 1
        ]
    );



        */


    ?>
<div class="content-top-banner">
    <div class="banner-text">

        <?
        $rsSections = CIBlockSection::GetList(array(),array('IBLOCK_ID' => 1, '=CODE' => $arParams['section_code']));
        if ($arSection = $rsSections->Fetch())
        {
            $sectionName = $arSection['NAME'];
        }
        if ($_GET['category'] === null) {
			$sectionName = 'Продукция';
		}
        ?>
        <h2>Продукция</h2>
        
    </div>
</div>
<?
$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
		"START_FROM" => '0',
		"PATH" => "",
		"SITE_ID" => "s1"
	)
);
?>
<div class="content-products-tabs tabs">
    <nav class="tabs-inner">
        <div class="mobile-arrow"></div>
        <a data-id="0" data-code="" class="js-subcats-click tabs__item top <?if ($_SERVER['REQUEST_URI'] === '/catalog/'): ?>active <? else:?><?endif;?>" onclick="ga('send','event','DP','DPALL','all');">Вся продукция</a>
        <a data-id="1" data-code="prokladki-dlya-zhenshchin/"  class="js-subcats-click tabs__item <?if (strpos($_SERVER['REQUEST_URI'], '/prokladki-dlya-zhenshchin/') == true): ?>active <? else:?><?endif;?>" onclick="ga('send','event','DP','DPPW','prwomen');">Прокладки для женщин</a>
        <a data-id="2" data-code="vpityvayushchee-bele-dlya-zhenshchin/"  class="js-subcats-click tabs__item <?if (strpos($_SERVER['REQUEST_URI'], '/vpityvayushchee-bele-dlya-zhenshchin/') == true): ?>active <? else:?><?endif;?>" onclick="ga('send','event','DP','DPBW','belwomen');">Впитывающее белье для женщин</a>
        <a data-id="3" data-code="vpityvayushchee-bele-dlya-muzhchin/"  class="js-subcats-click tabs__item <?if (strpos($_SERVER['REQUEST_URI'], '/vpityvayushchee-bele-dlya-muzhchin/') == true): ?>active <? else:?><?endif;?>" onclick="ga('send','event','DP','DPPM','belman');">Впитывающее белье для мужчин</a>
    </nav>
</div>
<article class="content-products">
<?$APPLICATION->IncludeComponent(
	"depend:catalog.category",
	"list",
	Array(
		'filter' => false,
		'section_code' => htmlspecialchars(strip_tags(trim($_GET['category']))),
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y"
	),
	false
);
?>
</article>
<?/* if ($_SESSION['looked']): ?>
<div class="also-goods">
    <div class="also-goods__title">
        Ранее вы смотрели
    </div>
    <div class="also-goods-items">
<!--        --><?//$APPLICATION->IncludeComponent(
//            "tradeup:last.viewed",
//            ".default",
//            []
//        );?>
    </div>
</div>
<? endif; */?>
<script>
    window.catalogCategoryConfig = {
        ajaxPath: '<?= $this->GetFolder() ?>/ajax.php',
        category: '<?= $arResult['section']['CODE'] ?>',
        categoryId: '<?= $arResult['section']['ID'] ?>',
        pages: <?= $arResult['pages_count'] ?>
    };
</script>
