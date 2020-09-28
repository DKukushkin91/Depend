<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$APPLICATION->AddChainItem('Поиск', '/search/');
?>
<section class="search">
    <section class="content-top-banner">
        <div class="banner-text">
            <h1>Поиск</h1>
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
        <h2>Ищите комфортные решения</h2>
        <section class="search-line">
            <form action="" method="get" class="js-search-form">
                <input type="text" placeholder="Например, ночное впитывающее белье" name="q" value="<?=$_REQUEST['q_original']?>" class="js-search-q" autocomplete="off">
                <div class="search-btn">
                    <div class="search-btn__img"></div>
                    <button type="submit">Поиск</button>
                </div>
            </form>
        </section>
        <section class="search-answer">
            <div class="search-answer__text">
                <? if ($arResult['REQUEST']['QUERY']): ?>
                По вашему запросу «<span><?= $arResult['REQUEST']['QUERY'] ?></span>» найдено <span><?= $arResult['total_found'] ?> <?= getWordEnd($arResult['total_found'], ['результат', 'результата', 'результатов']) ?></span>
                <? endif;?>
            </div>
        </section>
        <section class="search-result">
            <? foreach($arResult['ITEMS'] as $index => $item):   ?>
                <a class="product-card-link" href="<?= $item['DETAIL_PAGE_URL']; ?>">
                    <section class="product-card">
                        <div class="product-card-top">
                            <img class="product-card-top__image" src="<?= $item['PREVIEW_PICTURE']; ?>">
                            <div class="product-card-top__descr"><?= $item['NAME']; ?></div>
                        </div>
                        <div class="product-card-bottom">
                            <span class="product-card-bottom__btn btn">Подробнее</span>
                        </div>
                    </section>
                </a>
            <? endforeach;?>
        </section>
    </article>
</section>
<script>
    (function($){
        history.pushState({}, '', '/search/?q=' + $('.js-search-q').val() + '&s=');
    })(jQuery);
</script>
