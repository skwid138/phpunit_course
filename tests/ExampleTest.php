<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

// Extending MockeryTestCase is one way to use Mockery, the other is to add a tearDown method (see OrderOneTest.php)

class ExampleTest extends MockeryTestCase {
	public function testAddingTwoPlusTwoResultsFour() {
		$this->assertEquals(4, 2 + 2);
	}
}
