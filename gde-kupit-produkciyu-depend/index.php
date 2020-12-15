<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Где купить продукцию Depend.ru");
$APPLICATION->SetTitle("Где купить - Depend.ru");
$APPLICATION->AddChainItem('Где купить', '/shops/');
?>
<?$APPLICATION->AddHeadString('<meta property="og:description" content="Где купить продукцию Depend.ru"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:image" content="https://www.depend.ru/local/templates/depend/img/depend-logo.png"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:title" content="Где купить - Depend.ru">');?>
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