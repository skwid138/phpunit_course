<?php

/**
 * Mailer
 *
 * An example mailer class
 */
class MailerTwo {

	/**
	 * Send a message
	 *
	 * @param string $email Recipient email address
	 * @param string $message Content of the message
	 *
	 * @return boolean
	 * @throws InvalidArgumentException If $email is empty
	 *
	 */
	public static function send(string $email, string $message) {
		if (empty($email)) {
			throw new InvalidArgumentException;
		}

		echo "Send '$message' to $email";

		return true;
	}
}
