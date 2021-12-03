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
<main class="main">
	<section class="about-item">
		<div class="container">
<?php
$APPLICATION->IncludeComponent(
	'bitrix:breadcrumb',
	'news.detail',
	[
		'START_FROM' => 1,
		'PATH' => '',
		'SITE_ID' => SITE_ID
	]
);
?>
		<div class="about-item__wrap">
			<h1 class="about-item__title"><?=$arResult['NAME']?></h1>
			<div class="about-item__avatar-wrap">
				<div class="about-item__avatar-box">
					<div class="about-item__avatar-img"><img src="/f/img/avatar.png" alt="" width="60" height="60"></div>
					<div class="about-item__avatar-content"><span class="about-item__avatar-text">Александра Новикова</span><span class="about-item__avatar-text about-item__avatar-text--font">Врач-уролог</span></div>
				</div>
				<div class="about-item__avatar-content about-item__avatar-content--row"><span class="about-item__avatar-text about-item__avatar-text--fw">Время чтения:</span><span class="about-item__avatar-text about-item__avatar-text--color">20 мин</span></div>
			</div>
			<div class="about-item__content-wrap">
				<?php if ($arParams['DISPLAY_PICTURE'] != 'N' && is_array($arResult['DETAIL_PICTURE'])): ?>
					<div class="about-item__title-img">
						<img
							src="<?=$arResult['DETAIL_PICTURE']['SRC']?>"
							alt="<?=$arResult['DETAIL_PICTURE']['ALT']?>"
							title="<?=$arResult['DETAIL_PICTURE']['TITLE']?>"
							width="<?=$arResult['DETAIL_PICTURE']['WIDTH']?>"
							height="<?=$arResult['DETAIL_PICTURE']['HEIGHT']?>"
							loading="lazy"
						>
					</div>
				<?php endif; ?>
				<div class="about-item__maintenance">
					<h2 class="about-item__list-title">Содержание:</h2>
					<?=$arResult['PROPERTIES']['CONTENTS']['~VALUE']?>
				</div>
				<div class="about-item__content">
					<?=$arResult['DETAIL_TEXT']?>
					<br>
				</div>
			</div>



		</div>
	</section>
	<section class="social">
		<div class="container social__container">
			<div class="social__wrap">
<?php
$APPLICATION->IncludeComponent(
	'bitrix:rating.vote',
//	'',
	'like',
	[
		'ENTITY_TYPE_ID' => 'IBLOCK_ELEMENT',
		'ENTITY_ID' => $arResult['ID'],
	],
	null,
	['HIDE_ICONS' => 'Y']
);
?>
				<div class="social__wrap"><span class="social__text">Поделиться</span>
					<ul class="social__list">
						<li class="social__item"><a class="social__link social__link--fb" href="#" target="_blank" rel="noopener noreferrer"></a></li>
						<li class="social__item"><a class="social__link social__link--ok" href="#" target="_blank" rel="noopener noreferrer"></a></li>
						<li class="social__item"><a class="social__link social__link--vk" href="#" target="_blank" rel="noopener noreferrer"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
</main>
