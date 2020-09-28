<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Где купить");
$APPLICATION->AddChainItem('Где купить', '/shops/');
?><div class="shops">
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