<?php
namespace Framework;
class Config
{
	
    private static $base;

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
		static::$base = __DIR__.'/../config';
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {

    }

    public static function get($path = null)
    {
    	$items = explode(".",$path);

    	if(static::find($items[0]))
    	{
    		
    	}

    	return null;
    }

    private static function find($file)
    {
    	if(!file_exists(static::$base.'/'.$file.'.php'))
    		return null
    	else
    		return true
    }

}