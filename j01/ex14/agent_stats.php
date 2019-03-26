#!/usr/bin/php
<?php
function		parse_csv($fd)
{
	$stats = array();
	$line = fgets($fd);
	while ($line = fgets($fd))
	{
		$array = explode(';', $line);
		$user_stats = array(
			'User' => $array[0],
			'Note' => $array[1],
			'Noteur' => $array[2],
			'Feedback' => $array[3]
		);
		$i = 0;
		foreach($user_stats as $key => $value)
		{
			if ($value == '')
				break ;
			$i++;
		}
		if ($i == 4)
			$stats[] = $user_stats;
	}
	return ($stats);
}

function		get_average($stats)
{
	$i = 0;
	foreach($stats as $stat)
	{
		if ($stat['Noteur'] !== 'moulinette')
		{
			$sum += $stat['Note'];
			$i++;
		}
	}
	return ($sum / $i);
}

function		get_user_info($stats, $users)
{
	$result = [];
	foreach($users as $user)
	{
		$i = 0;
		$sum = 0;
		$mouli_grade = '';
		foreach($stats as $stat)
		{
			if ($stat['User'] == $user && $stat['Noteur'] != 'moulinette')
			{
				$i++;
				$sum += $stat['Note'];
			}
			else if ($stat['User'] == $user && $stat['Noteur'] == 'moulinette')
				$mouli_grade = $stat['Note'];
		}
		$result[] = array(
			'User' => $user,
			'Mean' => ($sum / $i),
			'Deviation' => ($sum / $i) - $mouli_grade
		);
	}
	return ($result);
}

function		get_users_list($stats)
{
	$users = [];
	foreach($stats as $stat)
		$users[] = $stat['User'];
	$users = array_unique($users);
	sort($users);
	return ($users);
}

if ($argc == 2)
{
	$input = strtolower(trim($argv[1]));
	$stats = array('moyenne', 'moyenne_user', 'ecart_moulinette');
	foreach($stats as $elem)
	{
		if ($input == $elem)
		{
			$fd = fopen('php://stdin', 'r');
			$stats = parse_csv($fd);
			if ($elem == 'moyenne')
				echo get_average($stats)."\n";
			else
			{
				$users_list = get_users_list($stats);
				$users = get_user_info($stats, $users_list);
				if ($elem == 'moyenne_user')
					foreach($users as $user)
						echo $user['User'].':'.$user['Mean']."\n";
				else
					foreach($users as $user)
						echo $user['User'].':'.$user['Deviation']."\n";
			}
		}
	}
}
?>
