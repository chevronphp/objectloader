<?php

namespace Chevron\ObjectLoader;

use Chevron\ObjectLoader\Exceptions;
/**
 * Recurse over a directory and load each php file. If the file returns a callable,
 * call it and pass the provided object to is. Useful for laoading a DI/Services
 * Object or adding events to an EventQueue.
 *
 * <?php
 * return function($obj){
 *     // do something with $obj;
 * }
 *
 *
 * @package Chevron\ObjectLoader
 */
class ObjectLoader {

	function loadObject($Obj, $path){

		if(!is_object($Obj)){
			throw new Exceptions\ObjectLoaderException(__CLASS__ . " expects a previously instantiated object.");
		}

		$files = $this->getPaths($path);

		foreach($files as $file){
			$evs = require $file;
			if(is_callable($evs)){
				call_user_func($evs, $Obj);
			}
		}

		return $Obj;

	}

	protected function getPaths($path){

		if(!is_dir($path)){
			throw new Exceptions\ObjectLoaderException(__CLASS__ . " expects a real directory and '{$path}' is not.");
		}

		$iter = new \RecursiveIteratorIterator(
			new \RecursiveDirectoryIterator(
				rtrim($path, DIRECTORY_SEPARATOR)
			)
		);

		$files = [];
		foreach($iter as $path => $file){
			if(substr($path, -4) === ".php"){
				$files[] = $path;
			}
		}
		return $files;
	}

}