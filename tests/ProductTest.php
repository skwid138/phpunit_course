<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase {
	public function testIDIsAnInteger() {
		// Instantiate the Product class
		$product = new Product;

		// Create a duplicate of the Product class
		$reflector = new ReflectionClass(Product::class);

		// Get the product_id property of the Product class
		$property = $reflector->getProperty('product_id');

		// Make the protected property accessible
		$property->setAccessible(true);

		// Get the actual value of the product_id property
		$value = $property->getValue($product);

		// Assert that the product_id property is a whole number
		$this->assertIsInt($value);
	}
}
