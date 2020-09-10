<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase {
	/**
	 * Attempt to access a public method
	 */
	public function testDescriptionIsNotEmpty() {
		$item = new Item;

		$this->assertNotEmpty($item->getDescription());
	}

	/**
	 * Attempt to access a protected method... this wont work
	 */
	public function testIDisAnInteger() {
		$item = new Item;

		$this->assertIsInt($item->getID());
	}

	/**
	 * Using a child class attempt to make a private method public... this wont work
	 */
	public function testTokenIsAString() {
		$item = new ItemChild;

		$this->assertIsString($item->getToken());
	}
}
