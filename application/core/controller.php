<?php

class Controller {
	
	public $model;
	public $view;
	public $alltasks;
	
	function __construct()
	{
		$this->view = new View();
		$this->model = new Model_Task();

	}

	function action_index()
	{

	}
}
