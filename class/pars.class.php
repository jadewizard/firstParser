<?php

require_once('phpQuery/phpQuery.php');

class parserManager
{
    public $url; //Ссылка на сайт
    public $pqManager;

    public function __construct($url) {
    	$this->url = $url;
    	//Записываем url.

        $html = file_get_contents($url);
        $this->pqManager = phpQuery::newDocumentHTML($html, $charset = 'utf-8');
    }

    public function getGeneralCat()
    {
        $i = 0;

        foreach ($this->pqManager->find('div#catalog-main-menu > table > tr > td') as $a)
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
        return ($fullArray);
        //Возвращаем массив категорий
    }
}