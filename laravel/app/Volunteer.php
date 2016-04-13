<?php

namespace lautreestaminet;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $table = 'equipe';

	public function get_date_string($type)
	{
        $months_short = config('fr_dates.months_short');

		if($type == 'start')
			$date = strtotime($this->date_start);
		elseif($type == 'leave')
			$date = strtotime($this->date_leave);

		return $months_short[date('n', $date)] ." ". date('Y', $date);
	}
}
