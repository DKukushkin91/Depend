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
<? /*
<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>
 * 
 */