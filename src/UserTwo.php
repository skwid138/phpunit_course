<?php

/**
 * User
 *
 * An example user class
 */
class UserTwo {

	/**
	 * @var null|string $email Email address
	 */
	public /*?string*/ $email;

	/**
	 * @var null|Mailer $mailer Mailer class object
	 */
	protected ?Mailer $mailer;

	/**
	 * @var callable $mailer_callable Mailer callable
	 */
	protected $mailer_callable;


	/**
	 * Constructor
	 *
	 * @param string $email The user's email
	 *
	 * @return void
	 */
	public function __construct(string $email) {
		$this->email = $email;
	}

	/**
	 * Mailer callable setter
	 *
	 * @param callable $mailer_callable A Mailer callable
	 *
	 * @return void
	 */
	public function setMailerCallable(callable $mailer_callable) {
		$this->mailer_callable = $mailer_callable;
	}

	/**
	 * Send the user a message
	 *
	 * @param string $message The message
	 *
	 * @return boolean
	 */
	public function notification(string $message) {
		// Pass in a function followed by any arguments it should receive
		return call_user_func($this->mailer_callable, $this->email, $message);
	}

	/**
	 * Mailer setter
	 *
	 * @param Mailer $mailer A Mailer object
	 *
	 * @return void
	 */
	public function setMailer(Mailer $mailer): void {
		$this->mailer = $mailer;
	}

	/**
	 * Send the user a message
	 *
	 * @param string $message The message
	 *
	 * @return boolean
	 */
	public function notify(string $message): bool {
		// Commented out the static keyword in the mailer class
		//return $this->mailer::send($this->email, $message);
		return $this->mailer->send($this->email, $message);
	}
}
