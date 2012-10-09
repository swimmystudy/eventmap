<?php

class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'database_name',
		'prefix' => '',
		//'encoding' => 'utf8',
	);

	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'test_database_name',
		'prefix' => '',
		//'encoding' => 'utf8',
	);

	public $twitter = array(
		'datasource' => 'TwitterSource',
		'login' => 'username',
		'password' => 'password',
	);
	public $atnd = array(
		'datasource' => 'AtndSource',
	);
	public $zusaar = array(
		'datasource' => 'ZusaarSource',
	);
	public $connpass = array(
		'datasource' => 'ConnpassSource',
	);




}