<?php

namespace Chevron\ObjectLoader;

use Chevron\ObjectLoader\Exceptions;
/**
 * Recurse over a directory and load each file matching the filter. If the file
 * returns a callable, call it and pass the provided object to is. Useful for
 * loading a DI/Services object or adding events to an EventQueue.
 *
 * <?php
 * return function($obj){
 *     // do something with $obj;
 * }
 *
 *
 * @package Chevron\ObjectLoader
 */
class ObjectLoader extends PathLoader {

	function loadObject($Obj, $path, $filter = null){

		if(!is_object($Obj)){
			throw new Exceptions\ObjectLoaderException(__CLASS__ . " expects a previously instantiated object.");
		}

		$files = $this->getPaths($path, $filter);

		foreach($files as $file){
			$evs = require $file;
			if(is_callable($evs)){
				call_user_func($evs, $Obj);
			}
		}

		return $Obj;

	}

}