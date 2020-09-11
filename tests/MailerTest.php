<?php

use PHPUnit\Framework\TestCase;

/**
 * Class MailerTest
 *
 * Testing a static method
 */
class MailerTest extends TestCase {
	public function testSendMessageReturnsTrue() {
		// Call the static method inside of the assertion
		//$this->assertTrue(Mailer::send('banjo@woof.com', 'Howdy!'));

		// The static keyword has been commented in the Mailer class
		// Create a mock object of the Mailer class
		$mailer = $this->createMock(Mailer::class);

		// Configure the stub
		$mailer->expects($this->once())
			->method('send')
			->willReturn(true);

		$this->assertTrue($mailer->send('banjo@woof.com', 'Howdy!'));
	}

	public function testInvalidArgumentExceptionIfEmailIsEmpty() {
		$this->expectException(InvalidArgumentException::class);

		//Mailer::send('', '');

		// The static keyword has been commented in the Mailer class
		// Create a mock object of the Mailer class
		$mailer = $this->createMock(Mailer::class);

		// Configure the stub
		$mailer->expects($this->once())
			->method('send')
			->will($this->throwException(new InvalidArgumentException));

		$mailer->send('', '');
	}
}
