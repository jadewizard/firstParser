<?php
if (isset($_GET['page']))
{
    switch ($_GET['page'])
    {
        case 'parsing':
            $currentPage = 'pages/parsing.php';
            break;

        case 'setting':
            $currentPage = 'pages/setting.php';
            break;

        default:
            $currentPage = 'pages/main.php';
            break;
    }

    if (isset($_GET['act']) && $_GET['act'] == 'refresh')
    {
        $currentPage = 'pages/allcat.php';
        //Показыаем страницу с выбором категорий для парсинга
    }
}
else
{
    $currentPage = 'pages/main.php';
}

include 'pages/index.php';

?>