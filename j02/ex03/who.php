#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR');
$fd = fopen('/var/run/utmpx', 'r');
while ($data = fread($fd, 628))
{
	if (strlen($data) == 628)
	{
		$data = unpack("a8user/a248garbage/a4id/a7line/a25garbage/ipid/itype/itime", $data);
		if ($data['type'] == 7)
		{
			$date = ucfirst(strftime('%h %d %H:%M', $data['time'])); 
			$result[] = $data['user']." ".$data['line']."  ".$date." ";
		}
	}
}
sort($result);
foreach($result as $elem)
	echo $elem."\n";

?>
