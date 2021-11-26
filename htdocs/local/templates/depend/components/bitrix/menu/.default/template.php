<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="nav">
	<ul class="nav__list">
		<?php
	    $onClickMenuArray = ["Продукция" => "onclick=\"ga('send','event','DP','DPP1','product');\"",
		                    "Где купить" => "onclick=\"ga('send','event','DP','DPG1','wherebuy');\"",
		                    "О недержании" => "onclick=\"ga('send','event','DP','DPAB1','aboutin');\""];
	    ?>
		<?
        foreach($arResult as $arItem):
            if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>
		    <li class="nav__item"><a class="nav__link<?if($arItem["SELECTED"]==true):?> active<?endif;?>" href="<?=$arItem["LINK"]?>" <?=$onClickMenuArray[$arItem["TEXT"]]?>><?=$arItem["TEXT"]?></a>
            </li>
		<?endforeach?>
	</ul>
</nav>
<?endif?>
