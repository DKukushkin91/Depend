<?php
    // $arResult['categories'] - список категорий
    // $arResult['products'] - список товаров
    // var_dump($arResult['categories']);
?>
<?/*<div class="category__content-catalog">
<div class="catalog__list per3 caregory__content-catalog_content">
    <div class="js-category-products-list catalog-product-list">
        <? foreach($arResult['items'] as $index => $item):?>
        <div class="catalog-item-card">
            <a href="<?= $item['DETAIL_PAGE_URL'] ?>">
                <div class="catalog-item__img">
                    <? if ($item["IBLOCK_SECTION_ID"] == 1): ?>
                    <? foreach ( $item['colors_goods'] as $color_good) :?>
                        <img class="item-img-two" data-type="<?=$color_good['url'] ?>"  src="<?= $color_good['image'] ?>" alt="">
                    <? endforeach; ?>
                    <? else: ?>
                        <img class="item-img-one active" src="<?= $item['PREVIEW_PICTURE'] ?>" alt="">
                    <? endif; ?>
                </div>
            </a>
            <form class="item-conf" action="">
                <? if ($item["IBLOCK_SECTION_ID"] == 1): ?>
                <div class="item-color-checkbox">
                    <? $index = 0; ?>
                    <? foreach ( $item['colors_goods'] as $color_good) :?>
                    <? $index ++; ?>
                        <label
                            class=" color-label js-click-label <? if ($index == 1): ?>checked<? endif; ?><? $color_good['url'] = explode('_',$color_good['url']); ?> <?= $color_good['url'][2] ?> color-label-<?= $index ?>"
                            for="color-<?= $index ?>"
                            style="background: url('/local/templates/tradeup/img/<?= $color_good['url'][2] ?>.svg') center no-repeat;"
                        >
                            <input
                                class="color-input" id='<?= $color_good['url'][2] ?>'
                                name="color-<?= $index ?>"
                                type="radio"
                                checked
                            >
                        </label>
                    <? endforeach; ?>
                </div>
                <?endif;?>
                <div class="item-name">
                    <div class="item-name-brand"><?= $item['PROPERTY_NAME2_VALUE'] ?></div>
                    <div class="item-name-model"><?= $item['NAME'] ?></div>
                </div>
                <div class="item-price"><?= number_format($item['CATALOG_PRICE_1'], 0, '.', ' ') ?> &#8381;</div>
                <?if($item['CATALOG_QUANTITY'] == 0): ?>
                Нет в наличии
            <? elseif($item['in_cart']): ?>
                <a href="/personal/cart/" class="item-submit">Перейти<br>в корзину</a>
            <? else: ?>
                <a  class="item-submit js-catalog-list-tocart js-catalog-tocart" data-id="<?= $item['ID'] ?>" >Купить</a>
            <? endif; ?>
<!--                <a  class="item-submit">Купить</a>-->
            </form>
        </div>
        <? endforeach;?>
        </div>
    </div>
</div>*/?>
<?
$rsSections = CIBlockSection::GetList(array(),array('IBLOCK_ID' => 1, '=CODE' => $arParams['section_code']));
if ($arSection = $rsSections->Fetch())
{
	$sectionName = $arSection['NAME'];
}
if ($arParams['section_code'] === '') {
    $sectionName = 'Вся продукция';
}
?>
            <div class="content-products-group js-category-load">
                <h1><?= $sectionName?></h1>
                <div class="content-group-items ">
					<? foreach($arResult['items'] as $index => $item):?>
                    <div class="product-card">
                        <a href="<?=$item['DETAIL_PAGE_URL']?>">
                            <div class="product-card-top">
                                <img class="product-card-top__image" src="<?= $item['PREVIEW_PICTURE']?>" alt="<?=$item['NAME']?>">
                                <div class="product-card-top__descr"><?=$item['NAME']?></div>
                            </div>
                            <div class="product-card-bottom">
                                <span class="product-card-bottom__btn btn">Подробнее</span>
                            </div>
                        </a>
                    </div>
                    <? endforeach;?>
                </div>
            </div>

