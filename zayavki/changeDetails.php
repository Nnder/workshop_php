<?php
    //session_start();
    include('./../config.php');

    if (isset($_POST['changeDetails'])) {
		
		
		
		
		//$connection->query('SET NAMES utf8');
		//$query = $connection->prepare("INSERT INTO details_bid (id_bid,id_detail,count) VALUES ('$id','$detail_id','$detail_count')");
		
		
		
/* id id_masterskaya date time address phone	tech mark cause	description	user status	price id_detail */
			
		// $date = $_POST['date'];
    //     $time = $_POST['time'];
		// $address= $_POST['address'];
    //     $phone = $_POST['phone'];
		// $tech= $_POST['tech'];
    //     $mark= $_POST['mark'];
    //     $cause= $_POST['cause'];
    //     $description= $_POST['description'];
    //     $user= $_POST['user'];
    //     $status= $_POST['status'];
    //     $price= $_POST['price'];
		
        //$imagename=$_FILES["myimage"]["name"];
  		//Получаем содержимое изображения и добавляем к нему слеш
	  	//$imagetmp=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
        //$id_detail= $_POST['id_detail'];

		
		
		
		
		
		//
        
    // $query = $connection->prepare("INSERT INTO bids (id_masterskaya,date,time,address,phone,tech,mark,cause,description,user,status,price) VALUES (1,'$date','$time','$address','$phone','$tech','$mark','$cause','$description','$user','$status','$price')");

		//id id_bid	phone tech	mark	cause	description	user	status
		//$query = $connection->prepare("INSERT INTO masterskaya (id_bid,phone,tech,mark,cause,description,user,status) VALUES (4,'$phone','$tech','$mark','$cause','$description','$user','$status')");
        
		//$connection->query();
        //$query->bindParam("username", $username, PDO::PARAM_STR);
        //id id_masterskaya	date time address phone	tech mark cause	description	user status	price id_detail
        //$query->execute();
        //$result = $query->fetch(PDO::FETCH_ASSOC);
		
        
	}

		$data = "";

		$id = $_POST['id'];
		
		for($i=1; $i<=20; $i++){
			$detail_id = $_POST["id-detail-$i"];
			if(!empty($detail_id)){
				
				
				//$detail_name = $_POST["name-detail-$i"];
				
				$detail_count = $_POST["count-detail-$i"];
				$data = "$data('$id','$detail_id','$detail_count'),";
				
			} else {
				break;
			}
			
			
		}
		$data = substr($data, 0, -1);

		echo $data;

		if($data != ""){
			echo "INSERT INTO details_bid (id_bid,id_detail,count) VALUES $data";
		}

		

//$query = $connection->prepare("INSERT INTO details_bid (id_bid,id_detail,count) VALUES ('$id','$detail_id','$detail_count')");
	
//foreach ($_POST as $row)
      //echo $row;

?>