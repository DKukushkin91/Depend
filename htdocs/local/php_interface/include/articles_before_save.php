<?php

function BXIBlockAfterSave(&$arFields)
{
	$updateDetail = false;

	$doc = new \DOMDocument();
	$doc->loadHTML('<html><head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"></head><body>' . $arFields['DETAIL_TEXT'] . '</body></html>');

	$contents = new \DOMDocument();
	$contents->loadHTML('<html><head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"></head><body></body></html>');
	$body = $contents->getElementsByTagName('body')->item(0);
	$ol = $contents->createElement('ol');
	$ol->setAttribute('class', 'about-item__list');
	$body->appendChild($ol);

	$body = $doc->getElementsByTagName('body')->item(0);
	$elements = $body->getElementsByTagName('*');
	$index = 0;
	$parent = $ol;
	foreach ($elements as $element) {
		if ($element->tagName == 'h2' || $element->tagName == 'h3') {
			$updateDetail = true;
			$level = $element->tagName == 'h2' ? 2 : 3;
			$class = $element->getAttribute('class');
			if (!preg_match('/\bjs-title-item\b/', $class)) {
				$element->setAttribute('class', 'js-title-item' . $class);
			}
			$element->setAttribute('id', 'article_title_' . $index);
			$li = $contents->createElement('li');
			$li->setAttribute('class', 'about-item__item' . ($level == 3 ? ' about-item__item--ul' : ''));
			$a = $contents->createElement('a');
			$a->setAttribute('class', 'about-item__link' . ($index == 0 ? ' about-item__link--active' : ''));
			$a->setAttribute('href', '#article_title_' . $index);
			$a->textContent = $element->textContent;
			$li->appendChild($a);
			if ($level == 2) {
				$ol->appendChild($li);
				$ul = $contents->createElement('ul');
				$ul->setAttribute('class', 'about-item__ul-list');
				$li->appendChild($ul);
				$parent = $ul;
			} else {
				$parent->appendChild($li);
			}
			$index++;
		}
	}

	if ($updateDetail) {
		$el = new CIBlockElement();
		$el->update($arFields['ID'], ['DETAIL_TEXT' => saveHTML($doc)]);
		CIBlockElement::SetPropertyValuesEx(
			$arFields['ID'],
			CIBlockTools::GetIBlockId('advices'),
			['CONTENTS' => saveHTML($contents)]
		 );
	}
}

function saveHTML($dom) {
	$dom->preserveWhiteSpace = false;
	$dom->formatOutput = true;
	$body = $dom->getElementsByTagName('body')->item(0);
	$html = '';
	foreach ($body->childNodes as $child) {
		$html .= $child->ownerDocument->saveXML($child);
	}
	return $html;
}
