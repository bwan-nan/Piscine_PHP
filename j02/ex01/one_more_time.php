#!/usr/bin/php
<?php

/*
**  timestamp: seconds elapsed since 00:00:00 1 January 1970 
**  tm_year: years since 1900
**  tm_yday: days since January 1 [0;365]
**  leap_year: there is a leap year every 4 years (1972 is a leap year)
**  leapy_days: Number of days to add for every leap year in the interval
**  The exception of centennial years not divisible by 400 is not taken into account here
**  simply because the end of 32 bit Unix Time will occur on January 19, 2038 (it will overflow)
*/

function		wrong_format_31days($array)
{
	$months_with_30days = array(3, 5, 8, 10);
	foreach ($months_with_30days as $elem)
		if ($array['tm_mon'] == $elem && $array['tm_mday'] >= 31)
			return (1);
	return (0);
}

function		leap_exceptions($array)
{
	/* Find out if it is a leap year (1972 being the first leap year in Unix Time) */
	if (($array['tm_year'] - 72) % 4 == 0)
		$is_leap_year = 1;

	if ($array['tm_mday'] >= 29 && $array['tm_mon'] == 1)
		if ($array['tm_mday'] > 29 || $array['tm_mday'] == 29 && !$is_leap_year)
			return (-1);

	return ($is_leap_year ? 1 : 0);
}

function		good_format($string)
{
	$string = trim($string);
	$array = explode(' ', $string);
	$days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
	$months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
					'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
	//print_r($array);
	if (count($array) == 5)
	{
		if (in_array(ucfirst($array[0]), $days)
		&& preg_match('/^[0-9]{1,2}$/', $array[1])
		&& in_array(ucfirst($array[2]), $months)
		&& preg_match('/^[0-9]{4}$/', $array[3]) && $array[3] >= 1970
		&& preg_match('/^[0-9]{2}:[0-9]{2}:[0-9]{2}$/',  $array[4]))
			return (1);
	}
	return (0);
}

if ($argc ==2)
{

	setlocale(LC_TIME, 'fr_FR');
	if (!good_format($argv[1]))
		die ("Wrong Format\n");
	$array = strptime($argv[1], '%A %d %B %Y %H:%M:%S');
//	print_r($array);
	if ($array && ($is_leap_year = leap_exceptions($array)) != -1
	&& !wrong_format_31days($array))
	{
		$leapy_days = ($array['tm_year'] - 70 + 2) / 4;
		$timestamp = ($array['tm_year'] - 70) * 86400 * 365
	    	       + ($array['tm_yday'] - $is_leap_year) * 86400
	     		   + $array['tm_hour'] * 3600
	     		   + $array['tm_min'] * 60
	      		   + $array['tm_sec']
				   + (int)$leapy_days * 86400
	    		   - 3600 /* GMT+1 time */;
		echo $timestamp."\n";
	}
	else
		echo "Wrong Format\n";
}
?>
