<section class="index_slider" id="js-index-slider">
    <? foreach($arResult['items'] as $item): ?>
        <div class="slider-inner slider-inner-one" style="background-image: url(<?= $item['PREVIEW_PICTURE'] ?>);">
          <div class="slider-inner-text">
            <div class="slider-inner-text__title"><?= $item['NAME'] ?></div>
            <div class="slider-inner-text__subtitle"><?= $item['PREVIEW_TEXT'] ?></div>
          </div>
            <a href="<?= $item['PROPERTY_LINK_VALUE'] ?>" <?if ($item['PROPERTY_BLANK_VALUE'] == 'Y'): ?>target="_blank"<?endif;?> class="slider-inner__button"><?= $item['PROPERTY_LINK_TEXT_VALUE'] ?></a>
        </div>
    <? endforeach; ?>
</section>
