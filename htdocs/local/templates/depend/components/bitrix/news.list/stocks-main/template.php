<div class="sales__slider swiper js-sales-slider">
	<ul class="sales__list swiper-wrapper">
		<? foreach ($arResult['ITEMS'] as $index => $item):?>
		<?if($item['PREVIEW_PICTURE']['SRC']){$img=$item['PREVIEW_PICTURE']['SRC'];}else{$img='/f/img/ya-item2.jpg';}?>
		<?
			$logo = CFile::ResizeImageGet($value['PROPERTIES']['LOGO']['VALUE'], array(), BX_RESIZE_IMAGE_EXACT, false);
		?>
		<li class="sales__item swiper-slide">
			<div class="sales__images">
				<div class="sales__img"><img class="swiper-lazy" data-src="<?=$img?>" alt="<?=$item['NAME'];?>" width="373"
						height="190">
					<div class="lazy-preloader swiper-lazy-preloader"></div>
				</div>
				<div class="sales__logo"><img src="<?=$logo['src']?>" alt="" width="60" height="60"></div>
			</div>
			<div class="sales__content">
				<h3 class="sales__sub-title"><?=$item['NAME']; ?></h3>
				<p class="sales__text"><?=$item['PREVIEW_TEXT']; ?></p>
				<a class="sales__link" href="<?=$item['PROPERTIES']['LINK']['VALUE']; ?>" target="_blank" rel="noopener noreferrer">В магазин</a>
			</div>
		</li>
		<? endforeach; ?>
	</ul><a class="sales__more-link" href="#">Все акции</a>
</div>
<button class="sales__slider-btn sales__slider-prev-btn js-sales-prev"></button>
<button class="sales__slider-btn sales__slider-next-btn js-sales-next"></button>
