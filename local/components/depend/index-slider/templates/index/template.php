<div class="main-slider">
<? foreach($arResult['items'] as $index => $item): ?>
    <div>
        <style>
            @media only screen and (max-width: 1921px) {
                .main-slider-video__preview-<?= $index ?> {
                    background-image: url(<?= $item['PROPERTY_IMAGE_1920'] ?>) !important;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    height: 490px;
                    overflow: hidden;
                }
            }
            @media only screen and (max-width: 1281px) {
                .main-slider-video__preview-<?= $index ?> {
                    background-image: url(<?= $item['PROPERTY_IMAGE_1280'] ?>) !important;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    height: 465px;
                    overflow: hidden;
                }
            }
            @media only screen and (max-width: 992px) {
                .main-slider-video__preview-<?= $index ?> {
                    background-image: url(<?= $item['PROPERTY_IMAGE_991'] ?>) !important;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    height: 365px;
                    overflow: hidden;
                }
            }
            @media only screen and (max-width: 576px) {
                .main-slider-video__preview-<?= $index ?> {
                    background-image: url(<?= $item['PROPERTY_IMAGE_575'] ?>) !important;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    height: 300px;
                    overflow: hidden;
                }
            }
        </style>
        <a class="main-slider-item <?= !empty($item['PROPERTY_VIDEO_MP']) ? 'js-popup-show' : '' ?>" <? if (!empty($item['PROPERTY_VIDEO_MP'])): ?> href="#main-video" <? endif; ?> <? if (!empty($item['PROPERTY_LINK_VALUE'])): ?> target="_blank" href="<?= $item['PROPERTY_LINK_VALUE']; ?>" <?endif;?>>        
            <div class="main-slider-video__preview-<?=$index;?>">
            </div>
            <? if (!empty($item['PROPERTY_VIDEO_MP'])): ?>
            <div class="main-slider-video__icon"></div>
            <? endif; ?>
            <? if (!empty($item['PROPERTY_VIDEO_MP'])): ?>
            <div class="main-slider-video zoom-anim-dialog mfp-hide" id="main-video">
                <video class="main-slider-video__item" controls>
                    <source src="<?= $item['PROPERTY_VIDEO_MP']; ?>" type="video/mp4">
                </video>
            </div>
            <? endif; ?>
        </a>
    </div>
    <? endforeach; ?>
</div>
