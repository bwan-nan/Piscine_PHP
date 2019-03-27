#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR');
$fd = fopen('/var/run/utmpx', 'r');
while ($data = fread($fd, 628))
{
	if (strlen($data) == 628)
	{
		$data = unpack("a256user/a4id/a32line/ipid/itype/itime", $data);
		//print_r($data);
		if ($data['type'] == 7)
		{
			$date = ucfirst(strftime('%h %d %H:%M', $data['time'])); 
			$result[] = $data['user']." ".$data['line']."  ".$date;
		}
	}
}
sort($result);
foreach($result as $elem)
	echo $elem."\n";

?>
