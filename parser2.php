<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

	
$i = 0;

$url = 'http://fran-mebel.ru/catalog-553k.html';

$html = file_get_contents($url);
$doc = phpQuery::newDocumentHTML($html, $charset = 'utf-8');

//$data['title'] = $doc->find("div#catalog-main-menu > table > tr > td > a")->text();

foreach ($doc->find('div.sorting-item') as $a)
{
	$i++;

    $elements['url'] = pq($a)->find('a')->attr('href');
    $elements['title'] = pq($a)->attr('data-name');
    $elements['price'] = pq($a)->attr('data-price');

    $data['title'][$i] = $elements['title'];
    //Массив с заголовками

    $data['url'][$i] = $elements['url'];
    //Массив с ссылками

    $data['price'][$i] = $elements['price'];
    //Массив в ценами

    $fullArray[$i] = array(
    	'title' => $data['title'][$i],
    	'url' => $data['url'][$i],
    	'price' => $data['price'][$i]);
    //Объеденяем два массива в массив массивов.
}

print_r($fullArray);

//print_r($_POST);

?>
</html>

<style>
	.box1{ width: 300px; height: 200px; }
	.box2{ width: 300px; height: 180px; }
</style>

<title>Parser</title>
<form method="post">
	<fieldset class="box1">
		<legend>Выбор категорий для парсинга</legend>
		<select multiple="" name="input[]" class="box2">
			<?php foreach ($fullArray as $row){ ?>
			<option value="<?php echo $row['url']; ?>"><?php echo $row['title']; ?></option>
			<?php } ?>
		</select>
	</fieldset>
	</form>
	</html>