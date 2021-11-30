<section class="top top--about">
	<div class="container about__container">
		<div class="top__wrap">
			<div class="breadcrumb about__breadcrumb">
				<ul class="breadcrumb__list">
					<li class="breadcrumb__item"><a class="breadcrumb__link" href="#" title="Главная">Главная</a></li>
					<li class="breadcrumb__item"><span class="breadcrumb__link-current">О недержании</span></li>
				</ul>
			</div>
			<div class="top__img"><img src="/f/img/about-img.jpg" alt="" width="1280" height="440"></div>
			<h1 class="top__title">О недержании</h1>
		</div>
	</div>
</section>
        <section class="top top--products">
          <div class="container products__container">
            <div class="top__wrap">
              <div class="breadcrumb products__breadcrumb">
                <ul class="breadcrumb__list">
                  <li class="breadcrumb__item"><a class="breadcrumb__link" href="#" title="Продукция">Продукция</a></li>
                  <li class="breadcrumb__item"><span class="breadcrumb__link-current">Для женщин</span></li>
                </ul>
              </div>
              <div class="top__img"><img src="/f/img/for-woman.jpg" alt="" width="1280" height="440"></div>
              <h1 class="top__title">Продукция для женщин</h1>
            </div>
          </div>
        </section>

<section class="top top--main-page">
    <div class="container main-page__container">
        <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "index-slider",
        Array(
            "CACHE_TYPE" => "Y",
            "CAHCE_TIME" => 604800,
            "DETAIL_PROPERTY_CODE" => array('*'),
            "FIELD_CODE" => array('*'),
            "IBLOCK_ID" => CIBlockTools::GetIBlockId('index-slider'),
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