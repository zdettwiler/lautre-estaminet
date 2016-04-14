<?php

namespace lautreestaminet;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public function get_date_string()
	{
		$days = config('fr_dates.days');
        $months = config('fr_dates.months');
        $months_short = config('fr_dates.months_short');

		$datetime_start = strtotime($this->datetime_start);
		$datetime_end = strtotime($this->datetime_end);
		$date_string = '';

		// Date end = 0
		// Jour 00 Mois à partir de hh:mm
		if($datetime_end == false || $datetime_end < 0)
		{
			$date_string = $days[date('N', $datetime_start)] .' '. date('d', $datetime_start) .' '. $months_short[date('n', $datetime_start)] .' à partir de '. date('H:i', $datetime_start);
		}

		// Same date, different time
		// Jour 00 Mois de HH:MM à HH:00
		elseif(date('d/n/Y', $datetime_start) == date('d/n/Y', $datetime_end)
				AND date('H:i', $datetime_start) != date('H:i', $datetime_end))
		{
			$date_string = $days[date('N', $datetime_start)] .' '. date('d', $datetime_start) .' '. $months_short[date('n', $datetime_start)] .' de '. date('H:i', $datetime_start).' à '. date('H:i', $datetime_end);
		}

		// times = 0
		// Jour 00 Mois au Jour 00 Mois
		elseif(date('H:i', $datetime_start) == '00:00' AND date('H:i', $datetime_end) == '00:00')
		{
			$date_string = $days[date('N', $datetime_start)] .' '. date('d', $datetime_start) .' '. $months_short[date('n', $datetime_start)] .' au '. $days[date('N', $datetime_end)] .' '. date('d', $datetime_end) .' '. $months_short[date('n', $datetime_end)];
		}

		return $date_string;

		// $months_short = config('fr_dates.months_short');
		//
		// if($start_end == 'start')
		// {
		// 	$date_string = strtotime($this->date_start);
		// }
		// if($start_end == 'end')
		// {
		// 	$date_string = strtotime($this->date_end);
		// }
		//
		// return date('d', $date) ." ". $months_short[date('n', $date)] ." ". date('Y', $date);
	}

	public function get_datetime_date_time($start_end, $date_time)
	{
		// Start or End?
		if($start_end == 'start')
		{
			$datetime = $this->datetime_start;
		}
		if($start_end == 'end')
		{
			$datetime = $this->datetime_end;
		}

		// Date or Time?
		if($date_time == 'date')
		{
			return explode(' ', $datetime)[0];
		}
		elseif($date_time == 'time')
		{
			return explode(' ', $datetime)[1];
		}
	}

	public function get_a_partir_de_h_status()
	{
		if(strtotime($this->datetime_end) == 0)
		{
			return 'checked';
		}

		return '';
	}
	public function get_de_h_a_h_status()
	{
		// Same date, different time
		// Jour 00 Mois de HH:MM à HH:00
		if(date('d/n/Y', strtotime($this->datetime_start)) == date('d/n/Y', strtotime($this->datetime_end))
				AND date('H:i', strtotime($this->datetime_start)) != date('H:i', strtotime($this->datetime_end)))
		{
			return 'checked';
		}

		return '';
	}
	public function get_du_j_au_j_status()
	{
		// times = 0
		// Jour 00 Mois au Jour 00 Mois
		if(date('H:i', strtotime($this->datetime_start)) == '00:00' AND date('H:i', strtotime($this->datetime_end)) == '00:00')
		{
			return 'checked';
		}

		return '';
	}

}
