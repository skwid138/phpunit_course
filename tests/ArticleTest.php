<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase {
	public function testTitleIsEmptyByDefault() {
		// Instantiate the Article class
		$article = new App\Article;

		// Assert the title property will be null or empty
		$this->assertEmpty($article->title);
	}

	public function testSlugIsEmptyWithNoTitle() {
		// Instantiate the Article class
		$article = new App\Article;

		// Assert the article's slug is identical to an empty string
		$this->assertSame($article->getSlug(), '');
	}
}
