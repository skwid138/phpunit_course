<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {
	/**
	 * @var Queue
	 */
	protected $queue;

	/**
	 * This method runs before all tests
	 */
	protected function setUp(): void {
		$this->queue = new Queue;
	}

	/**
	 * This method runs after all tests have been completed
	 *
	 * In practice this is almost never used unless there are
	 * a lot of objects being created and sitting in memory
	 *
	 * This method is useful if you're creating external resources
	 * like writing to a file or opening a network socket
	 */
	protected function tearDown(): void {
		unset($this->queue);
	}

	/**
	 *
	 */
	public function testNewQueueIsEmpty() {
		// An empty queue should have 0 items
		$this->assertEquals(0, $this->queue->getCount());
	}

	/**
	 *
	 */
	public function testAnItemIsAddedToTheQueue() {
		// Add Banjo to the queue
		$this->queue->push('Banjo');

		// Make sure the queue has the dog we added
		$this->assertEquals(1, $this->queue->getCount());
	}

	/**
	 *
	 */
	public function testAnItemIsRemovedFromTheQueue() {

		// Add Banjo to the queue
		$this->queue->push('Banjo');

		// Remove Banjo from the queue
		$item = $this->queue->pop();

		// Make sure the queue is empty
		$this->assertEquals(0, $this->queue->getCount());

		// Make sure Banjo is still Banjo
		$this->assertEquals('Banjo', $item);
	}
}
