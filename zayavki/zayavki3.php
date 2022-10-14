<?php
	session_start();
	if($_SESSION['role'] == 'undefined'){
		header("Location: http://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/autorization/login.html");
	}

	if(count($_SESSION)<=4){
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
    <script src="./../js/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    
    <div class="top-menu">
    <ul class="ul-menu-top">
      <li class="li-menu"><a class="btn-menu" href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/zayavki/zayavki.php">Заявки</a></li>
      <li class="li-menu"><a class="btn-menu" href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/masterskaya/masterskaya.php">Мастерская</a></li>
      <li class="li-menu"><a class="btn-menu" href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/sklad/sklad.php">Склад</a></li>
      <li class="li-menu"><a class="btn-menu" href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/prodashi/prodashi.php">Продажи</a></li>
      <li class="li-menu"><a class="btn-menu" href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/kassa/kassa.php">Касса</a></li>
      <li class="li-menu"><a class="btn-menu" href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/holodilniki/holodilniki.php">Холодильники</a></li>
      <li class="li-menu"><a class="btn-menu" href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/settings/setting.php">Настройки</a></li>
		<li class="li-menu"><a class="btn-menu" href="https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/zayavki/logout.php">Выйти</a></li>
  </ul>
      <hr class="menu">
  </div>
    
<?php
   
   
    
  $mysqli = @new mysqli('dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz', 'u1408_rsgg', 'U5t26t~a', 'u1408839_qqqq');
  if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }
  $mysqli->query('SET NAMES utf8');
  //$mysqli->query('INSERT INTO users (name,login,password,role) VALUES ("Леша", "lesha","passwd","admin")');
  
  $result_set = $mysqli->query('SELECT id,date,time,address,phone,tech,mark,cause,description,user,status,price FROM bids');
	  

echo "<table class='table'>
  <tr>
  <th>№</th>
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
  <th></th>
  </tr>";
  
  while ($row = $result_set->fetch_assoc()) {
	  
	$user_set = $mysqli->query("SELECT id,name,role FROM users WHERE id = $row[user]");
	  
	while ($user = $user_set->fetch_assoc()) {
		
	
	  
	  
    echo " <tr>
	<td class='data'>$row[id]</td>
    <td class='data'>$row[date]</td>
    <td class='data'>$row[time]</td>
    <td class='data'>$row[address]</td>
  <td class='data'>$row[phone]</td>
  <td class='option'>$row[tech]</td>
  <td class='option'>$row[mark]</td>
  <td class='data'>$row[cause]</td>
  <td class='data'>$row[description]</td>
  <td class='option'>$user[name]</td>
  <td class='option'>$row[status]</td>
  <td class='data'>$row[price]</td>
  <td><button id='btn-table-hover' class='btn-menu btn-table-hover'>Изменить</button></td>
  </tr>";
	}
  }
echo "</table>";
    
echo "<div>{$id}</div>";
echo "<div>{$role}</div>";
echo "<div>{$name}</div>";

    

?>
  <div class="bottom-menu">
    <ul class="ul-menu-bottom">
        <li class="li-menu"><button id="btn-hover" class="btn-menu">Новая заявка</button></li>
    </ul>
  </div>
    
    <div class="Overlay">
      
      <form method="post" action="registrUser.php" name="signin-form" enctype="multipart/form-data" id="form" class="form-reg">
      <div><button id="btn-close">X</button></div>
		  <div class="form-element">
			<label>№
			   <?php
				  $result_set = $mysqli->query('SELECT id FROM bids');
					
				$max = 0;
				  while ($row = $result_set->fetch_assoc()) {
					  if($max < $row[id]){
						  $max = $row[id];
					  }
					  
				  }
				echo $max+1;

			  ?>
			  </label>
			  
			  
		  </div>
  <div class="form-element">
    <label>Дата</label>
    <input type="date" name="date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
  </div>
  <div class="form-element">
    <label>Время</label>
    <input type="text" name="time"/>
  </div>
  
  <div class="form-element">
    <label>Адресс</label>
    <input type="text" name="address" required />
  </div>
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

      echo  "</select>";

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

      echo  "</select>";
    
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

      echo  "</select>";
  ?>
  </div>

  <div class="form-element">
    <label>Статус</label>
    <?php
      $result_set = $mysqli->query('SELECT setting,value FROM settings WHERE setting like "статус"');

    echo "<select name='status'>";
      while ($row = $result_set->fetch_assoc()) {

      echo "<option>{$row[value]}</option>";

      }

      echo  "</select>";
    
      
  ?>
  </div>

  <div class="form-element">
    <label>Цена</label>
    <input type="text" name="price" required />
  </div>
      
  <button type="submit" name="registration_user" value="registration_user" id="btn-form">Зарегистрировать</button>
