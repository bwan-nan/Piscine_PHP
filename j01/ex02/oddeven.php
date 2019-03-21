#!/usr/bin/php
<?php
while (1)
{
	print("Enter a number: ");

	$input = trim(fgets(STDIN));
	if (feof(STDIN))
	{
		echo "\n";
		exit (0);
	}
	if (!is_numeric($input))
		print("'$input' is not a number\n");
	else if ($input % 2)
		print("The number is odd\n");
	else
		print("The number is even\n");
}
?>
