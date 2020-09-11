<?php

/**
 * Person
 *
 * An example abstract person class
 */
abstract class AbstractPerson {
	/**
	 * @var string $surname The last name
	 */
	protected $surname;

	/**
	 * Constructor
	 *
	 * @param string $surname The person's surname
	 */
	public function __construct(string $surname) {
		$this->surname = $surname;
	}

	/**
	 * Get the person's title
	 *
	 * This method will be implemented by classes that extend this one
	 *
	 * @return string
	 */
	abstract protected function getTitle();

	/**
	 * Get the person's name
	 *
	 * @return string
	 */
	public function getNameAndTitle(): string {
		return $this->getTitle() . ' ' . $this->surname;
	}
}
