<?php
namespace Framework;

use Framework\Request;

class Router
{
	protected $collections = array();

	public function __construct()
	{

	}

	public function __wakeup()
	{

	}

	public function __clone()
	{

	}

	public function map($method = array(),$pattern = '/' ,$locator = '')
	{
		
	}

	public function initialize()
	{
		print_r(Request::segment(23));
	}
	
	public function call()
	{

	}
}