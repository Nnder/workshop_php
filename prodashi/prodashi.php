<html>
  <head>
    <title>Untitled</title>
	<meta charset="utf-8">
	  <link href="../style/style.css" rel="stylesheet">
  </head>
  <body>
	  <ul>
		  <li><a href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/zayavki/zayavki.php">Заявки</a></li>
		  <li><a href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/masterskaya/masterskaya.php">Мастерская</a></li>
		  <li><a href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/sklad/sklad.php">Склад</a></li>
		  <li><a href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/prodashi/prodashi.php">Продажи</a></li>
		  <li><a href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/kassa/kassa.php">Касса</a></li>
		  <li><a href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/holodilniki/holodilniki.php">Холодильники</a></li>
	</ul>
<?php
  $mysqli = @new mysqli('dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz', 'u1408_rsgg', 'U5t26t~a', 'u1408839_qqqq');
  if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }
  $mysqli->query('SET NAMES utf8');
  //$mysqli->query('INSERT INTO users (name,login,password,role) VALUES ("Леша", "lesha","passwd","admin")');
  
	$result_set = $mysqli->query('SELECT date,time,address,phone,tech,mark,cause,description,user,status,price FROM bids');

echo "<table>
  <tr>
    <th>Дата</th>
    <th>Время</th>
    <th>Адрес</th>
	<th>Телефон</th>
	<th>Вид техники</th>
	<th>Марка</th>
	<th>Причина</th>
	<th>Описание</th>
	<th>Мастер</th>
	<th>Статус</th>
	<th>Цена</th>
  </tr>";
	
  while ($row = $result_set->fetch_assoc()) {
    echo " <tr>
    <th>$row[date]</th>
    <th>$row[time]</th>
    <th>$row[address]</th>
	<th>$row[phone]</th>
	<th>$row[tech]</th>
	<th>$row[mark]</th>
	<th>$row[cause]</th>
	<th>$row[description]</th>
	<th>$row[user]</th>
	<th>$row[status]</th>
	<th>$row[price]</th>
  </tr>";
	  
  }
echo "</table>";
  $result_set->close();
  $mysqli->close();
?>
  </body>
</html>
