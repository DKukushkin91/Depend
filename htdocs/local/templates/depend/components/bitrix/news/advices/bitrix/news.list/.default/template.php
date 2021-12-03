<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die;
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>
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

<main class="main">
	<section class="about">
		<div class="container">
			<div class="about__wrap">
				<ul class="about__btn-list js-about-btns">
					<li class="about__btn-item">
						<button class="about__btn about__btn--active"><span class="about__btn-text">Все статьи</span></button>
					</li>
					<li class="about__btn-item">
						<button class="about__btn"><span class="about__btn-text">Для мужчин</span></button>
					</li>
					<li class="about__btn-item">
						<button class="about__btn"><span class="about__btn-text">Для женщин</span></button>
					</li>
				</ul>
				<ul class="about__list">
<?php foreach ($arResult['ITEMS'] as $arItem): ?>
	<li class="about__item"><a class="about__link" href="<?=$arItem['DETAIL_PAGE_URL']?>"></a>
		<div class="about__img">
			<?php if (is_array($arItem['PREVIEW_PICTURE'])): ?>
				<?php
					$arImage = $arItem['PREVIEW_PICTURE'];
				?>
			<?php else: ?>
				<?php
					$arImage = [
						'SRC' => '/f/img/preview-1.jpg',
						'ALT' => $arItem['NAME'],
						'TITLE' => $arItem['NAME']
					];
				?>
			<?php endif; ?>
			<img
				class="swiper-lazy"
				loading="lazy"
				src="<?=$arImage['SRC']?>"
				width="373"
				height="200"
				alt="<?=$arImage['ALT']?>"
				title="<?=$arImage['TITLE']?>"
			>
		</div>
		<div class="about__content">
			<div class="about__text-wrap">
				<p class="about__sub-title">
					<?php if ($arParams['DISPLAY_NAME'] != 'N' && $arItem['NAME']): ?>
						<?=$arItem['NAME']?>
					<?php endif; ?>
				</p>
				<p class="about__text">
					<?php if ($arParams['DISPLAY_PREVIEW_TEXT'] != 'N' && $arItem['PREVIEW_TEXT']): ?>
						<?=$arItem['PREVIEW_TEXT']?>
					<?php endif; ?>
				</p>
			</div>
			<div class="about__info-wrap">
				<div class="about__info">
					<svg class="about__icon" width="18" height="16">
						<use href="/f/img/sprite.svg#heart"></use>
					</svg><span class="about__info-text">5</span>
				</div>
				<div class="about__info">
					<svg class="about__icon" width="18" height="18">
						<use href="/f/img/sprite.svg#chat"></use>
					</svg><span class="about__info-text">10</span>
				</div>
				<div class="about__info about__info--align"><span class="about__info-text about__info-text--weight">Читать:</span><span class="about__info-text">10 мин</span></div>
			</div>
		</div>
	</li>
<?php endforeach; ?>
	<?//echo '<pre>';print_r($arResult);?>
				</ul>
				<?php if ($arResult['NAV_RESULT']->NavPageCount > $arResult['NAV_RESULT']->NavPageNomer): ?>
					<button
						class="about__preview-btn js-load-more-btn"
						<?//data-href="<?='/' . ltrim(CComponentEngine::MakePathFromTemplate($arResult['LIST_PAGE_URL'], ['SITE_DIR' => SITE_DIR]), '/') . '?PAGEN_' . $arResult['NAV_RESULT']->NavNum . '=' . ($arResult['NAV_RESULT']->NavPageNomer + 1)?>"
						data-href="<?='/advices/?PAGEN_' . $arResult['NAV_RESULT']->NavNum . '=' . ($arResult['NAV_RESULT']->NavPageNomer + 1) .  '&mode=ajax'?>"
						data-target=".about__list"
					><span class="about__preview-btn-text">Показать еще</span></button>
				<?php endif; ?>
			</div>
		</div>
	</section>
</main>
