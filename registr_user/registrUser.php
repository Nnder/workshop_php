<?php
    //session_start();
    include('./../config.php');
    if (isset($_POST['registration_user'])) {
		$login = $_POST['login'];
        $username = $_POST['username'];
        $password = $_POST['password'];
		$role= $_POST['role'];
		$connection->query('SET NAMES utf8');
        $query = $connection->prepare("INSERT INTO users (name,login,password,role) VALUES ('$username','$login','$password','$role')");
		//$connection->query();
        //$query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            header("Location: http://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/registr_user/registration.html");
        } else {
			echo '<html>
  <head>
    <title>Complete</title>
	  <style type="text/css">ul {
  list-style: none; /*убираем маркеры списка*/
  margin: 0; /*убираем отступы*/
  padding-left: 0; /*убираем отступы*/
  margin-top:25px; /*делаем отступ сверху*/
}
a {
  text-decoration: none; /*убираем подчеркивание текста ссылок*/
  background:#30A8E6; /*добавляем фон к пункту меню*/
  color:#fff; /*меняем цвет ссылок*/
  padding:10px; /*добавляем отступ*/
  font-family: arial; /*меняем шрифт*/
  border-radius:4px; /*добавляем скругление*/
  -moz-transition: all 0.3s 0.01s ease; /*делаем плавный переход*/
  -o-transition: all 0.3s 0.01s ease;
  -webkit-transition: all 0.3s 0.01s ease;
}
a:hover {
  background:#1C85BB;/*добавляем эффект при наведении*/
}
li {
  float:left; /*Размещаем список горизонтально для реализации меню*/
  margin-right:5px; /*Добавляем отступ у пунктов меню*/
  
}</style>
  </head>
  <body><ul>
						<li><a href="#">"$username"</a></li>
						<li><a href="#">"$login"</a></li>
						<li><a href="#">"$password"</a></li>
						<li><a href="#">"$role"</a></li>	
				  </ul>';
            }
	}
?>