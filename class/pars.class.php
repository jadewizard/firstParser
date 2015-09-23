<?php

require_once('phpQuery/phpQuery.php');

class parserManager
{
    public $url; //Ссылка на сайт
    public $pqManager;

    public function __construct($url) {
    	global $currentStep;

    	$this->url = $url;
    	//Записываем url.

        $html = file_get_contents($url);
        $this->pqManager['allCat'] = phpQuery::newDocumentHTML($html, $charset = 'utf-8');

        //$currentStep = 1;
    }

    public function getGeneralCat()
    {
    	global $currentStep;

        $i = 0;

        foreach ($this->pqManager['allCat']->find('div#catalog-main-menu > table > tr > td') as $a)
        {
            $i++;

            $elements['url'] = pq($a)->find('a')->attr('href');
            $elements['title'] = pq($a)->find('a')->text();

            $data['title'][$i] = $elements['title'];
            //Массив с заголовками

            $data['url'][$i] = $elements['url'];
            //Массив с ссылками

            //$subCat = $this->getSubCat($data['url'][$i]);
            //print_r($subCat);

            $fullArray[$i] = array(
                'title' => $data['title'][$i],
                'url' => $data['url'][$i] = $elements['url']);
                 //Объеденяем два массива в массив массивов.
        }
        $currentStep = 1;
        return ($fullArray);
        //Возвращаем массив категорий
    }

    public function getSubCat($preCat)
    {
    	global $currentStep,$priceArray;

    	for ($z = 0; $z < count($preCat); $z++)
    	{
    		$i = 0;

    	    $html = file_get_contents($this->url.$preCat[$z]);
    	    //Получаем код страницы.
            $this->pqManager['subCat'] = phpQuery::newDocumentHTML($html, $charset = 'utf-8');

    	    $htmlData = $this->pqManager['subCat']->find('div#prod > span')->html();

    	    if (empty($htmlData))
    	    {
                foreach ($this->pqManager['subCat']->find('div#prod') as $a)
                {
        	        $i++;

                    $elements['title'] = pq($a)->find('a')->text();
                    $elements['url'] = pq($a)->find('a')->attr('href');

                    $data['title'][$i] = $elements['title'];
                    //Массив с заголовками

                    $data['url'][$i] = $elements['url'];
                    //Массив с ссылками

                    $fullArray[$z][$i] = array(
                        'title' => $data['title'][$i],
                        'url' => $data['url'][$i] = $elements['url']);
                         //Объеденяем два массива в массив массивов.
                }
    	    }
    	    else
    	    {
                $fullArray[$z][$i] = array(
                    'title' => null,
                    'url' => $preCat[$z]);
                     //Объеденяем два массива в массив массивов.
    	    }
    	}
    	$this->getShopElements($fullArray);
    }

    public function getShopElements($preCat)
    {
    	global $currentStep;

    	$i = 0;

    	for ($z = 0; $z < count($preCat); $z++)
    	{
    		for ($x = 0; $x<count($preCat[$z]);$x++)
    		{
                $url = $this->url.$preCat[$z][$x]['url'];
                $html = file_get_contents($url);
                $this->pqManager['shop'] = phpQuery::newDocumentHTML($html, $charset = 'utf-8');
                 
                //Определяем ссылку на элемент для парсинга
                if (!empty($this->pqManager['shop']->find('table#elements > tr#have')))
                {
                    $parsStr = 'table.item-table';
                    //В первом случае мы обращаемся к таблице с классом item-table
                }
                else
                {
                    $parsStr = 'div.sorting-item';
                    //Во втором случае обращаемся к блоку с классом sorting-item
                }

                foreach ($this->pqManager['shop']->find($parsStr) as $a)
                {
	                $i++;

                    $elements['url'] = pq($a)->find('a')->attr('href');
                    $elements['img'] = pq($a)->find('img')->attr('src');
                    $elements['title'] = pq($a)->attr('data-name');
                    $elements['price'] = pq($a)->attr('data-price');

                    $data['title'][$i] = $elements['title'];
                    //Массив с заголовками

                    $data['url'][$i] = $elements['url'];
                    //Массив с ссылками

                    $data['price'][$i] = $elements['price'];
                    //Массив в ценами

                    $data['img'][$i] = $elements['img'];
                    //Массив в фото

                    $fullArray[$i] = array(
    	                'title' => $data['title'][$i],
    	                'url' => $data['url'][$i],
    	                'img' => $this->url.$data['img'][$i],
    	                'price' => $data['price'][$i]);
                    //Объеденяем два массива в массив массивов.
                }

    		}
            //$currentStep = 3;
            //print_r($fullArray);
            $this->dbWrite($fullArray);
        }
    }

    public function dbWrite($data)
    {
        global $db;

        print_r($data[1]['title']);

        foreach ($data as $row)
        {
            $db->query("INSERT INTO pre_content (img,title,price) VALUES ('$row[img]','$row[title]','$row[price]')");
        }
        header("Location: index.php?page=parsing");
    }
}