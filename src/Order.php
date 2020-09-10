<?php

/**
 * Order
 *
 * An example order class
 */
class Order {

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
	 * @return void
	 */
	public function __construct(PaymentGateway $gateway) {
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
