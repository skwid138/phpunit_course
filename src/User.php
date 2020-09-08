<?php

/**
 * User
 *
 * A user of the system
 */
class User {

	/**
	 * @var null|string $first_name First name
	 */
	public /*?string*/ $first_name; // PHPUnit will throw an error when trying to access a typed class property before it's been set/initialized

	/**
	 * @var null|string $surname Last name
	 */
	public /*?string*/ $surname;

	/**
	 * @var null|string $email Email address
	 */
	public ?string $email;

	/**
	 * @var null|Mailer $mailer Mailer class object
	 */
	protected ?Mailer $mailer;

	/**
	 * Set the mailer dependency
	 *
	 * This is called dependency injection and allows us to pass in the real
	 * Mailer class for production as well as a mock Mailer class when testing
	 *
	 *
	 * This could also be handled in the constructor
	 *
	 * @param Mailer $mailer The Mailer object
	 */
	public function setMailer(Mailer $mailer): void {
		$this->mailer = $mailer;
	}

	/**
	 * Get the user's full name from their first name and surname
	 *
	 * @return string The user's full name
	 */
	public function getFullName(): string {
		// Concat first and sirname's
		$full_name = "{$this->first_name} {$this->surname}";
		// Remove white-space, make sure if no values set that an empty string is returned rather than a string with a single space
		return trim($full_name);
	}

	/**
	 * Send the user a message
	 * This is an example of making one class dependent on another
	 *
	 * @param string $message The message
	 *
	 * @return boolean True if sent, false otherwise
	 */
	public function notify(string $message): bool {
		// Use the Mailer class to send a message
		return $this->mailer->sendMessage($this->email, $message);
	}
}
