<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
	public function testReturnsFullName() {
		// Instantiate User class
		$user = new User;

		// Set the name values of the User class
		$user->first_name = 'Alvin';
		$user->surname = 'Kamara';

		// Test that the name returned matches
		$this->assertEquals('Alvin Kamara', $user->getFullName());
	}

	public function testFullNameIsEmptyByDefault() {
		// Instantiate User class
		$user = new User;

		// Test what happens when no values are assigned
		$this->assertEquals('', $user->getFullName());
	}

	/**
	 * With the doc block have "@test" PHPUnit knows this is a test method
	 * If a method does not have a doc block with "@test" and the function isn't prefaced with test PHPUnit will not know to run it
	 * @test
	 */
	public function user_has_first_name() {
		// Instantiate User class
		$user = new User;

		// Set User's first name
		$user->first_name = 'Alvin';

		// Test if first name matches
		$this->assertEquals('Alvin', $user->first_name);
	}

	/**
	 * Test making the user
	 */
	public function testNotificationIsSent() {
		// Instantiate the User class
		$user = new User;

		// Create mock of the Mailer class
		$mock_mailer = $this->createMock(Mailer::class);

		// Setup exactly what the expected behavior with the mock should be
		// The stub should only be run once
		$mock_mailer->expects($this->once())
			// The stub to be run is sendMessage
			->method('sendMessage')
			// The arguments being passed should be these
			->with($this->equalTo('banjo@woof.com'), $this->equalTo('Howdy'))
			// The stub should return true
			->willReturn(true);

		// Pass the mock Mailer class to the User class so it can be injected into the User class
		$user->setMailer($mock_mailer);
		// The setMailer method is typed to only take arguments of the Mailer class type
		// using a mocked class still achieves this... tricky

		// Set the User class's email property
		$user->email = 'banjo@woof.com';

		// Assert the return value of the User class's notify method
		// (which is a wrapper of the Mailer class's sendMessage method)
		$this->assertTrue($user->notify('Howdy'));
	}
}
