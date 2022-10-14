<?php
    //session_start();
    include('./../config.php');
    if (isset($_POST['registration_user'])) {
/* id id_masterskaya date time address phone	tech mark cause	description	user status	price id_detail */
		$date = $_POST['date'];
        $time = $_POST['time'];
		$address= $_POST['address'];
        $phone = $_POST['phone'];
		$tech= $_POST['tech'];
        $mark= $_POST['mark'];
        $cause= $_POST['cause'];
        $description= $_POST['description'];
        $user= $_POST['user'];
        $status= $_POST['status'];
        $price= $_POST['price'];
		$imagename=$_FILES["myimage"]["name"];
  		//Получаем содержимое изображения и добавляем к нему слеш
	  	$imagetmp=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
        $id_detail= $_POST['id_detail'];
		
		$connection->query('SET NAMES utf8');
        $query = $connection->prepare("INSERT INTO holodilniki (id_masterskaya,date,time,address,phone,tech,mark,cause,description,user,status,price,image_name,image_content,id_detail) VALUES (1,'$date','$time','$address','$phone','$tech','$mark','$cause','$description','$user','$status','$price','$imagename','$imagetmp','$id_detail')");
		//id id_bid	phone tech	mark	cause	description	user	status
		//$query = $connection->prepare("INSERT INTO masterskaya (id_bid,phone,tech,mark,cause,description,user,status) VALUES (4,'$phone','$tech','$mark','$cause','$description','$user','$status')");
        
		//$connection->query();
        //$query->bindParam("username", $username, PDO::PARAM_STR);
        //id id_masterskaya	date time address phone	tech mark cause	description	user status	price id_detail
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        echo "<html>
  <head>
    <title>Complete</title>
  </head>
  <body>
  '$date','$time','$address','$phone','$tech','$mark','$cause','$description','$user','$status','$price','$id_detail'
  </body>
  </html>";
	}
?>