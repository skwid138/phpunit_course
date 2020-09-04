<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {
	/**
	 * @var Queue
	 */
	protected static $queue;

	/**
	 * This method runs before every tests
	 */
	protected function setUp(): void {
		// Empty the queue after each test has run
		static::$queue->clear();
	}

	/**
	 * This method is run before the first test of the class is run
	 * which allows state to persist through multiple method calls
	 */
	public static function setUpBeforeClass(): void {
		static::$queue = new Queue;
	}

	/**
	 * This method is run after the last test of the class is run
	 */
	public static function tearDownAfterClass(): void {
		static::$queue = null;
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
		$this->assertEquals(0, static::$queue->getCount());
	}

	/**
	 *
	 */
	public function testAnItemIsAddedToTheQueue() {
		// Add Banjo to the queue
		static::$queue->push('Banjo');

		// Make sure the queue has the dog we added
		$this->assertEquals(1, static::$queue->getCount());
	}

	/**
	 *
	 */
	public function testAnItemIsRemovedFromTheQueue() {

		// Add Banjo to the queue
		static::$queue->push('Banjo');

		// Remove Banjo from the queue
		$item = static::$queue->pop();

		// Make sure the queue is empty
		$this->assertEquals(0, static::$queue->getCount());

		// Make sure Banjo is still Banjo
		$this->assertEquals('Banjo', $item);
	}

	/**
	 *
	 */
	public function testAnItemIsRemovedFromTheFrontOfTheQueue() {
		static::$queue->push('Banjo');
		static::$queue->push('Gonzo');

		// The pop method should return the first item added to the queue
		$this->assertEquals('Banjo', static::$queue->pop());
	}
}
