<?php

use PHPUnit\Framework\TestCase;

class UserTwoTest extends TestCase {
	public function testNotifyReturnsTrue() {
		// Instantiate the class and pass in the required args
		$user = new UserTwo('banjo@woof.com');

		// Create a mock object of the Mailer class
		$mailer = $this->createMock(Mailer::class);

		// PHPUnit does NOT stub static methods using PHPUnit so this will fail


		// Pass the mock to the UserTwo class
		$user->setMailer($mailer);

		// Assert that the notify method returns true
		$this->assertTrue($user->notify('Howdy!'));
	}
}