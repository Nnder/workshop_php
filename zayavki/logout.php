<?php
	session_start();
	/*session is started if you don't write this line can't use $_Session  global variable*/
	$_SESSION["newsession"]=$value;
	$_SESSION['role'] = 'undefined';
	header("Location: http://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/autorization/login.html");
	//unset($_SESSION["newsession"]);
	/*session deleted. if you try using this you've got an error*/

	//session_destroy();
	//unset( $_SESSION );
	//session_unset();
	//$_SESSION = array();
	//$_SESSION['role'] = "qwerty";
?>