<?php
?>
<article>
    <section class="detailed-article-content">
        <h2><?= $arResult['NAME']; ?></h2>
        <img src="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>" alt="">
        <?= $arResult['DETAIL_TEXT']; ?>
    </section>
    <a href="javascript:history.back()" class="bottom-link">Назад к советам</a>
</article>
