<?php

class Model
{
	public function get_data()
	{

	}
    protected function get_conection()
    {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($mysqli->connect_errno) {
            echo " DATABASE ERROR";
            exit;
        }else{
            return $mysqli;

        }
    }
    function no_xxs($string){
        return str_replace("'", "&lsquo;",htmlspecialchars($string));
    }
}