<div class="article__slider swiper js-info-slider">
	<ul class="article__slider-list swiper-wrapper">
		<? foreach ($arResult['ITEMS'] as $index => $item):?>
		<?if($item['PREVIEW_PICTURE']['SRC']){$img=$item['PREVIEW_PICTURE']['SRC'];}else{$img='/f/img/preview-1.jpg';}?>
		<li class="article__item swiper-slide">
			<div class="article__inner">
				<div class="article__img">
					<img class="swiper-lazy" loading="lazy" data-src="<?=$img?>" alt="<?=$item['NAME']; ?>" width="373" height="200">
					<div class="lazy-preloader swiper-lazy-preloader"></div>
				</div>
				<div class="article__content">
					<h3 class="article__s-title"><?=$item['NAME']; ?></h3>
					<p class="article__text"><?=$item['PREVIEW_TEXT']; ?></p><a class="article__p-link"
						href="<?=$item['DETAIL_PAGE_URL']?>">Читать полностью</a>
				</div>
			</div>
		</li>
		<? endforeach; ?>
	</ul>
</div>
