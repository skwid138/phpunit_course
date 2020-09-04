<?php

use PHPUnit\Framework\TestCase;

// TODO: The test class file and class name should match and be named to show what they are testing (name after a class etc.)
class FunctionTest extends TestCase {
	// TODO: Make the name as verbose as possible essentially using the name as a form of documentation
	public function testAddReturnsTheCorrectSum() {

		// Import code to be tested
		require 'functions.php';

		// TODO: If it makes sense, you may have 1 or several assertions in each test
		// Assert what results are expected from the code being tested
		$this->assertEquals(4, add(2, 2));
		$this->assertEquals(8, add(3, 5));
	}
}
