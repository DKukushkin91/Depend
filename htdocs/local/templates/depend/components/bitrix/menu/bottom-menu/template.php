<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <div class="nav">
        <div class="nav-links">

            <?
            foreach($arResult as $arItem):
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                ?>
                <a class="nav-links__link <?if($arItem["SELECTED"] == true):?> active <?else:?> <? endif;?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
            <?endforeach?>
        </div>
    </div>

<?endif?>
