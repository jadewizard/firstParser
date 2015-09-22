<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'phpQuery/phpQuery.php'; //Lib
require_once 'class/db.class.php';

$db = new SafeMysql(array('user' => 'root', 'pass' => '211996','db' => 'parser', 'charset' => 'UTF8'));
//База данных

require_once 'class/pars.class.php'; //Class
require_once 'class/content.class.php';

$pm = new parserManager('http://fran-mebel.ru/');
//Создаём новый экземляр класса

$content = new content();
//Класс для обработки контента

$allContentArray = $content->getAll();

require_once 'handler.php';
//Обработчик форм

include 'pages.php'; //TMP

print_r($_POST)
?>