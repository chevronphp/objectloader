<?php

namespace ObjectLoaderTest;

use \Chevron\ObjectLoader\ObjectLoader;

class ObjectLoaderTest extends \PHPUnit_Framework_TestCase {

	function getHelperPath(){
		return __DIR__ . "/helpers";
	}

	function getNotHelperPath(){
		return __DIR__ . "/not-helpers";
	}

	function test_loadObject(){

		$obj = (new ObjectLoader)->loadObject(new \stdClass, $this->getHelperPath());

		$this->assertEquals($obj->int, 1);

		$func = $obj->func;

		$this->assertEquals(call_user_func($func), 2);
	}

	/**
	 * @expectedException \Chevron\ObjectLoader\Exceptions\ObjectLoaderException
	 */
	function test_loadObject_no_object(){

		$obj = null;
		$obj = (new ObjectLoader)->loadObject($obj, $this->getHelperPath());

	}

	/**
	 * @expectedException \Chevron\ObjectLoader\Exceptions\ObjectLoaderException
	 */
	function test_loadObject_bad_path(){

		$obj = (new ObjectLoader)->loadObject(new \stdClass, $this->getNotHelperPath());
	}

}