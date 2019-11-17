<?php

class View
{

	function generate($content_view, $template_view, $data = null, $save_ok = null)
	{

		include 'application/views/'.$template_view;
	}
}
