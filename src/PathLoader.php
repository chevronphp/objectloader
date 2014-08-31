<?php

namespace Chevron\ObjectLoader;

use Chevron\ObjectLoader\Exceptions;
/**
 * Recurse over a directory and return each path matching $filter
 *
 * <?php
 * return function($obj){
 *     // do something with $obj;
 * }
 *
 *
 * @package Chevron\ObjectLoader
 */
abstract class PathLoader {

	protected function getPaths($path, $filter = null){

		$pattern = $filter ?: "|\\.php$|";

		$path = rtrim($path, DIRECTORY_SEPARATOR);

		if(!is_dir($path)){
			throw new Exceptions\ObjectLoaderException(__CLASS__ . " expects a real directory and '{$path}' is not.");
		}

		return new \RegexIterator(
			new \RecursiveIteratorIterator(
				new \RecursiveDirectoryIterator($path)
			), $pattern
		);

	}

}