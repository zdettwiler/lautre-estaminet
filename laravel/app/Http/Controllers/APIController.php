<?php

namespace lautreestaminet\Http\Controllers;

use Illuminate\Http\Request;

use lautreestaminet\Http\Requests;
use lautreestaminet\Http\Controllers\Controller;

class APIController extends Controller
{
    public function post_query(Request $posted_data, $function, $object, $id)
	{
		if($function == 'edit')
		{
			echo json_encode($posted_data->all());
		}
	}

	private function _edit(Request $posted_data, $object, $id)
	{
		echo json_encode($posted_data);
	}
}
