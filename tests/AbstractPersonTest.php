<?php

use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase {

	/**
	 * Test child class that uses an abstract class
	 */
	public function testNameAndTitleIsReturned() {
		// Instantiate the Doctor class and pass the surname argument
		$doctor = new Doctor('Rancourt');

		// Assert the name and title will match
		$this->assertEquals('Dr. Rancourt', $doctor->getNameAndTitle());
	}

	/**
	 * Testing abstract classes
	 */
	public function testNameAndTitleIncludesValueFromGetTitle() {

		// getMockForAbstractClass() can be used to create the mock,
		// but takes seven arguments and is not recommended
		// Instead getMockForAbstractClass() can be called after using getMockBuilder()

		// Create a mock object for the abstract class
		$mock = $this->getMockBuilder(AbstractPerson::class)
			// Pass a surname to the constructor
			->setConstructorArgs(['Rancourt'])
			// Tell PHPUnit this is an abstract class
			->getMockForAbstractClass();

		// When using getMockForAbstractClass() concrete methods are not stubbed,
		// but abstract methods are so for this instance only getTitle will be mocked


		// Stub the getTitle method
		$mock->method('getTitle')
			// Set the stub to return Dr.
			->willReturn('Dr.');

		// Assert that Hunter Rules
		$this->assertEquals('Dr. Rancourt', $mock->getNameAndTitle());
	}
}
