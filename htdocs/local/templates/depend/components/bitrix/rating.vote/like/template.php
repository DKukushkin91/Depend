<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
?>

<span class="social__likes" id="bx-ilike-button-<?=htmlspecialcharsbx($arResult['VOTE_ID'])?>">
	<!--<span class="bx-ilike-left-wrap"><span class="bx-ilike-text">test</span></span>-->
	<button
		class="social__btn bx-ilike-left-wrap"
		<?=($arResult['VOTE_AVAILABLE'] == 'Y' ? '' : 'disabled')?>
	>
		<svg class="social__icon bx-ilike-text" width="28" height="25">
			<use href="/f/img/sprite.svg#b-heart"></use>
		</svg>
	</button>
	<span class="social__text" id="bx-ilike-count-<?=htmlspecialcharsbx($arResult['VOTE_ID'])?>">
		<span class="bx-ilike-right"><?=$arResult['TOTAL_VOTES']?></span>
	</span>
</span>
<script>
BX.ready(function() {
<?php if ($arResult['AJAX_MODE'] == 'Y'): ?>
	BX.loadCSS('/bitrix/components/bitrix/rating.vote/templates/like/popup.css');
	BX.loadCSS('/bitrix/components/bitrix/rating.vote/templates/like/style.css');
	BX.loadScript('/bitrix/js/main/rating_like.js', function() {
<?php endif; ?>
		if (!window.RatingLike && top.RatingLike) {
			RatingLike = top.RatingLike;
		}

		if (typeof(RatingLike) === 'undefined') {
			return false;
		}

		if (typeof(RatingLikeInited) === 'undefined') {
			RatingLikeInited = true;
			RatingLike.setParams({
				pathToUserProfile: '<?=CUtil::JSEscape($arResult['PATH_TO_USER_PROFILE'])?>'
			});
		}

		RatingLike.Set(
			'<?=CUtil::JSEscape($arResult['VOTE_ID'])?>',
			'<?=CUtil::JSEscape($arResult['ENTITY_TYPE_ID'])?>',
			'<?=IntVal($arResult['ENTITY_ID'])?>',
			'<?=CUtil::JSEscape($arResult['VOTE_AVAILABLE'])?>',
			'<?=$USER->GetId()?>',
			{LIKE_Y: '1', LIKE_N: '2', LIKE_D: '3'},
			'<?=CUtil::JSEscape($arResult['LIKE_TEMPLATE'])?>',
			'<?=CUtil::JSEscape($arResult['PATH_TO_USER_PROFILE'])?>'
		);

		if (typeof(RatingLikePullInit) === 'undefined') {
			RatingLikePullInit = true;
			BX.addCustomEvent('onPullEvent-main', function(command,params) {
				if (command == 'rating_vote') {
					RatingLike.LiveUpdate(params);
				}
			});
		}

<?php if ($arResult['AJAX_MODE'] == 'Y'): ?>
	});
<?php endif; ?>

});
</script>