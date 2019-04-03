<?php

require_once 'Color.class.php';

Class Vertex {
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1;
	private $_color;
	static	$verbose = False;

	public function			__construct(array $kwargs) {
		if (array_key_exists('x', $kwargs)
		&& array_key_exists('y', $kwargs)
		&& array_key_exists('z', $kwargs)) {
			$this->_x = $kwargs['x'];
			$this->_y = $kwargs['y'];
			$this->_z = $kwargs['z'];
			if (array_key_exists('w', $kwargs) && isset($kwargs['w']))
				$this->_y = $kwargs['w'];
			if (array_key_exists('color', $kwargs) && isset($kwargs['color']) && $kwargs['color'] instanceof Color)
				$this->_color = $kwargs['color'];
			else
				$this->_color = new Color( array('red' => 255, 'green' => 255, 'blue' => 255) );
			if (Self::$verbose == True)
				printf(
					"Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n",
					$this->_x, $this->_y, $this->_z, $this->_w,
					$this->_color->red, $this->_color->green, $this->_color->blue
				);
		}
		return ;
	}

	public function			__destruct() {
		if (Self::$verbose == True)
			return (printf(
				"Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n",
				$this->_x, $this->_y, $this->_z, $this->_w,
				$this->_color->red, $this->_color->green, $this->_color->blue
			));
		return ;
	}

	public function			__toString() {
		if (Self::$verbose == True)
			return (vsprintf(
				"Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )",
				array($this->_x, $this->_y, $this->_z, $this->_w,
				$this->_color->red, $this->_color->green, $this->_color->blue
			)));
		return (vsprintf(
			"Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )",
			array($this->_x, $this->_y, $this->_z, $this->_w
		)));
	}

	public function			getX() {
		return ($this->_x);
	}

	public function			getY() {
		return ($this->_y);
	}

	public function			getZ() {
		return ($this->_z);
	}

	public function			getW() {
		return ($this->_w);
	}

	public function			getColor() {
		return ($this->_color);
	}

	public function			setX($x) {
		$this->_x = $x;
	}

	public function			setY($y) {
		$this->_y = $y;
	}

	public function			setZ($z) {
		$this->_z = $z;
	}

	public function			setW($w) {
		$this->_w = $w;
	}

	public function			setColor($color) {
		$this->_color = $color;
	}

	public static function	doc() {
		$fd = fopen('Vertex.doc.txt', 'r');
		echo "\n";
		while ($line = fgets($fd))
			echo $line;
		echo "\n";
	}
}
?>
