<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase {
	/**
	 * @var \App\Article $article Article class object
	 */
	protected $article;

	/**
	 * This method runs before EVERY test
	 */
	protected function setUp(): void {
		// Instantiate the Article class
		$this->article = new App\Article;
	}

	public function testTitleIsEmptyByDefault() {
		// Assert the title property will be null or empty
		$this->assertEmpty($this->article->title);
	}

	public function testSlugIsEmptyWithNoTitle() {
		// Assert the article's slug is identical to an empty string
		$this->assertSame('', $this->article->getSlug());
	}

	/**
	 * This is a data provider method as such it does not and SHOULD NOT
	 * have 'test' in it's name as we DO NOT want PHPUnit to run this method as a test
	 *
	 * @return string[][]
	 */
	public function titleProvider() {
		return [
			// This is an optional label you can add to each dataset
			// It will appear in a failure message
			// It is good practice to use these labels and make them as verbose
			// as the commented out functions (below0 they are replacing
			'Slug Has Spaces Replaced By Underscores' => [
				// These strings will be passed in as arguments
				"Learn how you can earn $64,000 in just two weeks!",
				"Learn_how_you_can_earn_64000_in_just_two_weeks",
			],
			'Slug Has Whitespace Replaced By Single Underscore' => [
				"Learn     how you    can earn   \n  $64,000 in just two weeks!",
				"Learn_how_you_can_earn_64000_in_just_two_weeks",
			],
			'Slug Does Not Start Or End With An Underscore' => [
				" Learn how you can earn $64,000 in just two weeks! ",
				"Learn_how_you_can_earn_64000_in_just_two_weeks",
			],
			'Slug Does Not Have Any Non Word Characters' => [
				"Learn how you can earn $64,000 in just two weeks!",
				"Learn_how_you_can_earn_64000_in_just_two_weeks",
			]
		];
	}

	/**
	 * The dataProvider annotation lets PHPUnit know where to pull the values from
	 * This method will be called once for each key in the dataProvider array
	 * This will add n assertion(s) for each time the method runs
	 *
	 * @dataProvider titleProvider
	 *
	 * @param string $title Article's title includes white-space and special characters
	 * @param string $slug URL friendly slug
	 */
	public function testSlug(string $title, string $slug) {
		// Set title property of the Article class
		$this->article->title = $title;

		// Assert the expected slug is equal to the returned slug
		$this->assertEquals($slug, $this->article->getSlug());
	}

	/*
	public function testSlugHasSpacesReplacedByUnderscores() {
		// Set title property of the Article class
		$this->article->title = "Learn how you can earn $64,000 in just two weeks!";

		// Assert the slug is equal to the title string with underscores
		$this->assertEquals('Learn_how_you_can_earn_64000_in_just_two_weeks', $this->article->getSlug());
	}

	public function testSlugHasWhitespaceReplacedBySingleUnderscore() {
		// Set title property of the Article class with multiple spaces and a new line character
		$this->article->title = "Learn     how you    can earn   \n  $64,000 in just two weeks!"; // /n is not interpreted by php as a new line character when wrapped in single quotes

		// Assert that multiple spaces, new lines, and tabs will be replaced with a
		// single underscore even if there are multiple of these grouped together
		$this->assertEquals('Learn_how_you_can_earn_64000_in_just_two_weeks', $this->article->getSlug());
	}

	public function testSlugDoesNotStartOrEndWithAnUnderscore() {
		// Set title property of the Article class with spaces at the start and end of the string
		$this->article->title = " Learn how you can earn $64,000 in just two weeks!  ";

		// Assert that spaces preceding and following the string will be trimmed
		$this->assertEquals('Learn_how_you_can_earn_64000_in_just_two_weeks', $this->article->getSlug());
	}

	public function testSlugDoesNotHaveAnyNonWordCharacters() {
		// Set title property of the Article class
		$this->article->title = "Learn how you can earn $64,000 in just two weeks!";

		// Assert that the special characters are being removed from the slug
		$this->assertEquals('Learn_how_you_can_earn_64000_in_just_two_weeks', $this->article->getSlug());
	}
	*/
}
