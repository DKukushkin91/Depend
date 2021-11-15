<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    global $isCatalog;
    $isCatalog = "true";
    $product = $arResult['product'];
    $props = $product['props'];
    $images = $product['images'];
    $kharakteristiki = $product['kharakteristiki'];

    $dropNames = [
        1 => 'При капельном недержании',
        2 => 'При капельном недержании',
        3 => 'При капельном недержании',
        4 => '',
        5 => '',
        6 => '',
        7 => 'Максимальная впитываемость',
    ];
?>
<section class="content-top-banner">
    <div class="banner-text">
        <h1><?= $product['NAME'] ?></h1>
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
<section class="main-prod-card">
    <div class="flex-product-card">
        <div class="product-photo">
            <div class="photo-selector">
                <? foreach($images as $index => $image): ?>
                    <div data-large="<?= $image['large']; ?>" data-medium="<?= $image['medium']; ?>" class="selector-button <?= $index == 0 ? 'current-photo' : '' ?>"><img src="<?= $image['medium'];?>" alt=""></div>
                <? endforeach ?>
            </div>
            <a href="<?= $images[0]['large']; ?>" class="big-photo fancy-image">
                <img src="<?= $images[0]['medium']; ?>" alt="">
            </a>
        </div>
        <div class="product-description">
            <div class="incontinence-rate">
                <div class="droplets">
                    <? for ($i = 1; $i <= 7; $i++): ?>
                    <span class="drop <?= $i <= $props['DROPS']['VALUE'] ? 'pink' : '' ?>"></span>
                    <? endfor ?>
                </div>
                <span><?= $dropNames[$props['DROPS']['VALUE']] ?></span>
            </div>
            <? if ($product['IBLOCK_SECTION_ID'] == 3 || $product['IBLOCK_SECTION_ID'] == 2): ?>
                <div class="size-block">
                <div class="size-info">
                    <span>Размер:</span><div class="size-value"><?= $props['SIZE']['VALUE'] ?></div>
                </div>
                <div class="size-info">
                    <span>Объем бедер:</span><div class="size-value"><?= $props['HIP_SIZE']['VALUE']; ?></div>
                </div>
            </div>
            <? endif; ?>
            <div>
                <h3>О продукте</h3>
                <p><?= $product['DETAIL_TEXT'] ?></p>
            </div>
            <a href="#where-can-buy" class="buy js-buy-item">Купить</a>
        </div>
    </div>
    <div class="product-card-separator"></div>
    <div class="full-characteristics">
        <h3 class="txt-center">Полные характеристики</h3>
        <div class="all-properties txt-center">
            <? foreach($kharakteristiki as $kh): ?>
            <div class="basic-property js-element-kh">
                <img src="<?= CFile::GetPath($kh['PREVIEW_PICTURE']) ?>" alt="">
                <span class="name-prop"><?= $kh['NAME']; ?></span>
            </div>
            <? endforeach ?>
        </div>
		<? if ($product['IBLOCK_SECTION_ID'] == 3 || $product['IBLOCK_SECTION_ID'] == 2): ?>
            <p><?= $props['UPPER_LIST_TEXT']['VALUE']; ?></p>
            <ul>
                <? foreach ($props['LIST']['VALUE'] as $item): ?>
                <li><?= $item; ?></li>
                <?endforeach;?>
            </ul>
            <? else: ?>
            <? foreach($kharakteristiki as $kh): ?>
                <div class="characteristics-info js-element-kh-info">
                    <h4><?= $kh['NAME'] ?></h4>
                    <p><?= $kh['PREVIEW_TEXT'] ?></p>
                    <? if(!empty($kh['DETAIL_TEXT'])):?>
                        <span class="prop-footnote"><?= $kh['DETAIL_TEXT'] ?></span>
                    <? endif ?>
                </div>
            <? endforeach ?>
        <? endif; ?>
		<? if ($product['IBLOCK_SECTION_ID'] == 3 || $product['IBLOCK_SECTION_ID'] == 2): ?>
            <div class="size-block">
                <div class="size-info">
                    <span>Размер:</span><div class="size-value"><?= $props['SIZE']['VALUE'] ?></div>
                </div>
                <div class="size-info">
                    <span>Объем бедер:</span><div class="size-value"><?= $props['HIP_SIZE']['VALUE']; ?></div>
                </div>
                <div class="size-info">
                    <span>Впитываемость:</span>
                    <div class="droplets">
						<? for ($i = 1; $i <= 7; $i++): ?>
                            <span class="drop <?= $i <= $props['DROPS']['VALUE'] ? 'pink' : '' ?>"></span>
						<? endfor ?>
                    </div>
                </div>
            </div>
            <span class="prop-footnote pants-footnote"><?=$props['UNDER_LIST_TEXT']['VALUE'];?></span>
        <?else:?>
        <? endif; ?>
    </div>
</section>
<section class="main-incontinence-block">
	<?$APPLICATION->IncludeFile('/local/templates/depend/includes/advices.php') ?>
</section>