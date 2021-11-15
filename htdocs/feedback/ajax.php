<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$theme = htmlspecialchars($_POST['theme']);
$name = htmlspecialchars($_POST['name']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars($_POST['phone']);
$text = htmlspecialchars($_POST['comment']);

if (!empty($theme) && !empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($phone)) {
	$arFields = array(
		"ACTIVE" => "Y",
		"IBLOCK_ID" => 7,
		"NAME" => $theme,
		"CODE" => translate($theme),
		"PROPERTY_VALUES" => array(
			"NAME" => $name,
			"PHONE" => $phone,
			"EMAIL" => $email,
			"TEXT" => $text
		)
	);
	$element = new CIBlockElement();
	$newElement = $element->Add($arFields, false, false, true);

	$answer['ok'] = 1;

	header('Content-Type: application/json');
	echo json_encode($answer);
}