<?php

namespace lautreestaminet\Http\Controllers;

use Illuminate\Http\Request;

use lautreestaminet\Http\Requests;
use lautreestaminet\Http\Controllers\Controller;

use lautreestaminet\Article;
use lautreestaminet\Volunteer;

class AdminController extends Controller
{
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
		$volunteers = Volunteer::orderBy('date_leave', 'desc')->get();

		// dd($articles);

        return view('admin.all_volunteers', ['volunteers' => $volunteers]);
	}

	public function edit_volunteer($id)
	{
		$volunteer = Volunteer::where('id', $id)->first();

		return view('admin.edit_volunteer', ['volunteer' => $volunteer]);
	}
}
