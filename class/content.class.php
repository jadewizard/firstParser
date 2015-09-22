<?php
//Работа с конетном
class content
{
    public function getAll()
    {
        global $db;

        $data = $db->getAll("SELECT * FROM pre_content");

        return $data;
        //Получаем весь контент
    }
}
?>