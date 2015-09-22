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
}
else
{
    $currentPage = 'pages/main.php';
}

if ($currentStep == 1)
{
    $currentPage = 'pages/allcat.php';
    //Показыаем страницу с выбором категорий для парсинга
}

include 'pages/index.php';

?>