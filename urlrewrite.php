<?php
$arUrlRewrite=array (
  2 => 
  array (
    'CONDITION' => '#^/catalog/([a-zA-Z0-9-]+)/([a-zA-Z0-9-]+)#',
    'RULE' => 'section=$1&element=$2',
    'ID' => '',
    'PATH' => '/catalog/element.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/advices/([a-z-]+)/([a-zA-Z0-9-]+)?(.*)#',
    'RULE' => 'section=$1&element=$2',
    'ID' => '',
    'PATH' => '/advices/element.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/advices/([a-z]+)/([a-zA-Z0-9-]+)#',
    'RULE' => 'section=$1&element=$2',
    'ID' => '',
    'PATH' => '/advices/element.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/catalog/([a-zA-Z0-9-]+)?(.*)#',
    'RULE' => 'category=$1',
    'ID' => '',
    'PATH' => '/catalog/category.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/catalog/([a-zA-Z0-9-]+)#',
    'RULE' => 'category=$1',
    'ID' => '',
    'PATH' => '/catalog/category.php',
    'SORT' => 100,
  ),
);
