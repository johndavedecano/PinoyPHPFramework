<?php
class DefaultController extends Framework\Controller
{
	public function main()
	{
		echo 'Main Controller';
	}
    
    public function test($name)
    {
        echo $name;
    }
    
    public function 404(){
        echo 'Fropm Dave';   
    }
    
 }