<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Где купить");
$APPLICATION->AddChainItem('Где купить', '/shops/');
?>

<section class="shops">
    <section class="content-top-banner">
        <div class="banner-text">
            <h1>Где купить</h1>
<!--            <div class="banner-text__subtitle">Вы можете купить продукцию Depend® в магазинах вашего города или онлайн.</div>-->
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
		<?$APPLICATION->IncludeFile('/local/templates/depend/includes/buy_where.php') ?>
    </article>

</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
