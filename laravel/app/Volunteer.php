<?php

namespace lautreestaminet;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

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

	public function isPassed()
	{
		if($this->date_start < Carbon::now()
		&& $this->date_start != '0000-00-00'
		&& $this->date_leave < Carbon::now()
		&& $this->date_leave != '0000-00-00')
			return 'passed';

		else
			return '';
	}
}
