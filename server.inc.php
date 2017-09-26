<?php
	session_start();
	
	define("DB_TYPE", "mysql");
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "password@1");
	define("DB_DATABASE", "pylon_api");
	define("ROOT_DIR", dirname(__FILE__) . "/");
	define("RELA_DIR", "/pylon-front/");
?>