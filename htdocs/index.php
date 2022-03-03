<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<section class="top top--main-page">
	<div class="container main-page__container">
	<?$APPLICATION->IncludeComponent("depend:index-slider", 'index', [
			'IBLOCK_ID' => CIBlockTools::GetIBlockId('index-slider'),
			'ACTIVE' => 'Y'
		]
	);?>
	</div>
</section>
<main class="main">
	<section class="preview-catalog">
		<div class="container">
			<div class="preview-catalog__wrap">
				<div class="preview-catalog__img"><img src="/f/img/depend-prod.png" alt="" width="492" height="218"></div>
				<div class="preview-catalog__content">
					<h2 class="preview-catalog__title">Выберите подходящую продукцию:</h2>
					<ul class="preview-catalog__list">
						<li class="preview-catalog__item"><a class="preview-catalog__link" href="/catalog/vpityvayushchee-bele-dlya-muzhchin/">Для мужчин</a></li>
						<li class="preview-catalog__item"><a class="preview-catalog__link" href="/catalog/vpityvayushchee-bele-dlya-zhenshchin/">Для женщин</a></li>
						<li class="preview-catalog__item"><a class="preview-catalog__link" href="/catalog/poslerodovye-prokladki/">После родов</a></li>
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
				<a class="article__b-link" href="/advices/">Все статьи</a>
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
					<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"stocks-main",
					Array(
						"CACHE_TYPE" => "Y",
						"CAHCE_TIME" => 604800,
						"DETAIL_PROPERTY_CODE" => array('*'),
						"FIELD_CODE" => array('*'),
						"IBLOCK_ID" => CIBlockTools::GetIBlockId('stocks'),
						"PROPERTY_CODE" => array('*'),
						"SET_STATUS_404" => "Y",
						"SET_TITLE" => "N",
						"SHOW_404" => "Y",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC"
					)
					);?>
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