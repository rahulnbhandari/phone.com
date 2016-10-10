<?php

interface Shape {
    public function area();
    public function perimeter();
    public function scale($scale);
}

class Parallelogram implements Shape {
	protected $side1,$side2,$angle;

	public function __construct($side1,$side2,$angle) {
		$this->side1 = $side1;
		$this->side2 = $side2;
		$this->angle = $angle;
	}

	public function perimeter() {
		return 2*($this->side1+$this->side2);
	}

	public function area() {
		return $this->side1*abs(sin(deg2rad($this->angle)))*$this->side2;
	}

	public function scale($scale) {
		if($scale < 0 || !is_numeric($scale)) {
			throw new Exception ("Inavlid scale param");
		}
		$this->side1 = $this->side1*$scale;
		$this->side2 = $this->side2*$scale;


	}
}

class Rectangle extends Parallelogram {
	const RIGHT_ANGLE = 90;

	public function __construct($width,$height) {
		$this->side1 = $width;
		$this->side2 = $height;
		$this->angle = self::RIGHT_ANGLE;
	}
}

class Square extends Parallelogram {
	const RIGHT_ANGLE = 90;
	public function __construct($side) {
		$this->side1 = $side;
		$this->side2 = $side;
		$this->angle = self::RIGHT_ANGLE;
	}
}



class Circle implements Shape {
	protected $radius;

	public function __construct($radius) {
		if(is_numeric($radius)) {
			$this->radius = $radius;
		} else {
			throw new Exception ("Invalid parameter for radius ".$this->radius);
		}
		
	}

	public function perimeter() {
		return 2*pi()*$this->radius;
	}

	public function area() {
		return pi()*$this->radius*$this->radius;
	}

	public function scale($scale) {
		if($scale < 0 || !is_numeric($scale)) {
			throw new Exception ("Inavlid scale param");
		}
		$this->radius = $this->radius*$scale;
	}


}

class Triangle implements Shape {
	protected $a,$b,$c;

	public function __construct($a,$b,$c) {

		if(!(is_numeric($a) && is_numeric($b) && is_numeric($c))) {
			throw new Exception("Inavlid param for sides of the triangle");
		}

		$this->a = $a;
		$this->b = $b;
		$this->c = $c;
	}

	public function perimeter() {
		return $this->a+$this->b+$this->c;
	}

	public function area() {
		$s = $this->perimeter()/2;
		return sqrt($s*($s-$this->a)*($s-$this->b)*($s-$this->c));
	}

	public function scale($scale) {
		if($scale < 0 || !is_numeric($scale)) {
			throw new Exception ("Inavlid scale param");
		}
		$this->a = $this->a*$scale;
		$this->b = $this->b*$scale;
		$this->c = $this->c*$scale;
	}
}

class RightTriangle extends Triangle {
	public function __construct($a,$b) {

		if(!(is_numeric($a) && is_numeric($b) )) {
			throw new Exception("Inavlid param for sides of the triangle");
		}
		$this->a = $a;
		$this->b = $b;
		$this->c = sqrt($this->a*$this->a + $this->b*$this->b);

	}
}

class EquilateralTraingle extends Triangle {
	public function __construct($a) {
		if(!(is_numeric($a))) {
			throw new Exception("Inavlid param for sides of the triangle");
		}
		$this->a = $a;
		$this->b = $b;
		$this->c = $c;
	}
}

?>
