<?php
Class Targaryen {
	public function getBurned() {
		if (method_exists($this, 'resistsFire'))
			if ($this->resistsFire() == True)
				return 'emerges naked but unharmed';
		return 'burns alive';
	}
}
?>
