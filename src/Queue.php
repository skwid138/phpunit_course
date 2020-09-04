<?php

/**
 * Queue
 *
 * A first-in, first-out data structure
 */
class Queue {

	/**
	 * @var integer Maximum number of items that may be added to the queue
	 */
	public const MAX_ITEMS = 5;

	/**
	 * @var array List of queue items
	 */
	protected $items = [];

	/**
	 * Add an item to the end of the queue
	 *
	 * @param mixed $item The item
	 *
	 * @throws QueueException if the number of items on the queue exceeds
	 *                        the MAX_ITEMS value
	 */
	public function push($item) {
		if ($this->getCount() == static::MAX_ITEMS) {

			throw new QueueException('Queue is full');
		}

		$this->items[] = $item;
	}

	/**
	 * Take an item off the head of the queue
	 *
	 * @return mixed The item
	 */
	public function pop() {
		return array_shift($this->items);
	}

	/**
	 * Get the total number of items in the queue
	 *
	 * @return integer The number of items
	 */
	public function getCount(): int {
		return count($this->items);
	}

	/**
	 * Empty the queue
	 *
	 * @return void
	 */
	public function clear(): void {
		$this->items = [];
	}
}
