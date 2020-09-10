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
		$this->article->title = 'Learn how you can earn $64,000 in just two weeks!';

		// Assert the slug is equal to the title string with underscores
		$this->assertEquals($this->article->getSlug(), 'Learn_how_you_can_earn_$64,000_in_just_two_weeks!');
	}
}
