<?php
	header('Access-Control-Allow-Origin: *');
	define ('SITE_ROOT', realpath(dirname(__FILE__)));
	require_once 'class/db_class.php';
	require_once 'template/main_body.php';
	head('Liste de cadeaux');
	body();
	footer();
?>