<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Урологические товары и впитывающее белье Depend, следите за новинками на официальном сайте бренда Депенд | Depend.ru
");
$APPLICATION->SetPageProperty("title", "Урологические товары и впитывающее белье Depend - официальный сайт бренда Депенд | Depend.ru");
?>
<?$APPLICATION->AddHeadString('<meta property="og:description" content="Урологические товары и впитывающее белье Depend, следите за новинками на официальном сайте бренда Депенд | Depend.ru"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:image" content="https://www.depend.ru/local/templates/depend/img/depend-logo.png"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:title" content="Урологические товары и впитывающее белье Depend - официальный сайт бренда Депенд | Depend.ru">');?>

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