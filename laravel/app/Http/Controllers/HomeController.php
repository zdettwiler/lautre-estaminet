<?php

namespace lautreestaminet\Http\Controllers;

use Illuminate\Http\Request;

use lautreestaminet\Http\Requests;
use lautreestaminet\Http\Controllers\Controller;

use Carbon\Carbon;
use DB;
use lautreestaminet\Article;
use lautreestaminet\Artist;
use lautreestaminet\Volunteer;

class HomeController extends Controller
{
    public function home()
    {
		$next_events = $this->_get_next_events();
        $articles = $this->_get_articles(false, false, 3);
        // _get_exhibitors

        return view('home', compact('next_events', 'articles'));
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
        $next_events = $this->_get_next_events();
        $articles = $this->_get_articles($date, $slug);

        return view('nos_evenements', compact('next_events', 'articles'));
    }

    private function _get_next_events()
    {
        $next_events = DB::table('events')
			->where('date_start', '<=', date("Y-m-d", strtotime("+4 week")))
			->where('date_start', '>=', date("Y-m-d"))
			->get();

        $days = config('fr_dates.days');
        $months = config('fr_dates.months');
        $months_short = config('fr_dates.months_short');

        foreach($next_events as $event)
        {
            $datetime_start = strtotime($event->datetime_start);
            $datetime_end = strtotime($event->datetime_end);

            // Date end = 0
            // Jour 00 Mois à partir de hh:mm
            if($datetime_end == 0)
            {
                $date = $days[date('N', $datetime_start)] .' '. date('d', $datetime_start) .' '. $months_short[date('n', $datetime_start)] .' à partir de '. date('H:i', $datetime_start);
            }

            // Same date, different time
            // Jour 00 Mois de HH:MM à HH:00
            elseif(date('d/n/Y', $datetime_start) == date('d/n/Y', $datetime_end)
                    AND date('H:i', $datetime_start) != date('H:i', $datetime_end))
            {
                $date = $days[date('N', $datetime_start)] .' '. date('d', $datetime_start) .' '. $months_short[date('n', $datetime_start)] .' de '. date('H:i', $datetime_start).' à '. date('H:i', $datetime_end);
            }

            // times = 0
            // Jour 00 Mois au Jour 00 Mois
            elseif(date('H:i', $datetime_start) == '00:00' AND date('H:i', $datetime_end) == '00:00')
            {
                $date = $days[date('N', $datetime_start)] .' '. date('d', $datetime_start) .' '. $months_short[date('n', $datetime_start)] .' au '. $days[date('N', $datetime_end)] .' '. date('d', $datetime_end) .' '. $months_short[date('n', $datetime_end)];
            }

            $event->date = $date;
        }

        return $next_events;
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

		$equipe = Volunteer::where('date_start', '<>', '0000-00-00')->get();


        return view('notre_equipe', compact('equipe_permanent', 'equipe'));
    }

	public function nous_contacter(Request $form)
	{

	}


}
