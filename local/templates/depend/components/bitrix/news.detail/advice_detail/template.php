
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

<article>
    <div class="detailed-article-content">        
        <img src="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>" alt="">
        <?= $arResult['DETAIL_TEXT']; ?>
    </div>
    <a href="javascript:history.back()" class="bottom-link">Назад к советам</a>
</article>
