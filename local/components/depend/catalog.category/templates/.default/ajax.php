<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
session_start();
if($_POST['action'] == 'catalog') {
    $_SESSION['catalog_filter'] = $_POST;

    ob_start();
    $data = $APPLICATION->IncludeComponent(
        "depend:catalog.category",
        "ajax",
        Array(
            'section_code' => $_POST['category'],
        ),
        false
    );
    $answer['html'] = ob_get_clean();
    $answer['ok'] = 1;
    $answer['pages'] = $data['pages_count'];

    header('Content-Type: application/json');
    echo json_encode($answer);
}


if ($_POST['params'] == 'catId') {
    $APPLICATION->IncludeComponent(
        "depend:catalog.category",
        "list",
        Array(
            'section_code' => $_POST['category'],
        ),
        false
    );
}
