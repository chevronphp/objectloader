<?php

return function( \stdClass $obj ){

	$obj->int = 1;

	$obj->func = function(){
		return 2;
	};

};