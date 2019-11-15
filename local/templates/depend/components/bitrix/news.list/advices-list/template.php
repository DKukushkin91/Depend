<?php

?>
<section class="advices-tile <?= ($arParams['FIRST_ELEMENT'] == '1') ? 'active' : '' ?>">
    <? foreach ($arResult['ITEMS'] as $index => $item):
		$res = CIBlockSection::GetByID($item['IBLOCK_SECTION_ID']);
		if($ar_res = $res->GetNext())
			$arSectionCode = $ar_res['CODE'];
        ?>
        <section class="advices-tile__item">
            <div class="advices-tile-text">
                <h3><?= $item['NAME']; ?></h3>
                <div class="advices-tile__descr"><?= $item['PREVIEW_TEXT']; ?></div>
                <a href="/advices/<?=$arSectionCode .'/'. $item['ID']; ?>" class="advices-tile__link">Читать полностью</a>
            </div>
        </section>
    <? endforeach; ?>
</section>
