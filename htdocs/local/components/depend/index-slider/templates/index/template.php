<div class="top__slider swiper js-main-slider">
	<div class="top__slider-wrap swiper-wrapper">        
    <? foreach($arResult['items'] as $index => $item): ?>
		<div class="top__slide swiper-slide">
			<div class="top__slide-img">
                <img class="swiper-lazy" loading="lazy" data-src="<?=$item['PROPERTY_IMAGE_1280']?>" alt="<?=$item['NAME'];?>" width="1280" height="440">
				<div class="lazy-preloader swiper-lazy-preloader"></div>
			</div>
			<div class="top__slide-content">
				<h2 class="top__slide-title"><?=$item['NAME'];?></h2>
				<p class="top__slide-text"><?=$item['PREVIEW_TEXT'];?></p>
                <a class="top__slide-link" href="<?=$item['PROPERTY_LINK_VALUE'];?>">Подробнее</a>
			</div>
		</div>
    <? endforeach; ?>
	</div>
	<div class="top__slider-pagination js-slider-pagination"></div>
	<div class="top__slider-navigation">
		<button class="top__slider-prev-btn js-slider-prev"></button>
		<button class="top__slider-next-btn js-slider-next"></button>
	</div>
</div>