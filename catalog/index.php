<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Все о продукции Depend, предметы гигиены для мужчин и женщин при недержании мочи Депенд | Depend.ru");
$APPLICATION->SetPageProperty("title", "Продукция Depend, предметы гигиены для мужчин и женщин при недержании мочи Депенд | Depend.ru");
?>
<?$APPLICATION->AddHeadString('<meta property="og:description" content="Все о продукции Depend, предметы гигиены для мужчин и женщин при недержании мочи Депенд | Depend.ru"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:image" content="https://www.depend.ru/local/templates/depend/img/depend-logo.png"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:title" content="Продукция Depend, предметы гигиены для мужчин и женщин при недержании мочи Депенд | Depend.ru">');?>
<?$APPLICATION->AddHeadString('<meta property="og:type" content="website">');?>
<?$APPLICATION->IncludeComponent(
    "depend:catalog.category",
    ".default",
    Array(
        'section_code' => false,
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "MESSAGE_404" => ""
    ),
    false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
