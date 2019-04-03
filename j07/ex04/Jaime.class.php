<?php

Class Jaime {
	public function sleepWith($somebody) {
		if ($somebody instanceof Tyrion)
			echo "Not even if I'm drunk !" . PHP_EOL;
		else if ($somebdoy instanceof Sansa)
			echo "Let's do this." . PHP_EOL;
		else if ($somebody instanceof Cersei)
			echo "With pleassure, but only in a tower in Winterfell, then." . PHP_EOL;
	}
}
?>
