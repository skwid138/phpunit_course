<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
	public function testReturnsFullName() {

		// Import User class
		require 'User.php';

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
}
