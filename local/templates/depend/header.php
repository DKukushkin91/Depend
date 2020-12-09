<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?
$rsSites = CSite::GetByID(SITE_ID);
$arSite = $rsSites->Fetch();
?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134188906-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-134188906-1');
    </script>
    <meta name="yandex-verification" content="46a6b60cc0f981dd" />
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="canonical" href="<?echo "https://".$_SERVER['SERVER_NAME'].$APPLICATION->GetCurPage(true);?>"/>
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
    <!-- Rating Mail.ru counter -->
    <script>
        var _tmr = window._tmr || (window._tmr = []);
        _tmr.push({id: "3147409", type: "pageView", start: (new Date()).getTime(), pid: "USER_ID"});
        (function (d, w, id) {
            if (d.getElementById(id)) return;
                var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
                ts.src = "https://top-fwz1.mail.ru/js/code.js";
                var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
            if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
        })(document, window, "topmailru-code");
    </script>
    <!-- //Rating Mail.ru counter -->
	<script src="<?=CUtil::GetAdditionalFileURL(SITE_TEMPLATE_PATH.'/js/jquery.min.js');?>"></script>
    <title><?$APPLICATION->ShowTitle()?></title>
  

	<?
    CJSCore::Init(array('ajax'));
    ?>
<div itemscope= "https://schema.org/">
    <meta property="og:site_name" content="<?=$arSite['SITE_NAME']?>"/>  
    <meta property="og:url" content="<?echo "https://".$_SERVER['SERVER_NAME'].$APPLICATION->GetCurPage(true);?>"/>  
    <meta property="og:type" content="<?if ($APPLICATION->GetCurPage(false) == '/advices/'):?>article<?else:?>website<?endif;?>" />
    <meta property="og:title" content="<?$APPLICATION->ShowTitle()?>" />   
    <?
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

</div>
    <link rel="shortcut icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/img/android-chrome-512x512.png">
</head>
<body>
<!-- Yandex.Metrika counter --> <script> (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(38929830, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/38929830" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!-- Google Tag Manager (noscript) -->
<noscript>
	<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5WKR59N" height="0" width="0" style="display: none; visibility: hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Rating Mail.ru counter -->
<noscript>
    <div>
        <img src="https://top-fwz1.mail.ru/counter?id=3147409;js=na" style="border:0;position:absolute;left:-9999px;" alt="Top.Mail.Ru" />
    </div>
</noscript>
<!-- //Rating Mail.ru counter -->
<div class="bx-panel">
	<?$APPLICATION->ShowPanel()?>
</div>
<div class="page-inner">
	<? $APPLICATION->IncludeFile('includes/header.php', [], []) ?>
    <main>


