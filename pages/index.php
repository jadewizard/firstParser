</html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<br>
<div class="container">
<div class="row">
    <div class="col-md-3">
        <div class="well">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a href="index.php">Главная</a></li>
                <li role="presentation"><a href="index.php?page=parsing">Парсинг</a></li>
                <li role="presentation"><a href="index.php?page=setting">Настройки</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-8">
        <div class="well">
            <?php include $currentPage; ?>
        </div>
    </div>
</div>
</div>