<?php

use \Bitrix\Main\Loader;
CModule::IncludeModule('iblock');

require 'events.php';
require 'functions.php';

//автоподключение классов
Loader::registerAutoLoadClasses(null,
	[
			'Helpers'						 => '/local/classes/Helpers.php',
			'CIBlockTools'					 => '/local/classes/iblockTools.php',
	]
);
