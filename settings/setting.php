<?php
  $mysqli = @new mysqli('dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz', 'u1408_rsgg', 'U5t26t~a', 'u1408839_qqqq');
  if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }
  $mysqli->query('SET NAMES utf8');
  $result_set = $mysqli->query('SELECT setting,value FROM settings WHERE setting like "марка"');

echo '<form method="post" action="registrUser.php" name="signin-form" enctype="multipart/form-data">';

$data = "";
  while ($row = $result_set->fetch_assoc()) {
    $data = "{$data} {$row[value]}";
  }
$data = trim($data);

 echo "<div class='form-element'>
    <label>марка</label>
    <textarea id='story' name='mark' rows='5' cols='33'>{$data}</textarea><hr>
  </div>";

$result_set = $mysqli->query('SELECT setting,value FROM settings WHERE setting like "вид техники"');

$data = "";
  while ($row = $result_set->fetch_assoc()) {
    $data = "{$data} {$row[value]}";
  }
$data = trim($data);

 echo "<div class='form-element'>
    <label>вид техники</label>
    <textarea id='story' name='tech' rows='5' cols='33'>{$data}</textarea><hr>
  </div>";

$result_set = $mysqli->query('SELECT setting,value FROM settings WHERE setting like "статус"');

$data = "";
  while ($row = $result_set->fetch_assoc()) {
    $data = "{$data} {$row[value]}";
  }
$data = trim($data);
 echo "<div class='form-element'>
    <label>статус</label>
    <textarea id='story' name='status' rows='5' cols='33'>{$data}</textarea><hr>
  </div>";






$result_set = $mysqli->query('SELECT * FROM sklad_details');

// name,article,analog_id,count,price_zakup,price_opt,price_roznica
$data = "";
  while ($row = $result_set->fetch_assoc()) {
    $data = "{$data} {$row['name']},{$row['article']},{$row['analog_id']},{$row['count']},{$row['price_zakup']},{$row['price_opt']},{$row['price_roznica']}";
  }
$data = trim($data);

 echo "<div class='form-element'>
    <label>Детали</label>
    <textarea id='story' name='details' rows='5' cols='33'>{$data}</textarea><hr>
  </div>";




echo '<button type="submit" name="registration_user" value="registration_user">Изменить</button>
</form>';

 

  $result_set->close();
  $mysqli->close();
?>