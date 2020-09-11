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
			// Stub methods have no contents and return null be default so this one should return true to mimic the actual behavior
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

	public function testCannotNotifyUserWithNoEmail() {
		// Instantiate the User class
		$user = new User;

		// As mocked classes create stubs of methods that do not contain the actual method contents
		// things like throwing exceptions will not occur unless you explicitly define it
		//$mock_mailer = $this->createMock(Mailer::class);
		//$mock_mailer->method('sendMessage')->will($this->throwException(new Exception));
		// Doing this essentially recreates the original method and is unnecessary as the original method already exists...

		// Setup exactly what the expected behavior with the mock should be
		//$mock_mailer = $this->getMockBuilder(Mailer::class)
			 // Passing null means none of the original methods will be stubbed, so the original code will run
			//->setMethods(null) // Can also pass an array of method names to be stubbed
			//->getMock();

	// ** NOT PART OF THE LESSON **
		// PHPUnit has deprecated the setMethods method, below are several alternative ways to solve the problem

		// Using this wrapper for getMockBuilder()->setMethods() as of PHPUnit 9.3.8 anyway
		// Passing an empty array will preserve all the original methods
		// It seems you can pass method names in the array that you would like to be stubbed
		// The test will fail if no argument is passed as well as if null is passed in place of an empty array
		$mock_mailer = $this->createPartialMock(Mailer::class, []);


		// This allows the original methods to be called off the mocked object
		// This approach seems to essentially allow all original methods to be accessed
		// The enableProxyingToOriginalMethods method does not accept any arguments
		$mock_mailer = $this->getMockBuilder(Mailer::class)
			->enableProxyingToOriginalMethods()
			->getMock();

		// This approach seems to be the most similar to the way the Udemy course was doing things
		// and is very similar to using the createPartialMock wrapper method
		// onlyMethods accepts an array of method names to be stubbed, it will otherwise use the original method logic
		// Passing an empty array seems to allow all methods to be accessed from the mocked object
		// onlyMethods must be pass an array as an argument otherwise it will throw an error
		$mock_mailer = $this->getMockBuilder(Mailer::class)
			->onlyMethods([])
			->getMock();

		// I also found this method setMethodsExcept, but did not try it


	// ** NOT PART OF THE LESSON **

		// Pass the mock Mailer class to the User class so it can be injected into the User class
		$user->setMailer($mock_mailer);

		// We should get an exception as no email argument was passed
		$this->expectException(Exception::class);

		// Call the user notify method
		$user->notify('Howdy');
	}
}
