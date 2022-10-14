<?php
    //session_start();
    include('./../config.php');
    if (isset($_POST['registration_user'])) {
	//phone	tech	mark	cause	description	user	status	
        $phone = $_POST['phone'];
		$tech= $_POST['tech'];
        $mark= $_POST['mark'];
        $cause= $_POST['cause'];
        $description= $_POST['description'];
        $user= $_POST['user'];
        $status= $_POST['status'];
		$imagename=$_FILES["myimage"]["name"];
		//Получаем содержимое изображения и добавляем к нему слеш
		$imagetmp=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
		$connection->query('SET NAMES utf8');
		
		$query = $connection->prepare("INSERT INTO masterskaya (id_bid,phone,tech,mark,cause,description,user,status,image_name,image_content) VALUES (4,'$phone','$tech','$mark','$cause','$description','$user','$status','$imagename','$imagetmp')");
		
		//$query = $connection->prepare("INSERT INTO masterskaya(phone,tech,mark,cause,description,user,status) VALUES ('$phone','$tech','$mark','$cause','$description','$user','$status')");
        
		//$connection->query();
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        echo "<html>
  <head>
    <title>Complete</title>
  </head>
  <body>
  '$phone','$tech','$mark','$cause','$description','$user','$status'
  </body>
  </html>";
	}
?>