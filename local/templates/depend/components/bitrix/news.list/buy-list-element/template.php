<?php
    // $arResult['categories'] - список категорий
    // $arResult['products'] - список товаров
    // var_dump($arResult['categories']);
?>
<div class="buy-popup-inner">
	<? foreach ($arResult['ITEMS'] as $index => $item):
		$image = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], [
			'width' => 198,
			'height' => 55,
		], BX_RESIZE_IMAGE_PROPORTIONAL)['src'];
        ?>

        <div class="buy-popup-item">
            <img src="<?= $image;?>" class="buy-popup-icon" alt="<?= $item['NAME']; ?>">
            <a target="_blank" href="<?= $item['PROPERTIES']['LINK']['VALUE']; ?>" class="buy-popup-button">Смотреть каталог</a>
        </div>
	<? endforeach; ?>
</div>

