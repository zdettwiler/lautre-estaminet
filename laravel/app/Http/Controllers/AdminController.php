<?php

namespace lautreestaminet\Http\Controllers;

use Illuminate\Http\Request;

use lautreestaminet\Http\Requests;
use lautreestaminet\Http\Controllers\Controller;

use lautreestaminet\Article;

class AdminController extends Controller
{
    public function index()
	{

	}

	public function all_articles()
	{
		$articles = Article::all();

		// dd($articles);

        return view('admin.all_articles', ['articles' => $articles]);
	}
}
