<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'class/pars.class.php';

print_r($_POST);

$pm = new parserManager('http://fran-mebel.ru/');

if (isset($_GET['step']))
{
    $currentStep = $_GET['step'];
}

if (isset($_POST['genCatSend']))
{
    if (!empty($_POST['inputGenCat']))
    {
        $subCatArray = $pm->getSubCat($_POST['inputGenCat']);
    }
}

if (isset($_POST['genSubCatSend']))
{
    if (!empty($_POST['inputSubGenCat']))
    {}
}
?>
</html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
.fullbg{background-image: url(fullbg.png); width: 100%; height: 100%}
</style>
<div class="container">
<br>
<br>
<div class="row">
    <div class="col-md-12">

        <?php if ($currentStep == 1) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">Выбор основной категории</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="index.php?step=2">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <select multiple=""size="12" name="inputGenCat" class="form-control">
                                <?php foreach ($pm->getGeneralCat() as $row){ ?>
                                <option value="<?php echo $row['url']; ?>"><?php echo $row['title']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="Далее" name="genCatSend" class="btn btn-default btn-block">
                </form>
            </div>
        </div>
        <?php } ?>

        <?php if ($currentStep == 2) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">Выбор подкатегории</div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="index.php?step=3">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <select multiple="" size="12" name="inputSubGenCat" class="form-control">
                                <?php foreach ($pm->getSubCat($_POST['inputGenCat']) as $row){ ?>
                                <option value="<?php echo $row['url']; ?>"><?php echo $row['title']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="Далее" name="genSubCatSend" class="btn btn-default btn-block glyphicon glyphicon-search">
                    <a href="index.php?step=1" class="btn btn-danger btn-block">Назад</a>
                </form>
            </div>
        </div>
        <?php } ?>

    </div>
</div>