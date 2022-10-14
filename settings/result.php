<?php
  $mysqli = @new mysqli('dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz', 'u1408_rsgg', 'U5t26t~a', 'u1408839_qqqq');
  if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }

  $mysqli->query('SET NAMES utf8');
  
	$result_set = $mysqli->query('SELECT setting FROM settings WHERE setting like "марка"');

echo '<select size="3" multiple name="hero[]">
    <option value="Чебурашка">Чебурашка</option>
    <option selected value="Крокодил Гена">Крокодил Гена</option>
    <option value="Шапокляк">Шапокляк</option>
    <option value="Крыса Лариса">Крыса Лариса</option>
   ';
	
  while ($row = $result_set->fetch_assoc()) {
    echo '<option value="$row[setting]">$row[setting]</option>';
	  
  }
echo "</select>";
  $result_set->close();
  $mysqli->close();
?>