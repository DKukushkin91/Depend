<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <ul class="menu">
	    <?php
	    $onClickMenuArray = ["Главная" => "onclick=\"ga('send','event','DP','DPH1','home');\"",
		                    "Продукция" => "onclick=\"ga('send','event','DP','DPP1','product');\"",
		                    "Где купить" => "onclick=\"ga('send','event','DP','DPG1','wherebuy');\"",
		                    "О недержании" => "onclick=\"ga('send','event','DP','DPAB1','aboutin');\""];
	    ?>
        <?
        foreach($arResult as $arItem):
            if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>
            <li class="menu-item"><a class="<?if($arItem["SELECTED"] == true):?> active <?else:?> <? endif;?>" href="<?=$arItem["LINK"]?>" <?=$onClickMenuArray[$arItem["TEXT"]]?>><?=$arItem["TEXT"]?></a></li>
        <?endforeach?>
        <li class="menu-item burger-search-form">
            <div class="burger-line"></div>
            <form action="#" name="burger-search">
                <input type="search" placeholder="Что вы хотите найти?" required>
                <input type="submit" value="Найти">
            </form>
        </li>
    </ul>
<?endif?>
