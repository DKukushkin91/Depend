<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Depend прокладки");
$APPLICATION->SetTitle("Depend");
?>
<div class="main-page">
	<?$APPLICATION->IncludeComponent("depend:index-slider", 'index', [
			'IBLOCK_ID' => 2,
            "ACTIVE" => 'Y'
		]
	);?>
	
    <div class="main-incontinence-block">
		<h1>Предметы гигиены Depend</h1>
	</div>
	<?$APPLICATION->IncludeComponent("depend:index-categories", 'index', [
			'IBLOCK_ID' => 3,
			"ACTIVE" => 'Y'
		]
	);?>

    <div class="main-incontinence-block">
		<?$APPLICATION->IncludeFile('/local/templates/depend/includes/advices.php', ['indexElements' => '3', 'indexHowSort' => 'DESC']) ?>
    </div>
    <div class="main-shops">
        <h2>Где купить</h2>
        <div class="banner-text__subtitle">Вы можете купить продукцию Depend® в магазинах вашего города или онлайн.</div>
        <?$APPLICATION->IncludeFile('/local/templates/depend/includes/buy_where.php') ?>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>