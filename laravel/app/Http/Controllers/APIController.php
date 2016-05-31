<?php

namespace lautreestaminet\Http\Controllers;

use Illuminate\Http\Request;

use lautreestaminet\Http\Requests;
use lautreestaminet\Http\Controllers\Controller;

use Carbon\Carbon;
use lautreestaminet\Article;
use lautreestaminet\Artist;
use lautreestaminet\Event;
use lautreestaminet\Volunteer;

class APIController extends Controller
{
    public function post_query(Request $posted_data, $function, $object, $id)
	{
		switch($function)
		{
			// ADD AN ITEM
			case 'edit':
				if($object == 'artist')
				{
					echo json_encode($posted_data->all());

					// $artist = Artist::find($id);
					// $artist->event = $posted_data['event'];
					// $artist->description = $posted_data['description'];
					//
					//
					//
					// $artist->save();
				}
				if($object == 'event')
				{
					$event = Event::find($id);

					$event->event = $posted_data['event'];
					$event->description = $posted_data['description'];

					if($posted_data['date-type'] == "a-partir-de-h")
					{
						$event->datetime_start = $posted_data['date-start'] .' '. $posted_data['time-start'];
						$event->datetime_end = '0000-00-00 00:00:00';
					}
					elseif($posted_data['date-type'] == "de-h-a-h")
					{
						$event->datetime_start = $posted_data['date-start'] .' '. $posted_data['time-start'];
						$event->datetime_end = $posted_data['date-start'] .' '. $posted_data['time-end'];
					}
					elseif($posted_data['date-type'] == "du-j-au-j")
					{
						$event->datetime_start = $posted_data['date-start'] .' 00:00:00';
						$event->datetime_end = $posted_data['date-end'] .' 00:00:00';
					}

					$event->save();
				}
				if($object == 'volunteer')
				{
					$volunteer = Volunteer::find($id);

					$volunteer->name = $posted_data['name'];
					$volunteer->nationality = $posted_data['nationality'];
					$volunteer->date_start = $posted_data['date-start'];
					$volunteer->date_leave = $posted_data['date-leave'];
					$volunteer->description = $posted_data['description'];

					$volunteer->save();
				}
		}
	}

	public function get_query($function, $object, $id=0)
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
				if($object == 'event')
				{
					$new_event = new Event;
					$new_event->datetime_start = Carbon::now();
					$new_event->datetime_end = Carbon::now();
					$new_event->save();

					return redirect('admin/evenement/'.$new_event->id);
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
}
