# ** Contact App **

Contact App is aplication based on PHP Laravel framework for backend and RESTful API and HTML, SASS and Vue.js for frontend. Aplication provides a list of contacts and possibility for creating a list of favorites contacts.

## ** Configuration **

### ** Step 1: Hosts **

Copy following lines to `C:/Windows/System32/drivers/etc/hosts`. When editing hosts file you must be logged in with Administrator privileges in Windows system.

```
#----------------------------------------------
# CONTACT APP - LOCALHOST
#----------------------------------------------
127.0.0.1    www.contacts.com
127.0.0.1    contacts.com

```

### ** Step 2: Virtual Hosts **

Copy following lines to `C:/wamp/bin/apache/apachex.y.z/conf/extra/httpd-vhosts.conf` for **Wamp server** or to `C:/xampp/apache/conf/extra/httpd-vhosts.conf` for **XAMPP**.

```
#----------------------------------------------
# CONTACT APP LOCAL
#----------------------------------------------

<VirtualHost contacts.com:80>
    ServerName contacts.com
    ServerAlias www.contacts.com contacts.com
    DocumentRoot "C:/xampp/htdocs/projects/contacts/public"
	DirectoryIndex index.php
	<Directory "C/xampp/htdocs/projects/contacts/public">
        Options Indexes FollowSymLinks MultiViews Includes execCGI
        AllowOverride All
		Order allow,deny
        Require all granted
    </Directory>
</VirtualHost>
```

### ** Step 3: Clone project **

```
git clone https://github.com/Luka1812/contacts.git
```

### ** Step 4: Composer **

Run following command in terminal:

```
composer update
```

### ** Step 5: npm **

Run following command in terminal:

```
npm install
```

```
npm run development
```

### ** Step 6: Database **

Create database schema `contacts_db`.

Run following commands in terminal to start migrations and seeders:

```
php artisan migrate:refresh
php artisan db:seed
```


If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
