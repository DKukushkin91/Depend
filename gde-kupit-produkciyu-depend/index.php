<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Где купить продукцию Depend.ru");
$APPLICATION->SetTitle("Где купить - Depend.ru");
$APPLICATION->AddChainItem('Где купить', '/shops/');
?>
<?$APPLICATION->AddHeadString('<meta property="og:description" content="Где купить продукцию Depend.ru"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:image" content="https://www.depend.ru/upload/iblock/8d5/8d51b78ecd8ca654937117ec8037c88f.jpg"/>');?>
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