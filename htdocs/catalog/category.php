<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?><?
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
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
