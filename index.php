<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'class/pars.class.php';

$pm = new parserManager('http://fran-mebel.ru/');

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
			<?php foreach ($pm->getGeneralCat() as $row){ ?>
			<option value="<?php echo $row['url']; ?>"><?php echo $row['title']; ?></option>
			<?php } ?>
		</select>
	</fieldset>
	</form>
	</html>