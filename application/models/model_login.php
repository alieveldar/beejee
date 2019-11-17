<?php

class Model_Login extends Model
{
    public function get_admin($name, $password)
    {
        $mysqli = $this->get_conection();
        $sql = "SELECT * FROM `admin` WHERE `name`='" . self::no_xxs($name) . "' && `password`='" . self::no_xxs($password) . "'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function make_done($id, $done){
        $mysqli = $this->get_conection();
        $sql = "UPDATE `task` SET `state` = '".$done."' WHERE `ID`='".$id."'";
        $result = $mysqli->query($sql);
    }

    public function save_text($id, $text){
        $mysqli = $this->get_conection();
        $sql = "SELECT `text` FROM `task` WHERE `ID`='".$id."'";
        $result = $mysqli->query($sql);
        $dbtext = $result->fetch_assoc()["text"];
        if($dbtext !== $text) {
            $sql = "UPDATE `task` SET `a_edited` = '1', `text`='".self::no_xxs($text)."' WHERE `ID`='" . $id . "'";
            $result = $mysqli->query($sql);
        }
    }
}