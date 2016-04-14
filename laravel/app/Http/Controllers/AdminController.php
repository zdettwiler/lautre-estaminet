<?php

namespace lautreestaminet\Http\Controllers;

use Illuminate\Http\Request;

use lautreestaminet\Http\Requests;
use lautreestaminet\Http\Controllers\Controller;

use lautreestaminet\Article;
use lautreestaminet\Artist;
use lautreestaminet\Event;
use lautreestaminet\Volunteer;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function index()
	{
		return view('admin.dashboard');
	}

	public function all_articles()
	{
		$articles = Article::orderBy('date', 'desc')->get();

		// dd($articles);

        return view('admin.all_articles', ['articles' => $articles]);
	}

	public function edit_article($id)
	{
		$article = Article::where('id', $id)->first();
	}

	public function all_volunteers()
	{
		$volunteers = Volunteer::orderBy('id', 'desc')->get();

        return view('admin.all_volunteers', ['volunteers' => $volunteers]);
	}

	public function edit_volunteer($id)
	{
		$volunteer = Volunteer::where('id', $id)->first();

		return view('admin.edit_volunteer', ['volunteer' => $volunteer]);
	}

	public function all_artists()
	{
		$artists = Artist::orderBy('date_end', 'desc')->get();

        return view('admin.all_artists', ['artists' => $artists]);
	}

	public function edit_artist($id)
	{
		$artist = Artist::where('id', $id)->first();

		return view('admin.edit_artist', ['artist' => $artist]);
	}

	public function all_events()
	{
		$events = Event::orderBy('datetime_end', 'desc')->get();

        return view('admin.all_events', ['events' => $events]);
	}

	public function edit_event($id)
	{
		$event = Event::where('id', $id)->first();

		return view('admin.edit_event', ['event' => $event]);
	}
}
