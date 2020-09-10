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
		$this->assertSame($this->article->getSlug(), '');
	}

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
}
