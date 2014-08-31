<?php

namespace Chevron\ObjectLoader;

use Chevron\ObjectLoader\Exceptions;
/**
 * Recurse over a directory and load each file matching the filter.
 *
 *
 * @package Chevron\ObjectLoader
 */
class FileLoader extends PathLoader {

	function loadFiles($path, $filter = null){

		$files = $this->getPaths($path, $filter);

		$return = [];
		foreach($files as $file){
			$return[strval($file)] = require $file;
		}

		return $return;

	}

}