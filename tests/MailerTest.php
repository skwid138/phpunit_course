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
		$this->assertTrue(Mailer::send('banjo@woof.com', 'Howdy!'));
	}

	public function testInvalidArgumentExceptionIfEmailIsEmpty() {
		$this->expectException(InvalidArgumentException::class);

		Mailer::send('', '');
	}
}
