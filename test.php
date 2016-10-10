<?php

	require_once("shape.php");

	$rectangle = new Rectangle(10,5);
	$square = new Square(10);
	$circle = new Circle(5);
	$parallelogram = new parallelogram(10,5,30);
	$rightTriangle = new RightTriangle(3,4);
	
	//test case 1
	$testcase[] = $rectangle->area() == 50 ? "case 1 passed" :"case 1 failed";
	$testcase[] = $rectangle->perimeter() == 30 ? "case 2 passed" :"case 2 failed";
	$testcase[] = $square->area() == 100? "case 3 passed" : "case 3 failed";
	$testcase[] = $square->perimeter() == 40? "case 4 passed" : "case 4 failed";
	$testcase[] = $circle->area() == pi()*5*5? "case 5 passed" : "case 5 failed";
	$testcase[] = $circle->perimeter() == pi()*2*5? "case 6 passed" : "case 6 failed";
	$testcase[] = (string)$parallelogram->area() == '25'? "case 7 passed" : "case 7 failed";
	$testcase[] = $parallelogram->perimeter() == 30? "case 8 passed" : "case 8 failed";
	$testcase[] = $rightTriangle->perimeter() == 12? "case 9 passed" : "case 9 failed";
	$testcase[] = $rightTriangle->area() == 6? "case 9 passed" : "case 9 failed";
	 
 
	print_r($testcase);

	
	
?>
