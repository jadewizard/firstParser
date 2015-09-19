<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


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

    $data['title'][$i] = $elements['title'];
    //Массив с заголовками

    $data['url'][$i] = $elements['url'];
    //Массив с ссылками

    $fullArray[$i] = array(
    	'title' => $data['title'][$i],
    	'url' => $data['url'][$i] = $elements['url']);
    //Объеденяем два массива в массив массивов.
}

print_r($fullArray);

?>