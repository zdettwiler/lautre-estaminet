<?php

namespace lautreestaminet\Http\Controllers;

use Illuminate\Http\Request;

use lautreestaminet\Http\Requests;
use lautreestaminet\Http\Controllers\Controller;

use Carbon\Carbon;
use DB;

use lautreestaminet\Article;
use lautreestaminet\Artist;
use lautreestaminet\Event;
use lautreestaminet\Volunteer;

class HomeController extends Controller
{
    public function home()
    {
		$next_events = Event::where('datetime_start', '<=', date("Y-m-d", strtotime("+4 week")))
			->where('datetime_start', '>=', date("Y-m-d"))
			->get();

		$articles = $this->_get_articles(false, false, 3);

		$artists = Artist::where('date_end', '>', Carbon::now())->get();

        return view('home', compact('next_events', 'articles', 'artists'));
    }

	public function nos_produits()
    {
        return view('nos_produits');
    }

	public function notre_concept()
    {
        return view('notre_concept');
    }

    public function make_slug()
    {
        $articles = DB::table('articles')
			->orderBy('date', 'desc')
            ->get();

        $accents_norm = ['Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'AE', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Œ'=>'OE', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'ae', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'œ'=>'oe', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f', 'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T'];

        foreach($articles as $article)
        {
            echo $article->title.'<br>';

            $slug = strtr($article->title, $accents_norm);
            $slug = strtolower($slug);
            $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $slug);
            if($slug[0] == '-')
                $slug[0] = '';
            if($slug[strlen($slug)-1] == '-')
                $slug[strlen($slug)-1] = '';

            DB::table('articles')
                ->where('id', $article->id)
                ->update(['slug' => $slug]);

            echo $slug.'<br><br>';

        }
    }

    public function nos_evenements($date = false, $slug = false)
    {
		$next_events = Event::where('datetime_start', '<=', date("Y-m-d", strtotime("+4 week")))
			->where('datetime_start', '>=', date("Y-m-d"))
			->get();


        $articles = $this->_get_articles($date, $slug);

        return view('nos_evenements', compact('next_events', 'articles'));
    }

    private function _get_articles($date, $slug, $nb = 5)
    {
        $days = config('fr_dates.days');
        $months_nb = config('fr_dates.months_nb');
        $months_short = config('fr_dates.months_short');

        // If no date and no slug is provided, return all articles.
        if(!$date AND !$slug)
        {
			$articles = Article::orderBy('date', 'desc')
				->take($nb)
				->get();
        }

        // If at least date is provided, return corresponding article(s).
        elseif($date)
        {
            $day = substr($date, 0, 2);
            $month = strtoupper(substr($date, 2, 3));
            $year = substr($date, 5, 2);

            if(isset($months_nb[$month]))
                $date = '20'. $year .'-'. $months_nb[$month] .'-'. $day;

            if(!$slug)
            {
				$articles = Article::where('date', $date)
					->get();
            }
            else
            {
                $articles = Article::where('date', $date)
        			->where('slug', $slug)
                    ->get();
            }
        }

        return $articles;
    }

    public function notre_expo_tournante()
    {
		$artists = Artist::where('date_end', '>', Carbon::now())->get();

		return view('notre_expo_tournante', compact('artists'));
    }

    public function notre_equipe()
    {
        $equipe_permanent = Volunteer::where('date_start', '0000-00-00')
			->where('date_leave', '0000-00-00')
			->get();

		$equipe_actuels = Volunteer::where('date_start', '<>', '0000-00-00')
			->where('date_leave', '0000-00-00')
			->orderBy('date_start', 'desc')
			->get();

		$equipe = Volunteer::where('date_start', '<>', '0000-00-00')
			->where('date_leave', '<>', '0000-00-00')
			->orderBy('date_leave', 'desc')
			->get();


        return view('notre_equipe', compact('equipe_permanent', 'equipe_actuels', 'equipe'));
    }

	public function nous_trouver()
	{
		return redirect('/#nous-trouver');
	}

	public function nous_contacter()
	{
		return redirect('/#nous-contacter');
	}


}
