<?php

use PHPUnit\Framework\TestCase;

class UserTwoTest extends TestCase {
	public function testNotifyReturnsTrue() {
		// Instantiate the class and pass in the required args
		$user = new UserTwo('banjo@woof.com');

		// Create a mock object of the Mailer class
//		$mailer = $this->createMock(Mailer::class);

		// PHPUnit does NOT stub static methods using PHPUnit so calling them will throw a warning

		// Configure the stub
//		$mailer->expects($this->once())
//			->method('send')
//			->willReturn(true);

		// As the send method is now static (again) this needs to happen for the tests to pass
		$mailer = new Mailer();

		// Pass the mock to the UserTwo class
		$user->setMailer($mailer);

		// Assert that the notify method returns true
		$this->assertTrue($user->notify('Howdy!'));
	}

	public function testNotificationReturnsTrue() {
		// Instantiate the class and pass in the required args
		$user = new UserTwo('banjo@woof.com');

		// Set the function to be used as the mailer
		$user->setMailerCallable(function() {
			// Output mocked for the test
			echo "mocked";
			return true;
		});

		$this->assertTrue($user->notification('Howdy!'));
	}
}