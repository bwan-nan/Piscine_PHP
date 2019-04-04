<?php

Class UnholyFactory {
	private $_army = [];

	public function absorb($fighter) {
		if ($fighter instanceof Fighter) {
			if (array_key_exists($fighter->getFighterType(), $this->_army))
				echo "(Factory already absorbed a fighter of type ".$fighter->getFighterType().")\n";
			else {
				$this->_army[$fighter->getFighterType()] = $fighter;
				echo "(Factory absorbed a fighter of type ".$fighter->getFighterType().")\n";
			}
		}
		else
			echo "(Factory can't absorb this, it's not a fighter)\n";
	}

	public function fabricate($requested_type) {
		if (array_key_exists($requested_type, $this->_army)) {
			echo "(Factory fabricates a fighter of type $requested_type)\n";
			return (clone $this->_army[$requested_type]);
		}
		else
			echo "(Factory hasn't absorbed any fighter of type $requested_type)\n";
	}
}
?>
