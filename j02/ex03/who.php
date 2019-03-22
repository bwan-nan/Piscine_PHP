#!/usr/bin/php
<?php
function		ft_strlen($string)
{
	$i = 0;
	while ($string[$i] != '')
		$i++;
	return ($i);
}


date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR');
$fd = fopen('/var/run/utmpx', 'r');
while ($data = fread($fd, 628))
{
	if (ft_strlen($data) == 628)
	{
		$data = unpack("a256user/a4id/a32line/ipid/itype/itime", $data);
		print_r($data);
		if ($data['type'] == 7)
		{
			echo $data['user']." ";
			echo $data['line']."  ";
			$date = ucfirst(strftime('%h %d %H:%M', $data['time'])); 
			echo $date."\n";
		}
	}
}

?>
