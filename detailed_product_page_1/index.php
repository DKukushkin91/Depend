<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<main>
    <section class="content-top-banner">
        <div class="banner-text">
            <h1>Продукция Depend</h1>
<!--            <div class="banner-text__subtitle"><span>Продукция&emsp;>&emsp;</span><span>Прокладки Depend Ultra Mini для женщин</span></div>-->
        </div>
    </section>

    <section class="main-prod-card">
        <h2>Прокладки Depend Ultra Mini для женщин</h2>
        <div class="flex-product-card">
            <div class="product-photo">
                <div class="photo-selector">
                    <div class="selector-button current-photo"><img src="<?=SITE_TEMPLATE_PATH?>/img/Depend_LE_Ultra_Mini_2D.jpg" alt=""></div>
                    <div class="selector-button"><img src="<?=SITE_TEMPLATE_PATH?>/img/Depend_LE_Ultra_Mini_3D.jpg" alt=""></div>
                    <div class="selector-button"><img src="<?=SITE_TEMPLATE_PATH?>/img/Depend_LE_Ultra_Mini_3D.jpg" alt=""></div>
                    <div class="selector-button"><img src="<?=SITE_TEMPLATE_PATH?>/img/Depend_LE_Ultra_Mini_3D.jpg" alt=""></div>
                </div>
                <div class="big-photo">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/Depend_LE_Ultra_Mini_2D.jpg" alt="">
                </div>
                <script>
                    $('.selector-button').click(function () {
                        $('.selector-button').removeClass('current-photo');
                        $(this).addClass('current-photo');
                        var imgSrc = $(this).find('img').attr('src');
                        $('.big-photo').find('img').attr('src', imgSrc);
                    });
                </script>
            </div>
            <div class="product-description">
                <div class="incontinence-rate">
                    <div class="droplets"><span class="drop pink"></span><span class="drop pink"></span><span class="drop"></span><span class="drop"></span><span class="drop"></span><span class="drop"></span><span class="drop"></span></div>
                    <span>При капельном недержании</span>
                </div>
                <div>
                    <h3>О продукте</h3>
                    <p>Новые прокладки Depend&reg; специально созданы для&nbsp;защиты при&nbsp;капельной и&nbsp;легкой степени недержания. Система 4в1 защитит от&nbsp;протеканий, обеспечит максимальную сухость и контроль над запахом, а&nbsp;мягкая поверхность обеспечит комфорт в&nbsp;ношении.</p>
                </div>
                <button class="buy">Купить</button>
            </div>
        </div>
        <div class="product-card-separator"></div>
        <div class="full-characteristics">
            <h3 class="txt-center">Полные характеристики</h3>
            <div class="all-properties txt-center">
                <div class="basic-property">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/leak-control.png" alt="">
                    <span class="name-prop">Полный контроль<br>над протеканием</span>
                </div>
                <div class="basic-property">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/max-dryness.png" alt="">
                    <span class="name-prop">Максимальная<br>сухость*</span>
                </div>
                <div class="basic-property">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/fast-absorption.png" alt="">
                    <span class="name-prop">Быстрое<br>впитывание</span>
                </div>
                <div class="basic-property">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/odor-control.png" alt="">
                    <span class="name-prop">Контроль<br>над запахом</span>
                </div>
            </div>
            <h4>Полный контроль над протеканием</h4>
            <p>Специальная формула с гранулами LEAK-BLOCK (ЛИК-БЛОК) для максимальной защиты от&nbsp;протекания</p>
            <h4>Максимальная сухость*</h4>
            <p>Обеспечивает сухость в 3 раза дольше, чем обычная прокладка</p>
            <span class="prop-footnote">*Исследование проводилось компанией Кимберли-Кларк, США, июнь 2015 при сравнении с женскими прокладками для критических дней нескольких производителей</span>
            <h4>Контроль над запахом</h4>
            <p>Система ABSORB-LOC (АБСОРБ-ЛОК) быстро впитывает влагу и удерживает запах</p>
            <h4>Быстрое впитывание</h4>
            <p>Быстро впитывающий слой для максимальной защиты и комфорта</p>
        </div>
    </section>

    <section class="main-incontinence-block">
        <h2 class="txt-center">О недержании</h2>
        <div class="articles-tabs">
            <div class="rubricator">
                <div class="mob-arrow"></div>
                <div class="rubric current-rubric">Забота о близких</div>
                <div class="rubric">Полезные советы</div>
                <div class="rubric">Все статьи</div>
            </div>
        </div>
        <div class="articles-row current-tab">
            <div class="article-preview">
                <h5>1.Помогите близким больше смеяться</h5>
                <p>Новые прокладки Depend&reg; специально созданы для защиты при капельной и легкой степени недержания.</p>
                <a href="#">Читать полностью</a>
            </div>
            <div class="article-preview">
                <h5>2.Помогите близким больше смеяться</h5>
                <p>Новые прокладки Depend&reg; специально созданы для защиты при капельной и легкой степени недержания.</p>
                <a href="#">Читать полностью</a>
            </div>
            <div class="article-preview">
                <h5>3.Помогите близким больше смеяться</h5>
                <p>Новые прокладки Depend&reg; специально созданы для защиты при капельной и легкой степени недержания.</p>
                <a href="#">Читать полностью</a>
            </div>
        </div>
        <div class="articles-row">
            <div class="article-preview">
                <h5>1.Упражнения, которые помогут пройти долгий путь</h5>
                <p>Новые прокладки Depend&reg; специально созданы для защиты при капельной и легкой степени недержания.</p>
                <a href="#">Читать полностью</a>
            </div>
            <div class="article-preview">
                <h5>2.Упражнения, которые помогут пройти долгий путь</h5>
                <p>Новые прокладки Depend&reg; специально созданы для защиты при капельной и легкой степени недержания.</p>
                <a href="#">Читать полностью</a>
            </div>
            <div class="article-preview">
                <h5>3.Упражнения, которые помогут пройти долгий путь</h5>
                <p>Новые прокладки Depend&reg; специально созданы для защиты при капельной и легкой степени недержания.</p>
                <a href="#">Читать полностью</a>
            </div>
        </div>
        <div class="articles-row">
            <div class="article-preview">
                <h5>1.Не позволяйте неожиданностям испортить поездку</h5>
                <p>Новые прокладки Depend&reg; специально созданы для защиты при капельной и легкой степени недержания.</p>
                <a href="#">Читать полностью</a>
            </div>
            <div class="article-preview">
                <h5>2.Не позволяйте неожиданностям испортить поездку</h5>
                <p>Новые прокладки Depend&reg; специально созданы для защиты при капельной и легкой степени недержания.</p>
                <a href="#">Читать полностью</a>
            </div>
            <div class="article-preview">
                <h5>3.Не позволяйте неожиданностям испортить поездку</h5>
                <p>Новые прокладки Depend&reg; специально созданы для защиты при капельной и легкой степени недержания.</p>
                <a href="#">Читать полностью</a>
            </div>
        </div>
    </section>
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
