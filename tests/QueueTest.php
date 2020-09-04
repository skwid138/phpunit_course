<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {
	public function testNewQueueIsEmpty() {
		// Instantiate Queue class
		$queue = new Queue;

		// An empty queue should have 0 items
		$this->assertEquals(0, $queue->getCount());
	}

	public function testAnItemIsAddedToTheQueue() {
		// Instantiate Queue class
		$queue = new Queue;

		// Add Banjo to the queue
		$queue->push('Banjo');

		// Make sure the queue has the dog we added
		$this->assertEquals(1, $queue->getCount());
	}

	public function testAnItemIsRemovedFromTheQueue() {
		// Instantiate Queue class
		$queue = new Queue;

		// Add Banjo to the queue
		$queue->push('Banjo');

		// Remove Banjo from the queue
		$item = $queue->pop();

		// Make sure the queue is empty
		$this->assertEquals(0, $queue->getCount());

		// Make sure Banjo is still Banjo
		$this->assertEquals('Banjo', $item);
	}
}
