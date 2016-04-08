<?php

namespace lautreestaminet;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function get_date_string()
	{
        $months_short = config('fr_dates.months_short');
		$date = strtotime($this->date);

		return date('d', $date) ." ". $months_short[date('n', $date)] ." ". date('Y', $date);
	}


}
