<?php

namespace App;

class Article {
	/**
	 * @var string $title The article's title
	 */
	public $title;

	/**
	 * Get the article's slug
	 *
	 * @return string The article's slug
	 */
	public function getSlug(): string {
		// Assign the title property's value to the slug
		$slug = $this->title;

		// Replace spaces, new lines, and tabs with an underscore - this is what '\s' does
		// Include adjacent spaces, new lines, and tabs in this search - this is what the '+' does
		$slug = preg_replace('/\s+/', '_', $slug);

		// Remove whitespace (spaces) leading and trailing the slug string
		$slug = trim($slug, '_');

		// Return the mostly URL friendly slug
		return $slug;


		// Based off the tests written in ArticleTest.php this is enough
		// code to make the test pass so we can move on and come back later
		// to add the actual logic that converts the title to a url friendly slug
		return '';
	}
}
