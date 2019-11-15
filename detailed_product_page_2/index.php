<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<main>
    <section class="content-top-banner">
        <div class="banner-text">
            <h1>Продукция Depend</h1>
<!--            <div class="banner-text__subtitle"><span>Продукция&emsp;>&emsp;</span><span>Впитывающее нижнее белье Depend® для Женщин L\XL</span></div>-->
        </div>
    </section>
    <section class="main-prod-card">
        <h2>Впитывающее нижнее белье Depend® для Женщин L\XL</h2>
        <div class="flex-product-card">
            <div class="product-photo">
                <div class="photo-selector">
                    <div class="selector-button current-photo"><img src="<?=SITE_TEMPLATE_PATH?>/img/underpants-for-women-2D.jpg" alt=""></div>
                    <div class="selector-button"><img src="<?=SITE_TEMPLATE_PATH?>/img/underpants-for-women-3D.jpg" alt=""></div>
                    <div class="selector-button"><img src="<?=SITE_TEMPLATE_PATH?>/img/underpants-for-women-3D.jpg" alt=""></div>
                    <div class="selector-button"><img src="<?=SITE_TEMPLATE_PATH?>/img/underpants-for-women-3D.jpg" alt=""></div>
                </div>
                <div class="big-photo">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/underpants-for-women-2D.jpg" alt="">
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
                <div>
                    <div class="incontinence-rate">
                        <div class="droplets"><span class="drop pink"></span><span class="drop pink"></span><span class="drop pink"></span><span class="drop pink"></span><span class="drop pink"></span><span class="drop pink"></span><span class="drop pink"></span></div>
                        <span>Максимальная впитываемость</span>
                    </div>
                    <div class="size-block">
                        <div class="size-info">
                            <span>Размер:</span><div class="size-value">L/XL — 50/56</div>
                        </div>
                        <div class="size-info">
                            <span>Объем бедер:</span><div class="size-value">108-120 см</div>
                        </div>
                    </div>
                </div>
                <div>
                    <h3>О продукте</h3>
                    <p>Наше впитывающее белье Depend® создано специально для женщин с учетом <i>анатомических особенностей</i> тела. Оно способно не только защитить Вас в течение всего дня, но и подарить комфорт в ношении как у нижнего белья.</p>
                </div>
                <button class="buy">Купить</button>
            </div>
        </div>
        <div class="product-card-separator"></div>
        <div class="full-characteristics">
            <h3 class="txt-center">Полные характеристики</h3>
            <div class="all-properties txt-center">
                <div class="basic-property pants-property">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/stretch.png" alt="">
                    <span class="name-prop">Мягкое и удобное<br>стретч-облегание</span>
                </div>
                <div class="basic-property pants-property">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/low-waist.png" alt="">
                    <span class="name-prop">С низкой талией,<br>незаметно под одеждой</span>
                </div>
                <div class="basic-property pants-property">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/5-times-more.png" alt="">
                    <span class="name-prop">В 5 раз больше<br>защита*</span>
                </div>
            </div>
            <p>Depend® «Система защиты»: быстро впитывающие каналы и устраняющие запах фильтры разработаны специально, чтобы вы чувствовали себя надежно и уверенно как днем, так и ночью.</p>
            <ul>
                <li>Мягкие, удобные и отлично сидят</li>
                <li>Быстровпитывающие каналы</li>
                <li>Специальные фильтры, устраняющие запах</li>
                <li>Защита на всю ночь</li>
            </ul>
            <div class="size-block">
                <div class="size-info">
                    <span>Размер:</span><div class="size-value">L/XL — 50/56</div>
                </div>
                <div class="size-info">
                    <span>Объем бедер:</span><div class="size-value">108-120 см</div>
                </div>
                <div class="size-info">
                    <span>Впитываемость:</span><div class="droplets"><span class="drop pink"></span><span class="drop pink"></span><span class="drop pink"></span><span class="drop pink"></span><span class="drop pink"></span><span class="drop pink"></span><span class="drop pink"></span></div>
                </div>
            </div>
            <span class="prop-footnote pants-footnote">*Сравнение проводилось с женскими прокладками для критических дней. Исследование проводилось компанией Кимберли-Кларк, США, июнь 2015.</span>
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
