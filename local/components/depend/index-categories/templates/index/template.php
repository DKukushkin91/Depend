<div class="main-categories">
	<? foreach($arResult['items'] as $item): ?>
    <div class="main-categories-item">
        <div class="categories__image">
            <img src="<?= $item['PREVIEW_PICTURE']; ?>" alt="<?= $item['NAME']; ?>">
        </div>
        <div class="categories-text">
            <div class="categories-text__title">
                <h3><?= $item['NAME']; ?></h3>
            </div>
            <a href="<?= $item['PROPERTY_LINK_VALUE']; ?>" class="categories-text__btn <? if ($item['PROPERTY_LINK_VALUE'] == '/catalog/vpit-men/'): ?>categories-text__btn--green <? endif; ?>">Смотреть каталог</a>
        </div>
    </div>
	<? endforeach; ?>
</div>