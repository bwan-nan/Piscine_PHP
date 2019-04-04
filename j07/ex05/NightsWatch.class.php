<?php

Class NightsWatch implements IFighter {
	private $solider = [];

	public function recruit($soldier) {
		$this->soldier[] = $soldier;
	}

	function fight() {
		foreach ($this->soldier as $soldier)
			if (method_exists(get_class($soldier), 'fight'))
				$soldier->fight();
	}
}
?>
