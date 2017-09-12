<?php
	ini_set('display_errors',1);
	error_reporting(-1);
	mail('borniche.leo@gmail.com','test postfix','test postfix') || print_r(error_get_last());
?>
