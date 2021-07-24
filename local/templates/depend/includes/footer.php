<footer>
    <div class="footer-wrapper">
        <div class="footer-col-links">
            <span>Полезное</span>
            <a href="/about/">О&nbsp;компании</a>
        </div>
        <div class="footer-col-links">
            <span>Для&nbsp;женщин</span>
            <a href="/catalog/prokladki-dlya-zhenshchin/">Прокладки для&nbsp;женщин</a>
            <a href="/catalog/vpityvayushchee-bele-dlya-zhenshchin/">Впитывающее белье для&nbsp;женщин</a>
            <a href="/catalog/poslerodovye-prokladki/">Послеродовые прокладки</a>
        </div>
        <div class="footer-col-links">
            <span>Для&nbsp;мужчин</span>
            <a href="/catalog/vpityvayushchee-bele-dlya-muzhchin/">Впитывающее белье для&nbsp;мужчин</a>
        </div>
        <div class="footer-col-links">
            <span>О&nbsp;недержании</span>
            <a href="/advices/zabota-o-blizkom/">Забота о&nbsp;близких</a>
            <a href="/advices/poleznye-sovety/">Полезные советы</a>
            <a href="/advices/">Все статьи</a>
        </div>
		<!--noindex-->
        <div class="footer-kc-logo"><img src="<?=SITE_TEMPLATE_PATH?>/img/kimberly-clark-logo.png" class="kimberly-clark-logo" alt=""></div>    	
        <div class="footer-col-copyrights">&reg; KCWW. Все права защищены.<br>&reg; Зарегистрированный товарный знак Кимберли-Кларк Уэрлдуайд, Инк или его аффилированных лиц. Все наименования, логотипы и&nbsp;торговые марки являются собственностью Kimberly-Clark Worldwide.Inc
		</br></br>
		Как и многие компании, мы используем сервис веб-аналитики Яндекс.Метрика.
		</br></br>
		Сервис Яндекс.Метрика использует технологию «Сookie» с целью анализа пользовательской активности на вэб-сайте. Собранная при помощи «Cookie» информация не может идентифицировать посетителя нашего веб-сайта, но может помочь нам улучшить его работу. 
		</br></br>
		Пользователь нашего вэб-сайта может отказаться от использования «Cookie», выбрав соответствующие настройки в браузере. Также пользователь нашего вэб-сайта может использовать инструмент — <a href="https://yandex.ru/support/metrika/general/opt-out.html" target="_blank">https://yandex.ru/support/metrika/general/opt-out.html</a>. Однако это может повлиять на работу некоторых функций вэб-сайта. 
		</br></br>
		На нашем вэб-сайте также используется Google Аналитика (система аналитики Google Inc.) Эта система также использует «Cookie». Вы можете запретить Google отслеживать «Cookie», которые генерируются при посещении нашего вэб-сайта, включая ваш IP-адрес, путем скачивания и установки специального плагина для браузера. Более подробную информацию об использовании GoogleAnalytics Вы можете найти по ссылке <a href="https://marketingplatform.google.com/about/analytics/terms/ru/" target="_blank">https://marketingplatform.google.com/about/analytics/terms/ru/</a>. Мы также используем Google Analytics для анализа данных, полученных от AdWords, и файлов «cookie» из DoubleClick для статистических целей.  Если Вы хотите отключить эту опцию, воспользуйтесь Менеджером рекламных предпочтений Google <a href="https://support.google.com/ads/answer/2662856?co=GENIE.Platform%3DAndroid&hl=ru" target="_blank">https://support.google.com/ads/answer/2662856?co=GENIE.Platform%3DAndroid&hl=ru</a>.
		</div>
        <div class="footer-col-copyrights">Посещение нашего сайта и использование представленной на&nbsp;нем информации регулируются <a href="/local/templates/documents/usloviya-ispolzovaniya.docx">Условиями использования</a>. Пожалуйста, ознакомьтесь также с нашей <a href="/local/templates/documents/politika-po-personalnim-dannim.pdf" target="_blank">Политикой по персональным данным.</a> </br></br>
		Как и многие компании, мы используем технологию «Cookie» на нашем вэб-сайте. «Cookie» сохраняется на вашем компьютере вашим браузером. Когда вы заходите на наш вэб-сайт, «Cookie» сообщает нам о том, являетесь ли вы новым посетителем нашего вэб-сайта или вы посещали его ранее. «Cookie» не получает никакой личной информации о вас, не обеспечивает нас каким-либо способом связи с вами и не извлекает никакой информации с вашего компьютера. Использование «Cookie» помогает нам определить, к каким разделам нашего сайта посетители проявляют наибольший интерес. Это позволяет нам размещать на нашем вэб-сайте больше интересной для посетителей информации.</div>
		<!--/noindex-->
    </div>
	<?/* if ($APPLICATION->GetCurDir() == '/catalog/prokladki-dlya-zhenshchin/' || $APPLICATION->GetCurDir() == '/catalog/vpityvayushchee-bele-dlya-zhenshchin/' || $APPLICATION->GetCurDir() == '/catalog/vpityvayushchee-bele-dlya-muzhchin/'): */?>
    <div id="where-can-buy" class="buy-popup zoom-anim-dialog mfp-hide">
        <h2>Где&nbsp;купить?</h2>
        <p>Ищите нашу продукцию на&nbsp;полках аптек и&nbsp;супермаркетов,<br>а&nbsp;также в&nbsp;онлайн-магазинах:</p>
		<?	$APPLICATION->IncludeComponent("bitrix:news.list","buy-list-element",Array(
					"DISPLAY_DATE" => "Y",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "Y",
					"AJAX_MODE" => "Y",
					"IBLOCK_TYPE" => "buy",
					"IBLOCK_ID" => "6",
					"NEWS_COUNT" => "200",
					"SORT_BY1" => "ID",
					"SORT_ORDER1" => "ASC",
					"SORT_BY2" => "ACTIVE_FROM",
					"SORT_ORDER2" => "DESC",
					"FILTER_NAME" => "",
					"FIELD_CODE" => array(
						0 => "ID",
						1 => "DETAIL_PICTURE",
						2 => "",
						3 => "",
						4 => "",
					),
					"PROPERTY_CODE" => Array("LIKES", 'VIEWS', 'COMMENTS', 'TAGS', 'DATE_START', 'DATE_FINISH'),
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"SET_TITLE" => "N",
					"SET_BROWSER_TITLE" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_LAST_MODIFIED" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
					"PARENT_SECTION" => '',
					"PARENT_SECTION_CODE" => "",
					"INCLUDE_SUBSECTIONS" => "Y",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "3600",
					"CACHE_FILTER" => "Y",
					"CACHE_GROUPS" => "Y",
					"DISPLAY_TOP_PAGER" => "Y",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"PAGER_TITLE" => "Партнеры",
					"PAGER_SHOW_ALWAYS" => "Y",
					"PAGER_TEMPLATE" => "",
					"PAGER_DESC_NUMBERING" => "Y",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "Y",
					"PAGER_BASE_LINK_ENABLE" => "Y",
					"SET_STATUS_404" => "N",
					"SHOW_404" => "N",
					"MESSAGE_404" => "",
					"PAGER_BASE_LINK" => "",
					"PAGER_PARAMS_NAME" => "arrPager",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
				)
			);
		?>
    </div>
	<?/* else:?>
	<?endif; */?>
</footer>