<header>
    <div class="header-top">
        <a href="/">
            <img src="<?=SITE_TEMPLATE_PATH?>/img/depend-logo.png" class="depend-logo-desktop" alt="Depend">
        </a>
        <a href="tel:88002005757" class="top-tel"><span class="icon-tel-desktop"></span>8 (800) 200-57-57</a>
        <a href="/feedback/" class="top-contact-us">Связаться с нами</a>
        <div class="top-separator"></div>
        <a href="/search/" class="top-search"><span class="icon-search-desktop"></span>Поиск</a>
    </div>
    <div class="header-green">
        <a href="/">
            <img src="<?=SITE_TEMPLATE_PATH?>/img/depend-logo.png" class="depend-logo-mobile" alt="Depend">
        </a>
        <nav>
            <a href="tel:88002005757" class="icon-tel-mobile"></a>
            <div class="icon-search-mobile"></div>
            <div class="menu-burger"></div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:menu",
				".default",
				Array(
					"0" => "=",
					"1" => "{",
					"2" => "[",
					"3" => "]",
					"4" => "}",
					"ALLOW_MULTI_SELECT" => "N",
					"DELAY" => "N",
					"MAX_LEVEL" => "2",
					"MENU_CACHE_GET_VARS" => array(""),
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_TYPE" => "N",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"ROOT_MENU_TYPE" => "top",
					"USE_EXT" => "N"
				)
			);?>
            <div class="search-mobile-window">
                <form action="" method="get" name="mobile-search" class="js-mobile-search">
                    <input type="text" class="js-search-q" placeholder="Что вы хотите найти?" required>
                    <input type="submit" value="Найти">
                </form>
                <script>
                    $(document).ready(function () {
                      $('.js-mobile-search').submit(function () {
                        location.href = '/search/?q=' + $('.js-search-q').val() + '&s=';
                        return false;
                      });
                    });
                </script>
            </div>
        </nav>
    </div>
</header>