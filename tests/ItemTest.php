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
	/*public function testIDisAnInteger() {
		$item = new Item;

		$this->assertIsInt($item->getID());
	}*/

	/**
	 * Using a child class attempt to make a private method public... this wont work
	 */
	/*public function testTokenIsAString() {
		$item = new ItemChild;

		$this->assertIsString($item->getToken());
	}*/

	/**
	 * How to test private methods
	 *
	 * This would also work for testing protected methods and
	 * avoid the need to use another class and inheritance
	 *
	 * @throws ReflectionException
	 */
	public function testTokenIsAString() {
		// Instantiate the Item class
		$item = new Item;

		// Recreate the Item class by reflection
		$reflector = new ReflectionClass(Item::class);

		// Get the private method
		$method = $reflector->getMethod('getToken');

		// Make the private method accessible
		$method->setAccessible(true);

		// Run the getToken method using the invoke method and passing the original class object
		$result = $method->invoke($item);

		// Assert the token is a string
		$this->assertIsString($result);
	}
}
