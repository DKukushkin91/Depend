<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?><?
$APPLICATION->IncludeComponent(
    "depend:catalog.element",
    "",
    Array(
        'element_code' => htmlspecialchars(strip_tags(trim($_GET['element'])))
    ),
    false
);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
