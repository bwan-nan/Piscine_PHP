<?php

abstract class Fighter {
	public $fighter;
	public function __construct($type) {
		$this->fighter = $type;
	}

	public function getFighterType() {
		return ($this->fighter);
	}

	abstract public function fight($target);
}

?>
