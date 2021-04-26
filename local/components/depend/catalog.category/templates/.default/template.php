
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
        <h1><?= $sectionName?></h1>
        
    </div>
</div> 
<?
$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
		"START_FROM" => '0',
		"PATH" => "",
		"SITE_ID" => "s1"
	)
);
$ipropValues = new \Bitrix\Iblock\InheritedProperty\SectionValues(1, $arSection['ID']);
if ($arSection['ID']){
$seoRes = $ipropValues->getValues();
$APPLICATION->SetPageProperty("title", $seoRes['SECTION_META_TITLE']);
$APPLICATION->SetPageProperty("description",  $seoRes['SECTION_META_DESCRIPTION']);
$APPLICATION->SetPageProperty("keywords",  $seoRes['SECTION_META_KEYWORDS']);
$APPLICATION->SetTitle($seoRes['SECTION_META_TITLE']);

$APPLICATION->AddHeadString('<meta property="og:description" content="'.$seoRes['SECTION_META_DESCRIPTION'].'"/>');
$APPLICATION->AddHeadString('<meta property="og:image" content="https://www.depend.ru/local/templates/depend/img/depend-logo.png"/>');
$APPLICATION->AddHeadString('<meta property="og:title" content="'.ucfirst($seoRes['SECTION_META_TITLE']).'"/>');
$APPLICATION->AddHeadString('<meta property="og:type" content="website">');
}
?>

<div class="content-products-tabs tabs">
    <nav class="tabs-inner">
        <div class="mobile-arrow"></div>
        <a data-id="0" data-code="" class="js-subcats-click tabs__item top <?if ($_SERVER['REQUEST_URI'] === '/catalog/'): ?>active <? else:?><?endif;?>" onclick="ga('send','event','DP','DPALL','all');">Вся продукция</a>
        <a data-id="1" data-code="prokladki-dlya-zhenshchin/"  class="js-subcats-click tabs__item <?if (strpos($_SERVER['REQUEST_URI'], '/prokladki-dlya-zhenshchin/') == true): ?>active <? else:?><?endif;?>" onclick="ga('send','event','DP','DPPW','prwomen');">Прокладки для женщин</a>
        <a data-id="2" data-code="vpityvayushchee-bele-dlya-zhenshchin/"  class="js-subcats-click tabs__item <?if (strpos($_SERVER['REQUEST_URI'], '/vpityvayushchee-bele-dlya-zhenshchin/') == true): ?>active <? else:?><?endif;?>" onclick="ga('send','event','DP','DPBW','belwomen');">Впитывающее белье для женщин</a>
        <a data-id="3" data-code="vpityvayushchee-bele-dlya-muzhchin/"  class="js-subcats-click tabs__item <?if (strpos($_SERVER['REQUEST_URI'], '/vpityvayushchee-bele-dlya-muzhchin/') == true): ?>active <? else:?><?endif;?>" onclick="ga('send','event','DP','DPPM','belman');">Впитывающее белье для мужчин</a>
        <a data-id="10" data-code="poslerodovye-prokladki/"  class="js-subcats-click tabs__item <?if (strpos($_SERVER['REQUEST_URI'], '/poslerodovye-prokladki/') == true): ?>active <? else:?><?endif;?>" onclick="ga('send','event','DP','DPPM','vpit');">Послеродовые прокладки</a>
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
