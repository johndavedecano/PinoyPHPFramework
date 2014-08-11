<?php

namespace Main\Controllers;

use Framework\Controller;

class DefaultController extends Controller
{
	public function main()
	{
		echo 'Main';
	}
    
    public function test($name)
    {
        echo $name;
    }
    
    public function send404()
    {
        echo 'Fropm Dave';   
    }

    public function rose()
    {
        echo 'sdgasgas';
    }
    
 }