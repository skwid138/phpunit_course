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
}
