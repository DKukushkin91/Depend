<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Магазины партнеров, в которых можно купить нижнее белье Depend. Узнайте, где можно купить урологические прокладки Депенд | Depend.ru");
$APPLICATION->SetTitle("Магазины ритейлеров, в которых можно купить впитывающее белье Depend, где купить урологические прокладки Депенд");
$APPLICATION->AddChainItem('Где купить', '/shops/');
?>
<?$APPLICATION->AddHeadString('<meta property="og:description" content="Магазины партнеров, в которых можно купить нижнее белье Depend. Узнайте, где можно купить урологические прокладки Депенд | Depend.ru"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:image" content="https://www.depend.ru/local/templates/depend/img/depend-logo.png"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:title" content="Магазины ритейлеров, в которых можно купить впитывающее белье Depend, где купить урологические прокладки Депенд">');?>
<div class="shops">
    <div class="content-top-banner">
        <div class="banner-text">
            <h1>Где купить</h1>
        </div>
    </div>
	<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"",
	Array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0"
	)
);?>
    <article>
		<?$APPLICATION->IncludeFile('/local/templates/depend/includes/buy_where.php') ?>
    </article>

</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>