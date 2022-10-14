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
    <title>Склад</title>
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
//

  
  $result_set = $mysqli->query('SELECT id,name,article,analog_id,count,price_zakup,price_opt,price_roznica FROM sklad_details');
	  

echo "<table class='table'>
  <tr>
  <th>№</th>
    <th>Название</th>
    <th>Артикул</th>
    <th>Аналог</th>
  <th>Кол-во</th>
  <th>Цена закупки</th>
  <th>Цена опт</th>
  <th>Цена розница</th>
  <th></th>
  </tr>";
  
  while ($row = $result_set->fetch_assoc()) {
	 
		
	  
    echo " <tr>
	<td class='data'>$row[id]</td>
    <td class='data'>$row[name]</td>
    <td class='data'>$row[article]</td>
    <td class='data'>$row[analog_id]</td>
  <td class='data'>$row[count]</td>
  <td class='data'>$row[price_zakup]</td>
  <td class='data'>$row[price_opt]</td>
  <td class='data'>$row[price_roznica]</td>
  <td><button id='btn-table-hover' class='btn-menu btn-table-hover'>Изменить</button></td>
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
    <label>Название</label>
    <input type="text" name="name"/>
  </div>
		 
  <div class="form-element">
    <label>Артикул</label>
    <input type="text" name="article"/>
  </div>
  
  <div class="form-element">
    <label>Аналог</label>
    <input type="text" name="analog" required />
  </div>
		  
  <div class="form-element">
    <label>Кол-во</label>
    <input type="text" name="count" required />
  </div>
		  
  <div class="form-element">
    <label>Цена закупки</label>
    <input type="text" name="price_zak" required />
  </div>
    
  <div class="form-element">
    <label>Цена опт</label>
    <input type="text" name="price_opt" required />
  </div>

  <div class="form-element">
    <label>Цена розница</label>
    <input type="text" name="price_roz" required />
  </div>
		  
  <div class="form-element">
    <label>Фото</label>
    <input type="file"name="myimage">
  </div>
      
  <button type="submit" name="registration_user" value="registration_user" id="btn-form">Зарегистрировать</button>
</form>
</div>
	  
	  
	  
<div class="Overlay-table Overlay-table-form">
      <form method="post" action="changeDetails.php" name="signin-form" enctype="multipart/form-data" id="form" class="form-reg">
      <div><button type="button" id="btn-table-close">X</button></div>
		  <div class="form-element">
			<label>№</label>
			 <input type="id" name="id" required disabled>
		  </div>
		  
	<div class="form-element">
    <label>Название</label>
    <input type="text" name="name"/>
  </div>
		 
  <div class="form-element">
    <label>Артикул</label>
    <input type="text" name="article"/>
  </div>
  
  <div class="form-element">
    <label>Аналог</label>
    <input type="text" name="analog" required />
  </div>
		  
  <div class="form-element">
    <label>Кол-во</label>
    <input type="text" name="count" required />
  </div>
		  
  <div class="form-element">
    <label>Цена закупки</label>
    <input type="text" name="price_zak" required />
  </div>
    
  <div class="form-element">
    <label>Цена опт</label>
    <input type="text" name="price_opt" required />
  </div>

  <div class="form-element">
    <label>Цена розница</label>
    <input type="text" name="price_roz" required />
  </div>
		  
  <div class="form-element">
    <label>Фото</label>
    <input type="file"name="myimage">
  </div>
		  
  <button type="submit" name="changeDetails" value="changeDetaisls" id="btn-form">Зарегистрировать</button>
</form>
	</div>
	  
	  
    
    <script>
      $(function(){


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

	  