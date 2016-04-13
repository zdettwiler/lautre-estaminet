<?php

namespace lautreestaminet;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
	public function get_date_string($type)
	{
		$months_short = config('fr_dates.months_short');

		if($type == 'start')
			$date = strtotime($this->date_start);

		if($type == 'end')
			$date = strtotime($this->date_end);

		return date('d', $date) ." ". $months_short[date('n', $date)] ." ". date('Y', $date);
	}
}
