<?php

/**
 * Product
 *
 * An example product class
 */
class Product {
	/**
	 * @var integer $product_id Unique identifier
	 */
	protected $product_id;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		$this->product_id = rand();
	}
}
