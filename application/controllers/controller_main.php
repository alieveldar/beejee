<?php

class Controller_Main extends Controller
{
protected $save_ok = "";

    function action_index()
	{
	    $start = "0";
	    $stop = "3";
	    $column = "name";
	    $sort = "ASC";
	    if(!isset($_COOKIE["column"])){
	       setcookie("column","name",0,"/");
	       setcookie("sort", "ASC",0,"/");
        }
	    if (isset($_POST["name"])){
	        $this->add_db($_POST);
	        $this->save_ok = '<div class="alert alert-success" role="alert">Задача создана</div>';
        }
        if(isset($_GET["page"])&& (int)$_GET["page"] > 1 ){

            $start = ((int)$_GET["page"] * 3) - 3;
            $start = (string)$start;
        }
        $column = $_COOKIE["column"];
        $sort = $_COOKIE["sort"];
        $data = $this->model->get_data($start,$stop,$column,$sort);
		$this->view->generate('main_view.php', 'template_view.php', $data, $this->save_ok);
	}

	protected function add_db($post){
        $this->model->add_data($post);
    }
}