<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {
	/**
	 * @var Queue
	 */
	//protected static $queue;
	protected $queue;

	/**
	 * This method runs before every tests
	 */
	protected function setUp(): void {
		// Empty the queue after each test has run
		//static::$queue->clear();

		// Instantiate the Queue class before each test runs
		$this->queue = new Queue;
	}

	/**
	 * This method is run before the first test of the class is run
	 * which allows state to persist through multiple method calls
	 */
	public static function setUpBeforeClass(): void {
		//static::$queue = new Queue;
	}

	/**
	 * This method is run after the last test of the class is run
	 */
	public static function tearDownAfterClass(): void {
		//static::$queue = null;
	}

	/**
	 * This method runs after every test
	 *
	 * In practice this is almost never used unless there are
	 * a lot of objects being created and sitting in memory
	 *
	 * This method is useful if you're creating external resources
	 * like writing to a file or opening a network socket
	 */
	protected function tearDown(): void {
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

	/**
	 *
	 */
	public function testAnItemIsRemovedFromTheFrontOfTheQueue() {
		$this->queue->push('Banjo');
		$this->queue->push('Gonzo');

		// The pop method should return the first item added to the queue
		$this->assertEquals('Banjo', $this->queue->pop());
	}

	/**
	 *
	 */
	public function testMaxNumberOfItemsCanBeAdded() {

		for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {

			// Add items to the queue until we reach the maximum number of items allowed
			$this->queue->push($i);
		}

		// Make sure the number of items in the queue does not exceed the maximum allowed items
		$this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
	}

	/**
	 *
	 */
	public function testExceptionThrownWhenAddingAnItemToAFullQueue() {
		// Fill the queue to it's maximum allowed number of items
		for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {

			// Add items to the queue until we reach the maximum number of items allowed
			$this->queue->push($i);
		}

		// Before an exception is actually thrown tell PHPUnit to expect it
		// so execution is not prevented by the exception
		// (essentially tell it to catch the exception)
		$this->expectException(QueueException::class);

		// Make sure the exception we're expecting is the correct exception that was thrown
		$this->expectExceptionMessage('Queue is full');

		// Add one more item to the queue so it exceeds the maximum allowed number
		// This should cause an exception to be thrown
		$this->queue->push('Nebuchadnezzar');
	}
}
