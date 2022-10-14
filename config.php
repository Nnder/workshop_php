<?php
    define('USER', 'u1408_rsgg');
    define('PASSWORD', 'U5t26t~a');
    define('HOST', 'dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz');
    define('DATABASE', 'u1408839_qqqq');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
		$connection->query('SET NAMES utf8');
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>
