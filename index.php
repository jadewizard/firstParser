<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// подключаем библиотеку phpQuery
require_once('phpQuery/phpQuery.php');
	
$arr = array();

$url = 'http://fran-mebel.ru/';

$html = file_get_contents($url);
$doc = phpQuery::newDocumentHTML($html, $charset = 'utf-8');

//$data['title'] = $doc->find("div#catalog-main-menu > table > tr > td > a")->text();

foreach ($doc->find('div#catalog-main-menu > table > tr > td') as $a)
{
    $elements['url'] = pq($a)->find('a')->attr('href');
    $elements['title'] = pq($a)->find('a')->text();

    preg_match_all('/[А-Я][^А-Я]*?/Usu',$elements['title'],$data['title']);
    //Регуляркой разбиваем категории на массивы по заглавным буквам
    //Присваиваем категории массиву data[title]

    print_r($data['title']);
}
?>