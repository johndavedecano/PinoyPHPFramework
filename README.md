# PinoyPHPFramework

A modular based mvc framework.

# Requirements

1. Composer http://getcomposer.org
2. MYSQL
3. PHP 5.4

# Installation

1. Create a virtual host pointing to the public folder

```javascript
<VirtualHost *:80>
    DocumentRoot "C:\projects\PinoyPHPFramework\public"
    ServerName framework
	<Directory C:\projects\PinoyPHPFramework\public>
		Options Indexes FollowSymLinks
		Order Deny,Allow   
		Allow from all 
		AllowOverride all
	</Directory>
</VirtualHost
```
2. Open your command line tool go to the project folder and hit composer update. It will create a folder named vendor.

3. Restart your apache

4. Then visit e.g http://framework
5. Optionally if you do not want to use apache, using your cmd, go to the public folder and run php -S 127.0.0.1:8080

# Routing

The routes configurations are located at /config/routes.php

```javascript
<?php
use Framework\Route;

$route = new Framework\Router;
$route->add(array(
    new Route('GET', '/test', 'Main\Controllers\DefaultController', 'main'),
    new Route('GET', '/test/alp:dave', 'Main\Controllers\DefaultController', 'test')
));

return $route;
```

Simply add a new Route object. Then add some arguments

Route($method,$pattern,$namespace,$action);

1.$method - POST,GET,PUT etc. 

2.$pattern - The url pattern e.g /about

## Available patterns

```javascript
    'alp' - Alphabet
    'num' - Numeric
    'aln' - Alpha Numeric
    'rgx' - Regular Expressions
```
3. $namespace - The class namespace e.g Main\Controllers\DefaultController located at modules/main/controllers/DefaultControler.php 
4. $action - The controllers method	

# Modules 

Modules 

Contains views, repositories, forms, models and controllers.

## Views

Views are the display layer of your module which is the responsible for presentation on the browser. It is consists of html files css and javascripts just like an ordinary web pages.

## Models

Models folder is where you put all your model files. The model files are the representation of your table which consists of attributes which are the table columns and some getters and setters.

## Repositories

Database logic classes. Responsible for saving, updating, deleting etc.

## Forms

This is where you store all your form specific validation classes

## 

Controllers are responsible for receiving a requests and passing, rendering the views and sending responses .
