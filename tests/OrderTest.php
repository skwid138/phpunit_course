<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {
	/**
	 * Required Mockery method
	 */
	public function tearDown(): void {
		Mockery::close();
	}

	public function testOrderIsProcessedUsingAMock() {
		// Instantiate the Order class and pass in the required arguments
		$order = new Order(3, 1.99);

		// Assert that the product of 3*199=5.97 will match the amount property of the Order object
		$this->assertEquals(5.97, $order->amount);

		// Create a mock object for PaymentGateway
		$gateway_mock = Mockery::mock('PaymentGateway');

		// Assert that the mocked object should have a charge method
		// PHPUnit *WILL NOT* count this as an assertion which is why the above Assertion
		// is included to avoid PHPUnit flagging this test as having no assertions
		$gateway_mock->shouldReceive('charge')
			// The method should run only once
			->once()
			// The method should receive the total amount which is the same as $order->amount
			->with(5.97);

		// Run the process method, passing in the mock PaymentGateway object
		$order->process($gateway_mock);
	}

	public function testOrderIsProcessedUsingASpy() {
		// Instantiate the Order class and pass in the required arguments
		$order = new Order(3, 1.99);

		// Assert that the product of 3*199=5.97 will match the amount property of the Order object
		$this->assertEquals(5.97, $order->amount);

		// A spy allows you to run assertions on code after it's already executed

		// Create a spy object for PaymentGateway
		$gateway_spy = Mockery::spy('PaymentGateway');

		// Run the process method, passing in the spy PaymentGateway object
		$order->process($gateway_spy);

		// Unlike with mock objects these assertions happen after the method was called
		// Sometimes this can be more clear or even require less code than a mock
		// A downside is that a return value can not be specified like it can with a mock

		// Assert that the spy object should have a charge method
		$gateway_spy->shouldHaveReceived('charge')
			// The method should run only once
			->once()
			// The method should receive the total amount which is the same as $order->amount
			->with(5.97);
	}
}
