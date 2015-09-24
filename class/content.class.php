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

    public function delete($data)
    {
        global $db;

        foreach ($data as $id)
        {
            $response = $db->query("DELETE FROM pre_content WHERE id='$id'");
        }
    }
}
?>