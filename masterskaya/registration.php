<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>Registration</title>
	<meta charset="utf-8">
	<link href="../style/style.css" rel="stylesheet">
  </head>
  <body>
	<?php
	  $mysqli = @new mysqli('dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz', 'u1408_rsgg', 'U5t26t~a', 'u1408839_qqqq');
	  if (mysqli_connect_errno()) {
		echo "Подключение невозможно: ".mysqli_connect_error();
	  }
	  $mysqli->query('SET NAMES utf8');
	?>
	<form method="post" action="registrUser.php" name="signin-form" enctype="multipart/form-data">
  <div class="form-element">
    <label>Телефон</label>
    <input type="text" name="phone" required />
  </div>

  <div class="form-element">
    <label>Вид техники</label>
    <?php
		  $result_set = $mysqli->query('SELECT setting,value FROM settings WHERE setting like "вид техники"');

		echo "<select name='tech'>";
		  while ($row = $result_set->fetch_assoc()) {

		  echo "<option>{$row[value]}</option>";

		  }

		  echo 	"</select>";

	?>
  </div>

  <div class="form-element">
    <label>Марка</label>
    <?php
		  $result_set = $mysqli->query('SELECT setting,value FROM settings WHERE setting like "марка"');

		echo "<select name='mark'>";
		  while ($row = $result_set->fetch_assoc()) {

		  echo "<option>{$row[value]}</option>";

		  }

		  echo 	"</select>";
	  
	?>
  </div>

  <div class="form-element">
    <label>Причина</label>
    <input type="text" name="cause" required />
  </div>

  <div class="form-element">
    <label>Прочее</label>
    <input type="text" name="description" required />
  </div>

  <div class="form-element">
    <label>Мастер</label>
    <?php
		  $result_set = $mysqli->query('SELECT id,role,name FROM users WHERE role like "admin"');

		echo "<select name='user'>";
		  while ($row = $result_set->fetch_assoc()) {

		  echo "<option value='{$row[id]}'>{$row[name]}</option>";

		  }

		  echo 	"</select>";
	?>
  </div>

  <div class="form-element">
    <label>Статус</label>
    <label>Статус</label>
    <?php
		  $result_set = $mysqli->query('SELECT setting,value FROM settings WHERE setting like "статус"');

		echo "<select name='status'>";
		  while ($row = $result_set->fetch_assoc()) {

		  echo "<option>{$row[value]}</option>";

		  }

		  echo 	"</select>";
	  
	    $result_set->close();
  		$mysqli->close();
	?>
  </div>
		
  <div class="form-element">
    <label>Фото</label>
    <input type="file"name="myimage">
  </div>
			
  <button type="submit" name="registration_user" value="registration_user">Зарегистрировать</button>
</form>


  </body>
</html>
