</html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
function firstStepValid (form)
{
    var input = form.inputGenCat.value;
    if(!input)
    {
        alert('Выберете категорию!');
        return false;
    }
    else
    {
        return true;
    }
}
</script>
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
                    <input type="submit" value="Далее" name="btnStep1" class="btn btn-default btn-block">
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
                    <input type="submit" value="Далее" name="btnStep2" class="btn btn-default btn-block glyphicon glyphicon-search">
                    <a href="index.php?step=1" class="btn btn-danger btn-block">Назад</a>
                </form>
            </div>
        </div>
        <?php } ?>
        <?php if ($currentStep == 3) { ?>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Публиковать?</th>
                    <th>Фотография</th>
                    <th>Заголовок</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
            <form method="POST">
            <input type="submit" name="okBtn" value="Опубликовать">
            <?php $i=0; foreach ($priceArray as $row){ ?>
                <tr class="success">
                    <td><?php $i++; echo $i; ?></td>
                    <td><input type="checkbox" value="<?php echo $i; ?>" name="priceCheck[]"></td>
                    <td><img width="50" height="50" src="<?php echo $row['img']; ?>"></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                </tr>
            <?php } ?>
            </form>
            </tbody>
        </table>
        <?php } ?>
    </div>
</div>