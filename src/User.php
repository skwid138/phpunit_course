<?php

/**
 * User
 *
 * A user of the system
 */
class User {

	/**
	 * First name
	 * @var string
	 */
	public $first_name;

	/**
	 * Last name
	 * @var string
	 */
	public $surname;

	/**
	 * Get the user's full name from their first name and surname
	 *
	 * @return string The user's full name
	 */
	public function getFullName() {
		// Concat first and sirname's
		$full_name = "{$this->first_name} {$this->surname}";
		// Remove white-space, make sure if no values set that an empty string is returned rather than a string with a single space
		return trim($full_name);
	}
}
