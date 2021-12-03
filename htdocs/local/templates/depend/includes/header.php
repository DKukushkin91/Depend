<header class="header">
	<div class="container">
		<!--noindex-->
		<div class="header__wrap" itemscope itemtype="https://schema.org/Organization">
			<meta itemprop="name" content="ООО «Кимберли-Кларк»" />
			<div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
				<meta itemprop="addressLocality" content="Россия, Московская обл., г. Ступино" />
				<meta itemprop="postalCode" content="142800" />
				<meta itemprop="streetAddress" content="ул. Ситенка, вл. 15" />
			</div>
			<button class="header__burger-btn js-burger-btn"></button>
			<div class="header__logo-wrap">
				<a itemprop="url" href="/" rel="nofollow" class="header__link">
					<img itemprop="logo" src="/f/img/depend-logo.png" alt="depend" width="93" height="50">
				</a>
			</div>
			<div class="header__menu js-burger-menu">
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
				<a class="header__tel-link" href="tel:+78002005757" itemprop="telephone">8&nbsp;(800)&nbsp;200&nbsp;-&nbsp;57&nbsp;-&nbsp;57</a>
			</div>
			<a href="/search/" class="header__search-btn">
				<svg class="header__search-icon" width="17" height="17">
					<use href="/f/img/sprite.svg#search"></use>
				</svg>
			</a>
		</div>
		<!--/noindex-->
	</div>
</header>
