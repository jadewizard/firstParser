<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'phpQuery/phpQuery.php'; //Lib
require_once 'class/pars.class.php'; //Class

$pm = new parserManager('http://fran-mebel.ru/');
//Создаём новый экземляр класса

require_once 'handler.php';
//Обработчик форм

include 'main.php'; //TMP
?>