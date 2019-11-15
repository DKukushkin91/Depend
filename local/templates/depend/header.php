<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134188906-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-134188906-1');
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Google Tag Manager -->
	<script>
		(function(w,d,s,l,i){
		    w[l]=w[l]||[];
		    w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
		    var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
		    j.async=true;
		    j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
		    f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5WKR59N');
	</script>
	<!-- End Google Tag Manager -->
	<script type="text/javascript" src="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH.'/js/jquery.min.js');?>"></script>
    <title><?$APPLICATION->ShowTitle()?></title>
	<?
	CJSCore::Init(array('ajax'));
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/main.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/styles.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/products.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/search.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/advices.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/feedback.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/normalize.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/jquery.fancybox.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/detailed-article.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/shops.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/about.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/magnific-popup.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/incontinence-block.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/product-card.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/slick.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/slick-theme.css');
	$APPLICATION->ShowHead();
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/main.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/menu.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.fancybox.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/incontinence-slider.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.mask.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/slick.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.magnific-popup.min.js');
	?>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
	<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5WKR59N" height="0" width="0" style="display: none; visibility: hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="bx-panel">
	<?$APPLICATION->ShowPanel()?>
</div>
<div class="page-inner">
	<? $APPLICATION->IncludeFile('includes/header.php', [], []) ?>
    <main>


