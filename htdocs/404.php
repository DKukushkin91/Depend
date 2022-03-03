<?
CHTTP::SetStatus('404 Not Found');
@define('ERROR_404', 'Y');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница не найдена");
$res = CIBlockSection::GetList([], [
    'IBLOCK_ID' => 4,
    'ACTIVE' => 'Y'
], false, [], false);
while ($ob = $res->GetNext()) {
    $sections[] = $ob;
}
?>
<section class="main-not-found">
    <section class="not-found-inner">
        <div class="not-found__img"></div>
        <h1>Данная страница не существует!</h1>
        <a href="/" class="not-found__link">Перейти на главную страницу</a>
        
    </section>
</section>





<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
