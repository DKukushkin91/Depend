<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="headermenu__ul headermenu__ul1  g-clearfix">
<?
$previousLevel = 0;
foreach($arResult as $index => $arItem):
    $isLast = ($index == sizeof($arResult) - 1);
    ?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="headermenu__li headermenu__li1 <?= ($isLast) ? 'header__li1_last' : '' ?>"><a href="<?=$arItem["LINK"]?>" class="headermenu__a headermenu__a1 <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="headermenu__ul headermenu__ul2 submenu">
		<?else:?>
			<li class="headermenu__li headermenu__li2 <?if ($arItem["SELECTED"]):?><?endif?> <?= ($isLast) ? 'header__li1_last' : '' ?>"><a href="<?=$arItem["LINK"]?>" class="headermenu__a headermenu__a2 parent"><?=$arItem["TEXT"]?></a>
				<ul class="headermenu__ul headermenu__ul2 submenu">
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="headermenu__li headermenu__li1 <?= ($isLast) ? 'header__li1_last' : '' ?>"><a href="<?=$arItem["LINK"]?>" class="headermenu__a headermenu__a1 <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li class="headermenu__li headermenu__li2 <?if ($arItem["SELECTED"]):?>item-selected<?endif?>"><a href="<?=$arItem["LINK"]?>" class="headermenu__a headermenu__a2"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="headermenu__li headermenu__li1 <?= ($isLast) ? 'header__li1_last' : '' ?>"><a href="" class="headermenu__a headermenu__a1 <?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li class="headermenu__li headermenu__li2 "><a href="" class="headermenu__a headermenu__a2 denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>

                <? if (isAuthorized()): ?>
                 <div class="mobile-btns-new no-desk">
                     <div class="mobile-btn-name">
                         <a <?= ($APPLICATION->GetCurDir() !== '/personal/profile/') ? 'href="/personal/profile/#tool-about"' : '' ?>  class="js-profile-toolbar-about js-profile-toolbar" data-type="about">Личный кабинет</a>
                     </div>
                     <div class="mobile-btn-orders">
                         <a <?= ($APPLICATION->GetCurDir() !== '/personal/profile/#') ? 'href="/personal/profile/#tool-orders"' : '' ?> class="js-profile-toolbar js-profile-toolbar-orders" data-type="orders">Мои заказы</a>
                     </div>
                     <div class="mobile-btn-featured">
                         <a <?= ($APPLICATION->GetCurDir() !== '/personal/profile/') ? 'href="/personal/profile/#tool-favor"' : '' ?> class="js-profile-toolbar-favourite js-profile-toolbar" data-type="favourite">Избранные товары</a>
                     </div>
                     <div class="mobile-btn-exit">
                         <a href="/personal/logout.php">Выйти</a>
                     </div>
                 </div>
                <? else: ?>
    <div class="mobile-btns">
         <div class="mobile-bnt-reg">
             <a href="/personal/register/" class="js-show-register">ЗАРЕГИСТРИРОВАТЬСЯ</a>
         </div>
         <div class="mobile-bnt-auth">
             <? if (isAuthorized()): ?>
             <a href="/personal/profile">ЛИЧНЫЙ КАБИНЕТ</a>
             <? else : ?>
             <a class="js-show-login" href="#login-dialog">ЛИЧНЫЙ КАБИНЕТ</a>
             <? endif; ?>
         </div>
    </div>
                <? endif; ?>
<div class="menu-clear-left"></div>
<?endif?>
