<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {
	public function testOrderIsProcessed() {
		// The value of the test order
		$order_amount = 200;

		// Mocking a class that doesn't exist
		// You CANNOT use createMock() to stub a class that doesn't exist
		// Instead you must use getMockBuilder()

		// Create a mock for the PaymentGateway class that doesn't exist
		$gateway = $this->getMockBuilder('PaymentGateway')
			// As the class doesn't exist it also has no methods to be stubbed,
			// so we must pass in the method name(s) to be stubbed

			// This way has been deprecated, but due to a bug or lack of features
			// (ReflectionClass throws an error) addMethods cannot be used with classes that do not exist
			->setMethods(['charge'])

			// Updated for use with PHPUnit 9 and above, but only works for classes
			// that actually exist due to ReflectionClass() throwing an error
			//->addMethods(['charge'])

			->getMock();

		// Configure the charge method
		// Only run the method once
		$gateway->expects($this->once())
			->method('charge')
			// Make sure the argument passed in matches what is given to the order class
			->with($this->equalTo($order_amount))
			// Update the stub to return true instead of null
			->willReturn(true);

		// Instantiate the Order class
		$order = new Order($gateway);

		// Set the order's amount
		$order->amount = $order_amount;

		// A successful call to order-process will return true
		$this->assertTrue($order->process());
	}
}
