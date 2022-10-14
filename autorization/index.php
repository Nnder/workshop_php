<?php
    session_start();
    include('./../config.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM `users` WHERE `login` = '$username' AND `password` = '$password'");
		$result_set = $connection->query("SELECT * FROM `users` WHERE 'login' = '$username' AND 'password' = '$password'");
        $query->bindParam("username", $username, PDO::PARAM_STR);
		

        $query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);
		
		$_SESSION['id'] = $result['id'];
		$_SESSION['role'] = $result['role'];
		$_SESSION['login'] = $result['login'];
		$_SESSION['name'] = $result['name'];
		$_SESSION['password'] = $result['password'];

        if (!$result) {
            header("Location: http://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/autorization/login.html");
        } else {
			header("Location: https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/zayavki/zayavki.php");
			echo "<html>
  <head>
    <title>Untitled</title>
	  <style type='text/css'>ul {
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
						<li><a href='https://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/zayavki/zayavki.php'>Заявки</a></li>
						<li><a href='#'>Мастерская</a></li>
						<li><a href='#'>Склад</a></li>
						<li><a href='#'>Продажи</a></li>
						<li><a href='#'>Касса</a></li>
						<li><a href='#'>Холодильники</a></li>
				  </ul> </body></html>";
            }
	}
?>