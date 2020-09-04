<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {
	/**
	 * Because this test method is returning data
	 * to be used by another test method it is known as a producer
	 *
	 * @return Queue This should be an empty Queue object
	 */
	public function testNewQueueIsEmpty() {
		// Instantiate Queue class
		$queue = new Queue;

		// An empty queue should have 0 items
		$this->assertEquals(0, $queue->getCount());

		return $queue;
	}

	/**
	 * By adding "@depends" to the doc block the return of the method mentioned
	 * will be passed as an argument to this method
	 * This can be useful to reduce duplicated code
	 * 
	 * This test is now known as a consumer as it takes data in from a previous test
	 * @depends testNewQueueIsEmpty
	 *
	 * @param Queue $queue This should be an empty Queue object
	 *
	 * @return Queue This should be a Queue object with exactly one Banjo inside
	 */
	public function testAnItemIsAddedToTheQueue(Queue $queue) {
		// Add Banjo to the queue
		$queue->push('Banjo');

		// Make sure the queue has the dog we added
		$this->assertEquals(1, $queue->getCount());

		return $queue;
	}

	/**
	 * @depends testAnItemIsAddedToTheQueue
	 *
	 * @param Queue $queue This should be a Queue object with exactly one Banjo inside
	 */
	public function testAnItemIsRemovedFromTheQueue(Queue $queue) {
		// Remove Banjo from the queue
		$item = $queue->pop();

		// Make sure the queue is empty
		$this->assertEquals(0, $queue->getCount());

		// Make sure Banjo is still Banjo
		$this->assertEquals('Banjo', $item);
	}
}
