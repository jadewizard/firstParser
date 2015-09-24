<?php

if (isset($_POST['btnStep1']))
{
	//Если нажата кнопка у первой формы.
    $subCatArray = $pm->getSubCat($_POST['inputGenCat']);
}

if (isset($_POST['btnStep2']))
{
    //Если нажата кнопка у второй формы
    $priceArray = $pm->getShopElements($_POST['inputSubGenCat']);
    //print_r($priceArray);
}

if (isset($_POST['okBtn']))
{
    print_r($_POST['priceCheck']);
}

if (isset($_GET['act']) && $_GET['act'] == 'refresh')
{
    $allCatArray = $pm -> getGeneralCat();
}

if (isset($_POST['inputCat']) && !empty($_POST['inputCat']))
{
    $catArray = $_POST['inputCat'];

    $pm->getSubCat($catArray);
}

if (isset($_GET['act']) && $_GET['act'] == 'del')
{
    $content->delete($_POST['selectRow']);
}

?>