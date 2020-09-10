<?php

/**
 * Order
 *
 * An example order class
 */
class Order {
	/**
	 * @var int $quantity The number of items
	 */
	public $quantity;

	/**
	 * @var float $unit_price The individual value of an item
	 */
	public $unit_price;

	/**
	 * @var float $amount The total value of the order
	 */
	public $amount;

	/**
	 * Constructor
	 *
	 * @param int $quantity The number of items
	 * @param float $unit_price The individual value of an item
	 *
	 * @return void
	 */
	public function __construct(int $quantity, float $unit_price) {
		$this->quantity = $quantity;
		$this->unit_price = $unit_price;

		$this->amount = $quantity * $unit_price;
	}

	/**
	 * Charge the total amount
	 *
	 * @param PaymentGateway $gateway Payment gateway object
	 *
	 * @return void
	 */
	public function process(PaymentGateway $gateway) {
		$gateway->charge($this->amount);
	}
}
