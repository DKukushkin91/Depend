<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Задавайте интересующие вас вопросы, наша команда ответит в кратчайшие сроки, после получения запроса - Depend.ru");
$APPLICATION->SetTitle("Обратная связь | Depend.ru");
?>
<?$APPLICATION->AddHeadString('<meta property="og:description" content="Задавайте интересующие вас вопросы, наша команда ответит в кратчайшие сроки, после получения запроса - Depend.ru"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:image" content="https://www.depend.ru/local/templates/depend/img/depend-logo.png"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:title" content="Обратная связь | Depend.ru">');?>

<section class="feedback">
    <section class="content-top-banner">
        <div class="banner-text">
            <h1>Связаться с нами</h1>
<!--            <div class="banner-text__subtitle">Главная > Связаться с нами</div>-->
        </div>
    </section>
    <article>
        <form action="" method="post" class="message-form js-feedback-form">
            <section class="message-theme">
                <label for="theme"><span>*</span>Тема сообщения</label>
                <input class="js-input-theme" name="theme" type="text" placeholder="Тема обращения" required>
            </section>
            <section class="message-name">
                <label for="name"><span>*</span>Ваше имя</label>
                <input class="js-input-name" name="name" type="text" placeholder="Представьтесь, пожалуйста" required>
            </section>
            <section class="message-email">
                <label for="email"><span>*</span>E-mail</label>
                <input class="js-input-email" name="email" type="email" placeholder="Напишите свой email для связи" required>
            </section>
            <section class="message-phone">
                <label for="tel"><span>*</span>Телефон</label>
                <input class="js-input-phone js-mask" name="phone" type="text" placeholder="Напишите телефон для связи" required>
            </section>
            <section class="message-comment">
                <label for="comment">Комментарий</label>
                <textarea class="js-input-comment" name="text" type="text" placeholder="Напишите нам сопроводительный текст, если хотите:)"></textarea>
            </section>
            <section class="message-checkboxes">
                <div class="message-checkboxes-item">
                    <input class="checkboxes-confid" type="checkbox" id="confid" required>
                    <label for="confid">Я прочитал <a href="">условия конфиденциальности</a></label>
                </div>
                <div class="message-checkboxes-item">
                    <input class="checkboxes-personal" type="checkbox" id="personal" required>
                    <label for="personal">Я согласен на обработку персональных данных</label>
                </div>
            </section>
            <button class="submit-form-btn js-btn-send opacity" type="submit" href="#popup-message-sent">Отправить</button>
        </form>
    </article>
    <div class="popup-message-sent zoom-anim-dialog mfp-hide" id="popup-message-sent">
        <div class="popup__title">Ваше сообщение отправлено</div>
        <div class="popup__subtitle">В ближайшее время мы с вами свяжемся</div>
        <div class="popup__btn" onclick="location.reload()">Закрыть</div>
    </div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>