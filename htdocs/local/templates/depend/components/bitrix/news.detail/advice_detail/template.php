
<div class="content-top-banner">
	<div class="banner-text">
        <h1><?= $arResult['NAME']; ?></h1>
	</div>
</div>
<?php

$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
    "START_FROM" => '0',
    "PATH" => "",
    "SITE_ID" => "s1"
)
); 
?>

<?$APPLICATION->AddHeadString('<meta property="og:description" content="'.ucfirst($arResult['PREVIEW_TEXT']).'"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:image" content="https://www.depend.ru/upload/iblock/8d5/8d51b78ecd8ca654937117ec8037c88f.jpg"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:title" content="'.ucfirst($arResult['NAME']).'"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:type" content="article">');?>

<article>
    <div class="detailed-article-content">        
        <img src="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>" alt="">
        <?= $arResult['DETAIL_TEXT']; ?>
    </div>
    <a href="javascript:history.back()" class="bottom-link">Назад к советам</a>
</article>
