<?php

/**
 * Mailer
 *
 * Send messages
 */
class Mailer {
	/**
	 * Send a message
	 *
	 * @param string $email  Recipient email address
	 * @param string $message  Content of the message
	 *
	 * @throws InvalidArgumentException If $email is empty
	 *
	 * @return boolean
	 */
	public static function send(string $email, string $message) {
		if (empty($email)) {
			throw new InvalidArgumentException;
		}

		echo "Send '$message' to $email";

		return true;
	}

	/**
	 * Send a message
	 *
	 * @param string $email The email address
	 * @param string $message The message
	 *
	 * @return boolean True if sent, false otherwise
	 * @throws Exception
	 */
	public function sendMessage(/*string*/ $email, string $message): bool {

		// If the email argument is empty throw an exception
		if (empty($email)) {
			throw new Exception;
		}

		// Use mail() or PHPMailer for example
		// Delay execution 3 seconds to simulate actual work being done
		sleep(3);

		// Output the message (to the terminal during testing)
		echo("Send: '$message' to '$email'");

		return true;
	}
}
