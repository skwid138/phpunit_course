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

		// Replace spaces with underscores
		$slug = str_replace(' ', '_', $slug);

		// Return the URL friendly slug
		return $slug;


		// Based off the tests written in ArticleTest.php this is enough
		// code to make the test pass so we can move on and come back later
		// to add the actual logic that converts the title to a url friendly slug
		return '';
	}
}
