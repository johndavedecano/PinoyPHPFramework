# PinoyPHPFramework

Simpleng php framework lang.

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
2. Open your command line tool go to the project folder and hit composer update.

3. Restart your apache

4. Then visit e.g http://framework
