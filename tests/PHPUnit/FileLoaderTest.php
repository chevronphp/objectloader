<?php

namespace ObjectLoaderTest;

use \Chevron\ObjectLoader\FileLoader;

class FileLoaderTest extends \PHPUnit_Framework_TestCase {

	function getHelperPath(){
		return __DIR__ . "/helpers";
	}

	function test_loadFiles(){

		$fs = (new FileLoader)->loadFiles($this->getHelperPath());

		$key = $this->getHelperPath() . "/otherMock.php";

		$this->assertEquals($fs[$key], 3);
	}

	function test_loadFiles_filtered(){

		$fs = (new FileLoader)->loadFiles($this->getHelperPath(), "|^not-a-file$|");

		$this->assertEquals($fs, []);
	}

}