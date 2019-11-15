<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?><?
$APPLICATION->IncludeComponent(
    "depend:catalog.category",
    "",
    Array(
        'section_code' => htmlspecialchars(strip_tags(trim($_GET['category'])))
    ),
    false
);
$APPLICATION->AddChainItem('Продукция', '/catalog/all/');
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
