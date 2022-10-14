<?php
  $mysqli = @new mysqli('dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz', 'u1408_rsgg', 'U5t26t~a', 'u1408839_qqqq');
  if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }
  $mysqli->query('SET NAMES utf8');
  //$mysqli->query('INSERT INTO users (name,login,password,role) VALUES ("Леша", "lesha","passwd","admin")');
  
	$result_set = $mysqli->query('SELECT * FROM bids');

  while ($row = $result_set->fetch_assoc()) {
    print_r($row);
    echo "<br />";
  }
  $result_set->close();
  $mysqli->close();
?>