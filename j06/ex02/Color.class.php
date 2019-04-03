<?php

Class Color {
	public			$red;
	public			$green;
	public			$blue;
	public static	$verbose = False;

	public function			__construct(array $color) {
		if (array_key_exists('red', $color)
		&& array_key_exists('green', $color)
		&& array_key_exists('blue', $color)) {
			$this->red = intval($color['red']);
			$this->green = intval($color['green']);
			$this->blue = intval($color['blue']);
		}
		else if (array_key_exists('rgb', $color)) {
			$rgb = sprintf('%06X', intval($color['rgb']));
			$this->red = hexdec(substr($rgb, 0, 2));
			$this->green = hexdec(substr($rgb, 2, 2));
			$this->blue = hexdec(substr($rgb, 4, 2));
		}
		if (Self::$verbose)
			printf('Color( red: %3d, green: %3d, blue: %3d ) constructed.' . PHP_EOL,
				$this->red,
				$this->green,
				$this->blue
			);
		return ;
	}

	public function			__destruct() {
		if (self::$verbose == True)
			printf(
				'Color( red: %3d, green: %3d, blue: %3d ) destructed.' . PHP_EOL,
				$this->red,
				$this->green,
				$this->blue
			);
		return ;
	}

	public function			__toString() {
		return (vsprintf(
			'Color( red: %3d, green: %3d, blue: %3d )',
			array($this->red, $this->green, $this->blue)));
	}

	public function			add($Color) {
		return (new Color(array(
			'red' => $this->red + $Color->red,
			'green' => $this->green + $Color->green,
			'blue' => $this->blue + $Color->blue
		)));
	}

	public function			sub($Color) {
		return (new Color(array(
			'red' => $this->red - $Color->red,
			'green' => $this->green - $Color->green,
			'blue' => $this->blue - $Color->blue
		)));
	}

	public function			mult($mult) {
		return (new Color(array(
			'red' => $this->red * $mult,
			'green' => $this->green * $mult,
			'blue' => $this->blue * $mult
		)));
	}

	public static function doc() {
		$fd = fopen('Color.doc.txt', 'r');
		echo "\n";
		while ($line = fgets($fd))
			echo $line;
	}
}
?>
