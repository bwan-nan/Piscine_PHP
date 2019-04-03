<?php

Class Tyrion {
	public function sleepWith($somebody) {
		if ($somebody instanceof Jaime || $somebody instanceof Cersei)
			echo "Not even if I'm drunk !" . PHP_EOL;
		else if ($somebody instanceof Sansa)
			echo "Let's do this." . PHP_EOL;
	}
}
?>
