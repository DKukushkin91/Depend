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

ob_start();
?>
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
<?php
$html = ob_get_clean();

$href = '';
if ($arResult['NAV_RESULT']->NavPageCount > $arResult['NAV_RESULT']->NavPageNomer) {
	$href = '/' . ltrim(CComponentEngine::MakePathFromTemplate($arResult['LIST_PAGE_URL'], ['SITE_DIR' => SITE_DIR]), '/') . '?PAGEN_' . $arResult['NAV_RESULT']->NavNum . '=' . ($arResult['NAV_RESULT']->NavPageNomer + 1);
}

$APPLICATION->restartBuffer();

echo json_encode([
	'html' => $html,
	'href' => $href
]);
die;