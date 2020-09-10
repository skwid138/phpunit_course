<?php

/**
 * This is a wrapper class to expose private and protected methods
 *
 * Only public and protected methods will be inherited by the child class
 * Private methods will not be part of the child
 *
 * This should not be an issue as you best practice is to only write tests for the public portion of your API
 */
class ItemChild extends Item {
	/**
	 * This class is protected in the parent class
	 *
	 * @return int
	 */
	public function getID() {
		return parent::getID();
	}

	/**
	 * This class is private in the parent class
	 *
	 * @return string
	 */
	public function getToken() {
		return parent::getToken();
	}
}
