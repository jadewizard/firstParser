<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// подключаем библиотеку phpQuery
require_once('phpQuery/phpQuery.php');
	
$i = 0;

$url = 'http://fran-mebel.ru/';

$html = file_get_contents($url);
$doc = phpQuery::newDocumentHTML($html, $charset = 'utf-8');

//$data['title'] = $doc->find("div#catalog-main-menu > table > tr > td > a")->text();

foreach ($doc->find('div#catalog-main-menu > table > tr > td') as $a)
{
	$i++;

    $elements['url'] = pq($a)->find('a')->attr('href');
    $elements['title'] = pq($a)->find('a')->text();

    $data[$i] = $elements['title'];
    //Записываем в массив данные полученые с сайта
}

print_r($data);
?>