</form>
      
      </div>
	  
	  
	  
	  
	      <div class="Overlay-table Overlay-table-form">
      
      <form method="post" action="changeDetails.php" name="signin-form" enctype="multipart/form-data" id="form" class="form-reg">
      <div><button type="button" id="btn-table-close">X</button></div>
		  <div class="form-element">
			<label>№</label>
			 <input type="id" name="id" required>
		  </div>
		 
    <div class="form-element">
    <label>Дата</label>
    <input type="date" name="date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
  </div>
  <div class="form-element">
    <label>Время</label>
    <input type="text" name="time"/>
  </div>
  
  <div class="form-element">
    <label>Адресс</label>
    <input type="text" name="address" required />
  </div>
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

      echo  "</select>";

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

      echo  "</select>";
    
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

      echo  "</select>";
  ?>
  </div>

  <div class="form-element">
    <label>Статус</label>
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
		  
  <div class="form-element">
    <label>Цена</label>
    <input type="text" name="price" required />
  </div>
    
  <div class="form-element">
    <label>Фото</label>
    <input type="file"name="myimage">
  </div>

  <div class="form-element">
	  <button type="button" id="addDetail" style="margin-bottom: 5px;">Добавить деталь</button>
  </div> 
  
  <div id="details">

  </div>
		  
  <button type="submit" name="changeDetails" value="changeDetaisls" id="btn-form">Зарегистрировать</button>
</form>
	</div>
	  
	  
    
    <script>
      $(function(){

      let i = 0;
      $('#addDetail').click(function(){
        i++;
        $('#details').append($(`<div class="form-element">
          <div style="margin-bottom: 10px;margin-top: 10px;"><label>Деталь ${i}</label></div>
          <label>Номер</label>
          <input type="text" name="id-detail-${i}"/>
          <label>Название</label>
          <input type="text" name="name-detail-${i}"/>
          <label>Кол-во</label>
          <input type="text" name="count-detail-${i}"/>
          <hr>
        </div>`));
      });

		  $('.Overlay').hide();
			$( '#btn-hover' ).click(function() {
			$('.Overlay').fadeIn(100);
		  });

		  $('#btn-close').click(function() {
			$('.Overlay').fadeOut(100);
		  });
		  
		  
		 let formFields = $('.Overlay-table > #form > div > input');
		 let optionFields = $('.Overlay-table > #form > div > select');
		  
		  $('.Overlay-table').hide();
		  
		  
			$(".btn-table-hover").each(function(){
			  $(this).click(function(id) {
				  $(this).closest("td").closest("tr").children('td.data').each(function(i){
						$(formFields[i]).attr('value', $(this).text());
				  })
				  $(this).closest("td").closest("tr").children('td.option').each(function(i){
						$(optionFields[i]).add(`:contains("${$(this).text()}")`).prop('selected', true);
				  })
				  $('.Overlay-table').fadeIn(100);
				});
			})

		  $('#btn-table-close').click(function() {
			  $('.Overlay-table').fadeOut(100);

        
        i = 0;
        $('#details').html('');
		  });s
		  
		 
		  
      })
    </script>
  </body>
</html>

	  