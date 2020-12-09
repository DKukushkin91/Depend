<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Вся продукция - Depend.ru");
$APPLICATION->SetTitle("Вся продукция - Depend.ru");
?>
<?$APPLICATION->AddHeadString('<meta property="og:description" content="Вся продукция - Depend.ru"/>');?>
<?$APPLICATION->AddHeadString('<meta property="og:image" content="https://www.depend.ru/upload/iblock/8d5/8d51b78ecd8ca654937117ec8037c88f.jpg"/>');?>
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
