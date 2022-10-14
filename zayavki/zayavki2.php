<?php
	session_start();
	if($_SESSION['role'] == 'undefined'){
		header("Location: http://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/autorization/login.html");
	}

	$id = $_SESSION['id'];
    $role = $_SESSION['role'];
    $name = $_SESSION['name'];
?>
<html>
  <head>
    <title>Untitled</title>
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
  //$mysqli->query('INSERT INTO users (name,login,password,role) VALUES ("Леша", "lesha","passwd","admin")');
  
  $result_set = $mysqli->query('SELECT date,time,address,phone,tech,mark,cause,description,user,status,price FROM bids');
	  

echo "<table class='table'>
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
    <td>$row[date]</td>
    <td>$row[time]</td>
    <td>$row[address]</td>
  <td>$row[phone]</td>
  <td>$row[tech]</td>
  <td>$row[mark]</td>
  <td>$row[cause]</td>
  <td>$row[description]</td>
  <td>$row[user]</td>
  <td>$row[status]</td>
  <td>$row[price]</td>
  </tr>";
    
  }
echo "</table>";
    
echo "<div>{$id}</div>";
echo "<div>{$role}</div>";
echo "<div>{$name}</div>";

    

?>
  <div class="bottom-menu">
    <ul class="ul-menu-bottom">
        <li class="li-menu"><button id="btn-hover" class="btn-menu">Новая заявка</button></li>
		 <li class="li-menu"><a id="btn-menu" href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/zayavki/logout.php">exit</a></li>
		
    </ul>
  <div>
   
      
      <form method="post" action="dd.php" name="signin-form" enctype="multipart/form-data" id="form">

<div class="table-element">
    <input type="text" name="time"/>
  </div>
  
  <div class="table-element">
    <input type="text" name="address" required />
  </div>
  <div class="table-element">
    <input type="text" name="phone" required />
  </div>

  <div class="table-element">
   <?php
      $result_set = $mysqli->query('SELECT setting,value FROM settings WHERE setting like "вид техники"');

    echo "<select name='tech'>";
      while ($row = $result_set->fetch_assoc()) {

      echo "<option>{$row[value]}</option>";

      }

      echo  "</select>";

  ?>
  </div>

  <div class="table-element">
    <?php
      $result_set = $mysqli->query('SELECT setting,value FROM settings WHERE setting like "марка"');

    echo "<select name='mark'>";
      while ($row = $result_set->fetch_assoc()) {

      echo "<option>{$row[value]}</option>";

      }

      echo  "</select>";
    
  ?>
  </div>

  <div class="table-element">
    <input type="text" name="cause" required />
  </div>

  <div class="table-element">
    <input type="text" name="description" required />
  </div>

  <div class="table-element">
    <?php
      $result_set = $mysqli->query('SELECT id,role,name FROM users WHERE role like "admin"');

    echo "<select name='user'>";
      while ($row = $result_set->fetch_assoc()) {

      echo "<option value='{$row[id]}'>{$row[name]}</option>";

      }

      echo  "</select>";
  ?>
  </div>

  <div class="table-element">
    <?php
      $result_set = $mysqli->query('SELECT setting,value FROM settings WHERE setting like "статус"');

    echo "<select name='status'>";
      while ($row = $result_set->fetch_assoc()) {

      echo "<option>{$row[value]}</option>";

      }

      echo  "</select>";
    
      $result_set->close();
      $mysqli->close();
  ?>
  </div>

  <div class="table-element">
    <input type="text" name="price" required />
  </div>
    
  <div class="table-element">
    <input type="file"name="myimage">
  </div>

  <div class="table-element">
    <input type="text" name="id_detail" required />
  </div>
		  
      
  <button type="submit" name="registration_user" value="registration_user" id="btn-form">Зарегистрировать</button>
</form>

  </body>
</html>
