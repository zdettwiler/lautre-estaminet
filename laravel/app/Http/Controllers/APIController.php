<?php

namespace lautreestaminet\Http\Controllers;

use Illuminate\Http\Request;

use lautreestaminet\Http\Requests;
use lautreestaminet\Http\Controllers\Controller;

use lautreestaminet\Article;
use lautreestaminet\Artist;
use lautreestaminet\Event;
use lautreestaminet\Volunteer;

class APIController extends Controller
{
    public function post_query(Request $posted_data, $function, $object, $id)
	{
		if($function == 'edit')
		{
			echo json_encode($posted_data->all());
		}
	}

	public function get_query($function, $object, $id)
	{
		switch($function)
		{
			// ADD AN ITEM
			case 'add':
				if($object == 'artist')
				{
					$new_artist = new Artist;
					$new_artist->save();

					return redirect('admin/artiste/'.$new_artist->id);
				}
				if($object == 'benevole')
				{
					$new_volunteer = new Volunteer;
					$new_volunteer->save();

					return redirect('admin/benevole/'.$new_volunteer->id);
				}

			// DELETE AN ITEM
			case 'delete':
				if($object == 'artist')
				{
					// Artist::destroy($id);
					// return redirect('admin/artistes');
					echo 'delete artist '.$id;
				}
				if($object == 'benevole')
				{
					// Volunteer::destroy($id);
					// return redirect('admin/benevoles');
					echo 'delete volunteer '.$id;
				}
				if($object == 'event')
				{
					// Event::destroy($id);
					// return redirect('admin/evenements');
					echo 'delete event '.$id;
				}
		}

	}

	private function _edit(Request $posted_data, $object, $id)
	{
		echo json_encode($posted_data);
	}
}
