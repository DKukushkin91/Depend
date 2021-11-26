<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<section class="top top--main-page">
	<?$APPLICATION->IncludeComponent("depend:index-slider", 'index', [
			'IBLOCK_ID' => 2,
            "ACTIVE" => 'Y'
		]
	);?>
</section>
<main class="main">
	<section class="preview-catalog">
		<div class="container">
			<div class="preview-catalog__wrap">
				<div class="preview-catalog__img"><img src="/f/img/depend-prod.png" alt="" width="492" height="218"></div>
				<div class="preview-catalog__content">
					<h2 class="preview-catalog__title">Выберите подходящую продукцию:</h2>
					<ul class="preview-catalog__list">
						<li class="preview-catalog__item"><a class="preview-catalog__link" href="#">Для мужчин</a></li>
						<li class="preview-catalog__item"><a class="preview-catalog__link" href="#">Для женщин</a></li>
						<li class="preview-catalog__item"><a class="preview-catalog__link" href="#">После родов</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="article">
		<div class="container article__container">
			<div class="article__wrap">
				<h2 class="article__title">О недержании</h2>
					<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"advices-main",
					Array(
						"CACHE_TYPE" => "Y",
						"CAHCE_TIME" => 604800,
						"DETAIL_PROPERTY_CODE" => array('*'),
						"FIELD_CODE" => array('*'),
						"IBLOCK_ID" => CIBlockTools::GetIBlockId('advices'),
						"PROPERTY_CODE" => array('*'),
						"SET_STATUS_404" => "Y",
						"SET_TITLE" => "N",
						"SHOW_404" => "Y",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC"
					)
					);?>
				<a class="article__b-link" href="#">Все статьи</a>
			</div>
		</div>
	</section>
	<section class="preview-shops">
		<div class="container">
			<div class="preview-shops__wrap">
				<div class="preview-shops__img"><img loading="lazy" src="/f/img/buy.jpg" alt="" width="590" height="300"></div>
				<div class="preview-shops__content">
					<h2 class="preview-shops__title">Купить</h2>
					<p class="preview-shops__text">Вы можете купить продукцию Depend в магазинах вашего города или онлайн</p><a
						class="preview-shops__link" href="#">Где купить</a>
				</div>
			</div>
		</div>
	</section>
	<section class="sales">
		<div class="container sales__container">
			<h2 class="sales__title">Акции от партнеров</h2>
			<div class="sales__slider swiper js-sales-slider">
				<ul class="sales__list swiper-wrapper">
					<li class="sales__item swiper-slide">
						<div class="sales__images">
							<div class="sales__img"><img class="swiper-lazy" data-src="/f/img/ya-item2.jpg" alt="" width="373"
									height="190">
								<div class="lazy-preloader swiper-lazy-preloader"></div>
							</div>
							<div class="sales__logo"><img src="/f/img/ya-logo.jpg" alt="" width="60" height="60"></div>
						</div>
						<div class="sales__content">
							<h3 class="sales__sub-title">Скидки до 40% на сайте Яндекс Маркет</h3>
							<p class="sales__text">C 01.10.2021 по 21.10.2021 скидки до 40% на прокладки Depend!</p><a
								class="sales__link" href="#" target="_blank" rel="noopener noreferrer">В магазин</a>
						</div>
					</li>
					<li class="sales__item swiper-slide">
						<div class="sales__images">
							<div class="sales__img"><img class="swiper-lazy" data-src="/f/img/item-ozone.jpg" alt="" width="373"
									height="190">
								<div class="lazy-preloader swiper-lazy-preloader"></div>
							</div>
							<div class="sales__logo"><img src="/f/img/ozon-logo.jpg" alt="" width="60" height="60"></div>
						</div>
						<div class="sales__content">
							<h3 class="sales__sub-title">Распродажа на Ozon.ru. Скидки до 80%!</h3>
							<p class="sales__text">Успейте приобрести белье от Depend со скидкой до 80%</p><a class="sales__link"
								href="#" target="_blank" rel="noopener noreferrer">В магазин</a>
						</div>
					</li>
					<li class="sales__item swiper-slide">
						<div class="sales__images">
							<div class="sales__img"><img class="swiper-lazy" data-src="/f/img/ya-item.jpg" alt="" width="373"
									height="190">
								<div class="lazy-preloader swiper-lazy-preloader"></div>
							</div>
							<div class="sales__logo"><img src="/f/img/ya-logo.jpg" alt="" width="60" height="60"></div>
						</div>
						<div class="sales__content">
							<h3 class="sales__sub-title">Скидки до 40% на сайте Яндекс Маркет</h3>
							<p class="sales__text">C 01.10.2021 по 21.10.2021 скидки до 40% на впитывающее нижнее белье Depend!</p><a
								class="sales__link" href="#" target="_blank" rel="noopener noreferrer">В магазин</a>
						</div>
					</li>
					<li class="sales__item swiper-slide">
						<div class="sales__images">
							<div class="sales__img"><img class="swiper-lazy" data-src="/f/img/ya-item.jpg" alt="" width="373"
									height="190">
								<div class="lazy-preloader swiper-lazy-preloader"></div>
							</div>
							<div class="sales__logo"><img src="/f/img/ya-logo.jpg" alt="" width="60" height="60"></div>
						</div>
						<div class="sales__content">
							<h3 class="sales__sub-title">Скидки до 40% на сайте Яндекс Маркет</h3>
							<p class="sales__text">C 01.10.2021 по 21.10.2021 скидки до 40% на впитывающее нижнее белье Depend!</p><a
								class="sales__link" href="#" target="_blank" rel="noopener noreferrer">В магазин</a>
						</div>
					</li>
					<li class="sales__item swiper-slide">
						<div class="sales__images">
							<div class="sales__img"><img class="swiper-lazy" data-src="/f/img/ya-item.jpg" alt="" width="373"
									height="190">
								<div class="lazy-preloader swiper-lazy-preloader"></div>
							</div>
							<div class="sales__logo"><img src="/f/img/ya-logo.jpg" alt="" width="60" height="60"></div>
						</div>
						<div class="sales__content">
							<h3 class="sales__sub-title">Скидки до 40% на сайте Яндекс Маркет</h3>
							<p class="sales__text">C 01.10.2021 по 21.10.2021 скидки до 40% на впитывающее нижнее белье Depend!</p><a
								class="sales__link" href="#" target="_blank" rel="noopener noreferrer">В магазин</a>
						</div>
					</li>
				</ul><a class="sales__more-link" href="#">Все акции</a>
			</div>
			<button class="sales__slider-btn sales__slider-prev-btn js-sales-prev"></button>
			<button class="sales__slider-btn sales__slider-next-btn js-sales-next"></button>
		</div>
	</section>
	<section class="recomindation">
		<div class="container recomendation__container">
			<h2 class="recomendation__title">Каждый день приносит новые возможности</h2>
			<p class="recomendation__text">Попробуйте выработать эти простые привычки и обретите жизнь заново! Прокладки
				и впитывающее белье Depend можно подобрать для любой степени недержания.</p>
		</div>
	</section>
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
