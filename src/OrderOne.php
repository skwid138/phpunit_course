<?php

/**
 * Order
 *
 * An example order class
 */
class OrderOne {
	/**
	 * @var int $amount The value of the order
	 */
	public $amount = 0;

	/**
	 * @var PaymentGateway Payment gateway dependency
	 */
	protected $gateway;

	/**
	 * Constructor
	 *
	 * @param PaymentGateway $gateway Payment gateway object
	 *
	 * @return void
	 */
	public function __construct(PaymentGateway $gateway) {
		// Set gateway property
		$this->gateway = $gateway;
	}

	/**
	 * Process the order
	 *
	 * @return boolean
	 */
	public function process(): bool {
		return $this->gateway->charge($this->amount);
	}
}
