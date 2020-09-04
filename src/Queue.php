<?php

/**
 * Queue
 *
 * A first-in, first-out data structure
 */
class Queue {

	/**
	 * @var array List of queue items
	 */
	protected $items = [];

	/**
	 * Add an item to the end of the queue
	 *
	 * @param mixed $item The item
	 */
	public function push($item): void {
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
