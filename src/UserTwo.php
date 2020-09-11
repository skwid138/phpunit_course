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
