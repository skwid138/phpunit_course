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

	/**
	 * Testing private methods that accept arguments
	 *
	 * Private methods should almost always be excluded from testing
	 * They can be tested indirectly by the public methods that call them
	 * If this is difficult to achieve then the class may need to be refactored or even be split into another class
	 *
	 * @throws ReflectionException
	 */
	public function testPrefixedTokenStartsWithPrefix() {
		// Instantiate the Item class
		$item = new Item;

		// Recreate the Item class by reflection
		$reflector = new ReflectionClass(Item::class);

		// Get the private method
		$method = $reflector->getMethod('getPrefixedToken');
		// Make the private method accessible
		$method->setAccessible(true);

		// Call the method and pass in the arguments needed
		// To pass arguments is the invokeArgs() method instead of invoke()
		// Similar to without arguments the Item class object is passed,
		// but this time an array of arguments is included as well
		$result = $method->invokeArgs($item, ['example']);

		// Assert the value returned will start with the prefix passed to the method
		$this->assertStringStartsWith('example', $result);
	}
}
