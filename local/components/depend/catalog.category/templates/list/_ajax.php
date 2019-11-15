<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if($_POST['action'] == 'catalog') {
    $APPLICATION->IncludeComponent(
        "tradeup:catalog.category",
        "ajax",
        Array(
            'section_code' => htmlspecialchars(strip_tags(trim($_POST['category'])))
        ),
        false
    );
}
