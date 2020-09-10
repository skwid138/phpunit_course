<?php

use PHPUnit\Framework\TestCase;

class WeatherMonitorTest extends TestCase {
	/**
	 * Required Mockery method
	 */
	public function tearDown(): void {
		Mockery::close();
	}

	/**
	 * PHPUnit version of test w/ mock
	 */
	public function testCorrectAverageIsReturned() {
		// Create mock object of TemperatureService class
		$service = $this->createMock(TemperatureService::class);

		// Map the times and return values to be used by mocked class
		$map = [
			// Each call will be in a nested array with the arguments first followed by the return value
			['12:00', 20],
			['14:00', 26],
		];

		// PHPUnit *WILL* count the stub configuration as an assertion
		// when using PHPUnit to create the mock and stub

		// Configure stub
		// How many times should the stub be called
		$service->expects($this->exactly(2))
			// What is the name of the stub
			->method('getTemperature')
			// What arguments and return values will the stubs use
			->will($this->returnValueMap($map));

		// Instantiate Weather Monitor class and pass in the mocked TemperatureService object
		$weather = new WeatherMonitor($service);

		// Assert that the average of 20 and 26 is 23 when passed in 12pm and 2pm
		$this->assertEquals(23, $weather->getAverageTemperature('12:00', '14:00'));
	}

	/**
	 * Mockery version of test w/ mock
	 */
	public function testCorrectAverageIsReturnedWithMockery() {
		// Create mock object of TemperatureService class
		$service = Mockery::mock(TemperatureService::class);

		// PHPUnit *WILL NOT* count the stub configuration as an assertion
		// when using Mockery to create the mock and stub

		// Configure what the stub name
		$service->shouldReceive('getTemperature')
			// How many times the stub will run
			->once()
			// What arguments the stub will be passed
			->with('12:00')
			// What value the stub will return
			->andReturn(20);

		// Configure the stub for the second call
		$service->shouldReceive('getTemperature')->once()->with('14:00')->andReturn(26);

		// Instantiate Weather Monitor class and pass in the mocked TemperatureService object
		$weather = new WeatherMonitor($service);

		// Assert that the average of 20 and 26 is 23 when passed in 12pm and 2pm
		$this->assertEquals(23, $weather->getAverageTemperature('12:00', '14:00'));
	}
}
