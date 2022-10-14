<?php
	!session_destroy();
	unset( $_SESSION );
	session_unset();
	$_SESSION = array();
?>