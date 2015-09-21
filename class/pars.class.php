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

        $currentStep = 1;
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

    	$i = 0;

        $html = file_get_contents($this->url.$preCat);
        $this->pqManager['subCat'] = phpQuery::newDocumentHTML($html, $charset = 'utf-8');

        	$htmlData = $this->pqManager['subCat']->find('div#prod > span')->html();

            //Если переменная htmlData пустая,
            //то это означает, что в основной категории
            //есть ещё подкатегории
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

                    $fullArray[$i] = array(
                        'title' => $data['title'][$i],
                        'url' => $data['url'][$i] = $elements['url']);
                         //Объеденяем два массива в массив массивов.
                }
                $currentStep = 2;
                return $fullArray;
                //Возвращем массив с категориями

            }
       	    else
        	{
                $priceArray = $this->getShopElements($_POST['inputGenCat']);
                //Вызываем функцию которая получит товары из определённой категории
        		//$currentStep = 3;
        	}
    }

    public function getShopElements($preCat)
    {
    	global $currentStep;

    	$i = 0;
    	$url = $this->url.$preCat;
    	print_r($url);
        $html = file_get_contents($url);
        $this->pqManager['shop'] = phpQuery::newDocumentHTML($html, $charset = 'utf-8');

        foreach ($this->pqManager['shop']->find('div.sorting-item') as $a)
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
        $currentStep = 3;
        //print_r($fullArray);
        return $fullArray;
    }
}