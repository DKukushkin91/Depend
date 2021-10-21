<?

class Helpers{

    /**
     * getAllSeoText
     *  - получить все СЕО данные всех  страниц, из админки
     * 
     * @return array
     */
    private function getAllSeoText(){
        
        $result = array();

        $iblockId = CIBlockTools::GetIBlockId( 'seo_crave' );
        $cacheTime = 604800;
        $cacheID = 'getAllSeoText_'.$iblockId;
        $cachePath = "/getAllSeoText/";
        $obCache = new CPHPCache();
        
        if ($obCache->InitCache( $cacheTime, $cacheID, $cachePath)) {
            $result = $obCache->GetVars();
        } elseif ($obCache->StartDataCache()) {
        
            CModule::IncludeModule('iblock');
            
            $res = CIBlockElement::GetList(
                array(),
                array(
                    'IBLOCK_ID' => $iblockId,
                    'ACTION' => 'Y'
                ),
                false,
                false,
                array( 'ID', 'CODE', 'PROPERTY_TITLE', 'PROPERTY_DESCRIPTION', 'PROPERTY_KEYWORDS' )
            );
            while($arRes = $res->Fetch()){
                $result[ $arRes['CODE'] ] = array(
                    'title' => $arRes['PROPERTY_TITLE_VALUE'],
                    'description' => $arRes['PROPERTY_DESCRIPTION_VALUE'],
                    'keywords' => $arRes['PROPERTY_KEYWORDS_VALUE']
                );
            }
            $obCache->EndDataCache($result);
        }
        return $result;
    }
    
    /**
     * getSeoTextsPageByUrlPage
     *  - получить СЕО данные для текущей страницы
     * 
     * @param string $urlPage - url текущей страницы
     * @return array
     */
    public static function getSeoTextsPageByUrlPage($urlPage){        
        $result = array();
        // получить данные СЕО по всем страницам
        $allSeoData = self::getAllSeoText();
        if(!empty($allSeoData[$urlPage])){
            $result = $allSeoData[$urlPage];
        }
        return $result;
    }

    
}