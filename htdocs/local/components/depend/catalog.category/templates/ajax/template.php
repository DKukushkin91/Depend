<? foreach($arResult['items'] as $index => $item):?>
    <section class="product-card">
        <a href="<?=$item['DETAIL_PAGE_URL']?>">
            <div class="product-card-top">
                <img class="product-card-top__image" src="<?= $item['PREVIEW_PICTURE']?>">
                <div class="product-card-top__descr"><?=$item['NAME'] ?></div>
            </div>
            <div class="product-card-bottom">
                <span class="product-card-bottom__btn btn">Подробнее</span>
            </div>
        </a>
    </section>
<? endforeach;?>
