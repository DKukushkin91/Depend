<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>3<?
$APPLICATION->IncludeComponent(
    "depend:catalog.category",
    ".default",
    Array(
        'section_code' => htmlspecialchars(strip_tags(trim($_GET['category']))),
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "MESSAGE_404" => ""
    ),
    false
);
$APPLICATION->AddChainItem('Продукция', '/catalog/all/');
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
