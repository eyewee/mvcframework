<?php 

	//we want our url's change dynamically, especially when we get to upload the website 
	//to a real server, this is why we use config.php

	//database params
	//remember to pass this command to xampp shell:
	//mysqladmin --user=root password "you_password_here"
	//also add your password to C:\~\XAMPP\phpMyAdmin\config.inc.php
	//in $cfg['Servers'][$i]['password'] = 'mywebsite';
	define('DB_HOST', '127.0.0.1:8098');
	define('DB_USER', 'root');
	define('DB_PASS', 'mywebsite'); //see my.ini config inside xampp mysql config
	define('DB_NAME', 'mvcframework');

	//this will return C:\Programs\XAMPP\htdocs\mvcframework\app
	//instead of C:\Programs\XAMPP\htdocs\mvcframework\app\config\config.php
	//echo dirname(dirname(__FILE__));

	//But we should use a variable, that can be called inside app/view/pages/index.php
	define('APPROOT', dirname(dirname(__FILE__)));

	//same with URLROOT, this will allow omission of writing path everytime inside
	//<a href="localhost/mvcframework">, now you just write <a href="URLROOT">
	//it becomes dynamic
	define('URLROOT', 'localhost/mvcframework');

	//Website name, can be used as browser tab title
	define('SITENAME', 'Bislacorp MVC Demo');
