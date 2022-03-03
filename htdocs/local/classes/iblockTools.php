<?php

/**
 * IBlock tools service
 */
class CIBlockTools
{
	private static $tools = null;
	private static $cacheKey = 'CIBlockTools';

	private $arIBlockIds;
	private $arPropertyIds;
	private $arPropertyValueIds;

	/**
	 * Init service
	 * @return CIBlockTools
	 */
	private static function Init()
	{
		if (!self::$tools) {
			self::$tools = new CIBlockTools();
		}
		return self::$tools;
	}

	public static function Clear()
	{
		self::Update();
		if (self::$tools) {
			self::$tools = null;
		}
		return true;
	}

	/**
	 * Get IBlock ID
	 * @param string $iblockCode IBlock CODE
	 * @return integer|null
	 */
	public static function GetIBlockId($iblockCode)
	{
		return self::Init()->GetIBlockIdPr($iblockCode);
	}

	/**
	 * Get IBlock property ID
	 * @param string $iblockCode IBlock CODE
	 * @param string $propCode Property CODE
	 * @return integer|null
	 */
	public static function GetPropertyId($iblockCode, $propCode)
	{
		return self::Init()->GetPropertyIdPr($iblockCode, $propCode);
	}

	/**
	 * Get IBlock property enum value ID
	 * @param string $iblockCode IBlock CODE
	 * @param string $propCode Property CODE
	 * @param string $xmlId Property value XML_ID
	 * @return integer|null
	 */
	public static function GetPropertyEnumValueId($iblockCode, $propCode, $xmlId)
	{
		return self::Init()->GetPropertyEnumValueIdPr($iblockCode, $propCode, $xmlId);
	}

	/**
	 * Clear service cache
	 * @return boolean
	 */
	public static function Update()
	{
		$cache = new CPHPCache();
		$cache_path = '/' . self::$cacheKey . '/';
		$cache->CleanDir($cache_path);
		return true;
	}

	private function __construct()
	{
		$cache = new CPHPCache();
		$cache_time = 2592000; // month
		$cache_id = $_SERVER['HTTP_HOST'] . '|' . self::$cacheKey;
		$cache_path = '/' . self::$cacheKey . '/';

		if ($cache->InitCache($cache_time, $cache_id, $cache_path)) {
			$vars = $cache->GetVars();
			$this->arIBlockIds = $vars['arIBlockIds'];
			$this->arPropertyIds = $vars['arPropertyIds'];
			$this->arPropertyValueIds = $vars['arPropertyValueIds'];
		} else {
			if ($cache->StartDataCache()) {
				$this->SetIBlocks();
				$this->SetProperties();

				$cache->EndDataCache([
					'arIBlockIds' => $this->arIBlockIds,
					'arPropertyIds'  => $this->arPropertyIds,
					'arPropertyValueIds' => $this->arPropertyValueIds,
				]);
			}
		}
	}

	private function SetIBlocks()
	{
		$this->arIBlockIds = [];

		if (!CModule::IncludeModule('iblock')) {
			return;
		}

		$db = CIBlock::GetList(
			['ID' => 'ASC' ],
			[
				// ACTIVE => 'Y',
				'CHECK_PERMISSIONS' => 'N'
			]
		);
		while($arr = $db->Fetch()) {
			if ($arr['CODE']) {
				$this->arIBlockIds[$arr['CODE']] = intval($arr['ID']);
			}
		}
	}

	private function SetProperties()
	{
		$this->arPropertyIds = [];
		$this->arPropertyValueIds = [];

		if (!CModule::IncludeModule('iblock')) {
			return;
		}

		$db = CIBlockProperty::GetList(
			[],
			[
				// ACTIVE => 'Y',
				'CHECK_PERMISSIONS' => 'N'
			]
		);
		while($arr = $db->Fetch()) {
			if (is_null($this->arPropertyIds[$arr['IBLOCK_ID']])) {
				$this->arPropertyIds[$arr['IBLOCK_ID']] = [];
			}

			if ($arr['CODE']) {
				$this->arPropertyIds[$arr['IBLOCK_ID']][$arr['CODE']] = intval($arr['ID']);

				if ($arr['PROPERTY_TYPE'] == 'L') {
					if (is_null($this->arPropertyValueIds[$arr['ID']])) {
						$this->arPropertyValueIds[$arr['ID']] = [];
					}
				}
			}
		}
		$resProp = CIBlockPropertyEnum::GetList(
			[],
			[
				'=PROPERTY_ID' => array_keys($this->arPropertyValueIds),
				'!=XML_ID' => false
			]
		);
		while($arrProp=$resProp->fetch()) {
			$this->arPropertyValueIds[$arrProp['PROPERTY_ID']][$arrProp['XML_ID']] = intval($arrProp['ID']);
		}
	}

	private function GetIBlockIdPr($iblockCode)
	{
		if (isset($this->arIBlockIds[$iblockCode])) {
			return $this->arIBlockIds[$iblockCode];
		}

		return null;
	}

	private function GetPropertyIdPr($iblockCode, $propCode)
	{
		$iblockId = $this->GetIBlockId($iblockCode);
		if (!$iblockId) {
			return null;
		}

		if (isset($this->arPropertyIds[$iblockId]) && isset($this->arPropertyIds[$iblockId][$propCode])) {
			return $this->arPropertyIds[$iblockId][$propCode];
		}

		return null;
	}

	private function GetPropertyEnumValueIdPr($iblockCode, $propCode, $xmlId)
	{
		$propId = $this->GetPropertyId($iblockCode, $propCode);
		if (!$propId) {
			return null;
		}

		if (isset($this->arPropertyValueIds[$propId]) && isset($this->arPropertyValueIds[$propId][$xmlId])) {
			return $this->arPropertyValueIds[$propId][$xmlId];
		}

		return null;
	}
}

$oEventManager = \Bitrix\Main\EventManager::getInstance();

// IBlock events
$oEventManager->addEventHandler('iblock', '\Bitrix\Iblock\Iblock::OnAfterAdd', ['CIBlockTools', 'Update']);
$oEventManager->addEventHandler('iblock', '\Bitrix\Iblock\Iblock::OnAfterUpdate', ['CIBlockTools', 'Update']);
$oEventManager->addEventHandler('iblock', '\Bitrix\Iblock\Iblock::OnBeforeDelete', ['CIBlockTools', 'Update']);
AddEventHandler('iblock', 'OnAfterIBlockAdd', ['CIBlockTools', 'Update']);
AddEventHandler('iblock', 'OnAfterIBlockUpdate', ['CIBlockTools', 'Update']);
AddEventHandler('iblock', 'OnBeforeIBlockDelete', ['CIBlockTools', 'Update']);

// IBlock property events
$oEventManager->addEventHandler('iblock', '\Bitrix\Iblock\Property::OnAfterAdd', ['CIBlockTools', 'Update']);
$oEventManager->addEventHandler('iblock', '\Bitrix\Iblock\Property::OnAfterUpdate', ['CIBlockTools', 'Update']);
$oEventManager->addEventHandler('iblock', '\Bitrix\Iblock\Property::OnBeforeDelete', ['CIBlockTools', 'Update']);
AddEventHandler('iblock', 'OnAfterIBlockPropertyAdd', ['CIBlockTools', 'Update']);
AddEventHandler('iblock', 'OnAfterIBlockPropertyUpdate', ['CIBlockTools', 'Update']);
AddEventHandler('iblock', 'OnBeforeIBlockPropertyDelete', ['CIBlockTools', 'Update']);

unset($oEventManager);
