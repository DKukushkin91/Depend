<?php

namespace Sprint\Migration;


class Version20181102171928 extends Version {

protected $description = "Привязка характеристик к товару";

public function up(){
    $helper = new HelperManager();


    $iblockId = $helper->Iblock()->getIblockId('products','catalog');


    $helper->Iblock()->addPropertyIfNotExists($iblockId, array (
  'NAME' => 'Характеристики',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'PROPS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => NULL,
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'TMP_ID' => NULL,
  'LINK_IBLOCK_ID' => '5',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '2',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => NULL,
  'HINT' => '',
));


}

public function down(){
$helper = new HelperManager();

//your code ...

}

}
