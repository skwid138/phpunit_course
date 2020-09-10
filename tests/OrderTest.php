<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {
	/**
	 * This is one way to use Mockery, the other is by extending the
	 * MockeryTestCase class instead of PHPUnit's TestCase class (see ExampleTest.php)
	 */
	public function tearDown(): void {
		Mockery::close();
	}

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

	/**
	 * A duplicated version of the testOrderIsProcessed test demonstrating
	 * how to use mockery instead of the PHPUnit mocks
	 */
	public function testOrderIsProcessedUsingMockery() {
		// The value of the test order
		$order_amount = 200;

		// Create a mock object for PaymentGateway
		$gateway = Mockery::mock('PaymentGateway');

		// Configure the charge stubb on the mocked PaymentGateway object
		$gateway->shouldReceive('charge')
			// The stubbed method should run only once
			->once()
			// The stubbed method should receive the order value passed to the order class
			->with($order_amount)
			// The value the stubbed method will return
			->andReturn(true);

		// Instantiate the Order class
		$order = new Order($gateway);

		// Set the order's amount
		$order->amount = $order_amount;

		// A successful call to order-process will return true
		$this->assertTrue($order->process());
	}
}
