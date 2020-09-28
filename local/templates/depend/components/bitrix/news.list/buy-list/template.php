<?php
?>
<div class="shops-tile <?= ($arParams['FIRST_ELEMENT'] == '1') ? 'active' : '' ?>">
	<? foreach ($arResult['ITEMS'] as $index => $item):
        ?>
        <div class="shop-card">
            <div class="shop-card-logo">
                <img src="<?= $item['PREVIEW_PICTURE']['SRC']; ?>" alt="<?= $item['NAME']; ?>">
            </div>
            <div class="shop-card-text">
                <div class="shop-card__title"><?= $item['NAME']; ?></div>
                <a rel="nofollow" href="<?= $item['PROPERTIES']['LINK']['VALUE']; ?>" target="_blank" class="shop-card__link">Перейти</a>
            </div>
        </div>
    <? endforeach; ?>
</div>

