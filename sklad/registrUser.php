<?php
    //session_start();
    include('./../config.php');
    if (isset($_POST['registration_user'])) {
	//phone	tech	mark	cause	description	user	status	
  $name = $_POST['name'];
  $article	= $_POST['article'];
  $analog	= $_POST['analog'];
  $countd	= $_POST['count'];
  $price_zakup	= $_POST['price_zak'];
  $price_opt	= $_POST['price_opt'];
  $price_roznica	= $_POST['price_roz'];
		
		
  //$imagename=$_FILES["myimage"]["name"];
  //Получаем содержимое изображения и добавляем к нему слеш
  //$imagetmp=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
		
		$query = $connection->prepare("INSERT INTO sklad_details (name,article,analog_id,count,price_zakup,price_opt,price_roznica,image_name,image_content) VALUES ('$name', '$article',	'$analog',	'$countd',	'$price_zakup',	'$price_opt',	'$price_roznica','$imagename','$imagetmp')");
		
		//$query = $connection->prepare("INSERT INTO masterskaya(phone,tech,mark,cause,description,user,status) VALUES ('$phone','$tech','$mark','$cause','$description','$user','$status')");
        
		//$connection->query();
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
		header("Location: http://dzfgdzfpdzhlikdsrhe45y90ae4yijpshdipj.xyz/sklad/sklad.php");
	}
?>