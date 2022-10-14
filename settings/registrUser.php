<?php
    //session_start();
    include('./../config.php');
    if (isset($_POST['registration_user'])) {
		$mark = explode(" ", $_POST['mark']);
        $tech =  explode(" ", $_POST['tech']);
		$status=  explode(" ", $_POST['status']);
		
		$details =  explode(" ", $_POST['details']);
		
		$sql="TRUNCATE settings;INSERT INTO settings (setting,value) VALUES ";
		$q = "";
		//$query = $connection->prepare("TRUNCATE settings;");
		
		$connection->query('SET NAMES utf8');
		
		
		
		$data = "";
		$setting = "марка";
		for($i = 0; $i < count($mark);$i++){
			$value = $mark[$i];
			$data = "{$data}('$setting', '$value'),";
		}
		
		$q1 = substr( "{$data}", 0 ,-1);
		$query = $connection->prepare("{$q};");
		
		//
		
		$data = "";
		$setting = "вид техники";
		for($i = 0; $i < count($tech);$i++){
			$value = $tech[$i];
			$data = "{$data}('$setting', '$value'),";
		}
		
		$q2 = substr( "{$data}", 0 ,-1);
		$query = $connection->prepare("{$q};");
		
		
		$data = "";
		$setting = "статус";
		for($i = 0; $i < count($status);$i++){
			$value = $status[$i];
			$data = "{$data}('$setting', '$value'),";
		}
		$q3 = substr( "{$data}", 0 ,-1);
		
		
	
		
		
		
		$sql2="TRUNCATE sklad_details;INSERT INTO sklad_details (name,article,analog_id,count,price_zakup,price_opt,price_roznica) VALUES ";
		$data = "";
		$setting = "details";
		for($i = 0; $i < count($details);$i++){
			$value = explode(",", $details[$i]);
			
			$data = "$data('$value[0]', '$value[1]','$value[2]','$value[3]','$value[4]','$value[5]','$value[6]'),";
			
		}
		$q4 = substr( "{$data}", 0 ,-1);
		//echo $q4;

		$query = $connection->prepare("{$sql}{$q1},{$q2},{$q3};{$sql2}{$q4};");

		
        //$query = $connection->prepare("INSERT INTO settings (setting,value) VALUES ($setting, $value)");
		
		// TRUNCATE `settings`;
		
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
	}
?>