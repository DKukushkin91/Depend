<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?><?
$APPLICATION->IncludeComponent(
    "depend:catalog.element",
    "",
    Array(
        
			"ELEMENT_CODE" => $_REQUEST["element"],
    ),
    false
);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
