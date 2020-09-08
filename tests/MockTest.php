<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase {
	/**
	 *
	 */
	public function testMock() {

		// Create a mock version of the Mailer class
		$mock = $this->createMock(Mailer::class);
		// The $mock object will contain all the same methods,
		// but the methods will all return null

		// Methods on this mocked object are known as "stubs"

		// Change the default behavior of returning null to return true
		$mock->method('sendMessage')
			->willReturn(true);

		// Call the method to be tested with arguments
		$result = $mock->sendMessage('banjo@woof.com', 'Howdy');

		// Assert that the method has returned true
		$this->assertTrue($result);
	}
}
