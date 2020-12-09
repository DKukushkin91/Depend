<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Мы производим продукты первой необходимости для лучшей жизни людей во всём мире. - Depend.ru");
$APPLICATION->SetTitle("О компании - Depend.ru");
$APPLICATION->AddChainItem('О компании', '/about/');
?>

<?$APPLICATION->AddHeadString('<meta property="og:description" content="Мы производим продукты первой необходимости для лучшей жизни людей во всём мире. - Depend.ru');?>
<?$APPLICATION->AddHeadString('<meta property="og:image" content="/local/templates/depend/img/products-banner.jpg');?>

<div class="about">
    <div class="content-top-banner">
        <div class="banner-text">
            <h1>О компании</h1>
        </div>
    </div>
	<?
	$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
			"START_FROM" => '0',
			"PATH" => "",
			"SITE_ID" => "s1"
		)
	);
	?>
    <article>
        <div class="about-top">
            <div class="about-top-img">
                <img src="<?= SITE_TEMPLATE_PATH?>/img/Kimberly-Clark-big-logo.svg" alt="">
            </div>
            <div class="about-top-contacts">
                <div class="contacts-telephone">
                    <h3>Звоните по бесплатному номеру:</h3>
                    <div class="contacts-telephone__number">8 (800) 200-57-57</div>
                </div>
                <div class="contacts-address">
                    <h3>Юридический адрес:</h3>
                    <a href="https://yandex.ru/maps/-/CBFaRCHQpB" class="contacts-address__text" target="_blank"><span>ООО&nbsp;«Кимберли-Кларк», Россия, Московская&nbsp;обл., г.&nbsp;Ступино, 142800, ул.&nbsp;Ситенка, вл.&nbsp;15</span></a>
                </div>
            </div>
        </div>
        <div class="about-bottom">
            <h2 class="about-bottom__h2">Мы производим продукты первой необходимости для&nbsp;лучшей жизни людей во&nbsp;всём мире.</h2>
            <p class="about-bottom__text">«Кимберли-Кларк» – международная корпорация с&nbsp;великой историей, производящая продукцию для&nbsp;личной, профессиональной и&nbsp;промышленной гигиены.<br>
                На протяжении своей более чем 140-летней истории компания «Кимберли-Кларк» производит инновационные продукты, полностью отвечающие предпочтениям и&nbsp;ожиданиям потребителей. Всё, что производит Компания – от&nbsp;бумажной продукции до&nbsp;средств личной гигиены, от&nbsp;защитной одежды до&nbsp;приспособлений по&nbsp;уходу за&nbsp;домом и&nbsp;спецпомещениями – создаётся ради повышения качества жизни и&nbsp;сохранения здоровья людей.
            </p>
            <div class="about-bottom__title">Бизнес Компании представлен двумя основными направлениями:</div>
            <div class="about-bottom__directions">
                <div class="direction__block">
                    <h3 class="direction__title">Продукция для конечных потребителей. Торговые марки:</h3>
                    <p class="direction__text">Kleenex<sup>®</sup>, Scott<sup>®</sup>, Andrex<sup>®</sup>, Huggies<sup>®</sup>, <span>Pull-Ups<sup>®</sup>,</span> Kotex<sup>®</sup>, Poise<sup>®</sup>, Depend<sup>®</sup> и&nbsp;другие.</p>
                </div>
                <div class="direction__block">
                    <h3 class="direction__title">Товары профессионального использования, производимые бизнес-подразделением Kimberly-Clark Professional.</h3>
                </div>
            </div>
            <div class="about-bottom__title">Компания в цифрах:</div>
            <img class="about-bottom__img" src="<?= SITE_TEMPLATE_PATH?>/img/company-in-digits.svg" alt="">
            <img class="about-bottom__img_mobile" src="<?= SITE_TEMPLATE_PATH?>/img/company-in-digits-mob.svg" alt="">
        </div>
    </article>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>